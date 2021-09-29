<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Coupon;
use App\Store;
use App\Event;
use App\EventCoupon;
use App\CategoryCoupon;
use App\Category;
use App\HomeCoupons;
use Validator;
use Auth;

class CouponController extends Controller
{
    public function homeCoupons()
    {
        // return homeCoupons::join('coupons as c','c.id','=','home_coupons.cid')->join('stores as s','s.id','=','c.sid')->get(['c.title','s.title as store','s.seo_url','c.id as cid','s.id as sid','s.image_url as image','c.code','c.expire_date']);

        return Coupon::join('stores as s','s.id','=','coupons.sid')->where('is_top_coupon',1)
        ->where(function($q) {
            $q->where('coupons.expire_date','>=',date('Y-m-d'))
            ->orWhere('coupons.expire_date', '0000-00-00');
            })
        ->where(function($q) {
            $q->where('coupons.start_dt','<=',date('Y-m-d'))
            ->orWhere('coupons.start_dt', '0000-00-00');
            })->
        orderBy('coupons.id','desc')->
        get(['coupons.title','coupons.description','s.title as store','s.seo_url','coupons.id as cid','s.id as sid','s.image_url as image','coupons.code','coupons.expire_date'])->toArray();
        
    }

    public function homeCouponsNew()
    {
        return Coupon::join('stores as s','s.id','=','coupons.sid')
        ->where(function($q) {
            $q->where('coupons.expire_date','>=',date('Y-m-d'))
            ->orWhere('coupons.expire_date', '0000-00-00');
            })
        ->where(function($q) {
            $q->where('coupons.start_dt','<=',date('Y-m-d'))
            ->orWhere('coupons.start_dt', '0000-00-00');
            })->take(8)->orderBy('coupons.id','desc')
        ->groupBy('s.id')->
        orderBy('coupons.id','desc')->
        get(['coupons.title','coupons.description','s.title as store','s.seo_url','coupons.id as cid','s.id as sid','s.image_url as image','coupons.code','coupons.expire_date'])->toArray();
        
    }
    
    public function couponCode($couponId)
    {
        // echo $couponId;exit;
        if($couponId>0){
            $coupon = $this->show($couponId);        
            $store = new StoreController;
            $data['coupon'] = $coupon;
            $data['store'] = $store->show($coupon->sid);
            return view('fe.code',compact(['data']));
        }else{
            echo 'asdf';
        }
    }

    public function useCoupon($couponId)
    {
      $url = $this->show($couponId);
      header("Location:".$url->url);
    }

    public function show($id)
    {
        return Coupon::find($id);
    }

    public function storeHasCoupon($sid)
    {
        return Coupon::where('sid',$sid)->take(1)->get(['id']);
    }

    public function couponAdminList()
    {
        $coupons = Coupon::join('stores as s','s.id','=','coupons.sid')->get(['s.title as store','coupons.code','coupons.title','coupons.description','coupons.expire_date','coupons.id as edit'])->toArray();
        $data = array('page' => 'Coupon','route' => 'coupon.admin.addForm','list' => $coupons,'editroute'=>'coupon.admin.editForm','ajaxReq' => 'storeajax');

        // return view('be.templates.list',compact(['data']));
        return view('be.coupon.list',compact(['data']));
    }

    protected function validator(array $data)
    {
        if($data['start_dt']!='' && $data['expire_date']!=''){
            return Validator::make($data, [
                'title' => 'required|min:10',
                'url' => 'required|url',
                'cat'=> 'required',
                'description' => 'required|min:10',
                'start_dt' => 'date|date_format:Y-m-d|',
                'expire_date' => 'date|date_format:Y-m-d|after:start_dt',
            ]);
        }else{
            return Validator::make($data, [
                'title' => 'required|min:10',
                'url' => 'required|url',
                'cat'=> 'required',
                'description' => 'required|min:10',
                'start_dt' => 'date|date_format:Y-m-d|',
                'expire_date' => 'date|date_format:Y-m-d',
            ]);
        }
    }

    public function autoComplete(Request $request) {
        $query = $request->get('term', '');
        $stores = Store::where('title', 'LIKE', $query . '%')->take(10)->get();
        $data = array();
        foreach ($stores as $store) {
            $data[] = array('id' => $store->id, 'value' => $store->title, 'img' => $store->image_url);
        }
        return \Response::Json($data);
    }

    public function couponAdminAddForm()
    {
        $categories = Category::pluck('name','id');
        $events = Event::pluck('event','id');
        return view('be.coupon.add',compact(['categories','events']));
    }

    public function couponAdd(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $request['title'] = trim($request->title);        
        $request['description'] = trim($request->description);
        $request['code'] = trim($request->code);
        $request['url'] = trim($request->url);
        $request['discount_value'] = $this->extractOffer($request->title);
        $request['c_uid'] = Auth::user()->id;

        $data = $request->all();
        $data['sid'] = $data['id'];
        $data['id'] = '';

        // dd($data);
        $cid = Coupon::create($data)->id;
        foreach ($request->cat as $key => $val) {
            $cats = array('cat_id' => $val, 'cid' => $cid);
            CategoryCoupon::create($cats);
        }

        if($request->event!=''){ 
            EventCoupon::create(array('eid'=>$request->event,'cid'=>$cid));
        }

        return redirect()->back()->with( ['sid'=> $request->id, 'store' => $request->sid, 'success' => 'Successfully added']);
    }

    public function couponAdminEditForm($id)
    {
        // $coupon = $this->show($id);
        $coupon = Coupon::leftjoin('users as uc','uc.id','=','coupons.c_uid')->
        leftjoin('users as uu','uu.id','=','coupons.u_uid')->
        where('coupons.id',$id)->get(['coupons.*','uc.name as created_by','uu.name as updated_by'])->first();

        $cat_coupons = new CategoryController;
        $coupon->categories = $cat_coupons->categoriesByCoupon($id,array('categories.id'));

        $ccat = array();
        $ceve = array();
        foreach ($coupon->categories as $key) {
            $ccat[] = $key->id;
        }

        $coupon->categories = $ccat;

        $event = new EventController;
        $coupon->event = $event->eventByCoupon($id,array('events.id'));
        if($coupon->event->count()>0){
            $coupon->event = $coupon->event->first()->id;
        }else{
            $coupon->event = '';
        }

        $store = new StoreController;
        $sid = $store->show($coupon->sid)->id;
        $data = $this->couponsBySID($sid);
        $data->events = Event::pluck('event','id');

        $data->coupon = $coupon;

        return view('be.coupon.edit',compact(['data']));
    }

    public function couponEdit(Request $request,$id)
    {
        // $coupons = Coupon::where('discount_value',0)->take(500)
        // ->get(['id','title']);
        // foreach ($coupons as $key) {
        //     $dv = $this->extractOffer($key->title);             
        //     $c = Coupon::find($key->id);
        //     $c->update(array('discount_value' => $dv));
        // }
        // // dd($coupons);
        // dd('jo');
        $request['IsActive'] = (isset($request['IsActive']) && $request['IsActive']==1 ? 1 : 0);
        $request['freeshipping'] = (isset($request['freeshipping']) && $request['freeshipping']==1 ? 1 : 0);
        $request['discount'] = (isset($request['discount']) && $request['discount']==1 ? 1 : 0);
        $request['clearance'] = (isset($request['clearance']) && $request['clearance']==1 ? 1 : 0);
        $request['exclusive'] = (isset($request['exclusive']) && $request['exclusive']==1 ? 1 : 0);
        $request['is_top_coupon'] = (isset($request['is_top_coupon']) && $request['is_top_coupon']==1 ? 1 : 0);
        $request['sitewide'] = (isset($request['sitewide']) && $request['sitewide']==1 ? 1 : 0);

        $request['title'] = trim($request->title);
        $request['description'] = trim($request->description);
        $request['discount_value'] = $this->extractOffer($request->title);        
        $request['code'] = trim($request->code);
        $request['url'] = trim($request->url);
        $request['u_uid'] = Auth::user()->id;
        $data = $request->all();
        $storeid = Store::where('title', $data['sid'])->pluck('id');
        $data['sid'] = $storeid[0];
        $coupon = Coupon::find($id);
        $cid = $coupon->update($data);
        $catmap = CategoryCoupon::where('cid', $data['id'])->delete();
        foreach ($request->cat as $key => $val) {
            $cats = array('cat_id' => $val, 'cid' => $data['id']);
            CategoryCoupon::create($cats);
        }

        if($request->event){
            $event = EventCoupon::where('cid', $data['id'])->get();

            if($event->count()>0){
                $eve = EventCoupon::where('cid', $data['id'])->delete();
            }            
            EventCoupon::create(array('eid'=>$request->event,'cid'=>$data['id']));
        }

        return redirect()->back()->withSuccess('Successfully Updated');
    }

    public function couponDeactive($id)
    {
        Coupon::find($id)->delete();
    }

    public function couponById($id)
    {
        $coupon=Coupon::where('id',$id)->get();
        return $coupon;
    }

    public function couponByIds($data)
    {
        $coupons=Coupon::whereIn('id',$data)->get()->toJson();
        dd($coupons);
    }

    public function getIds(Request $request)
    {
        $data = $request->get('cid','');
        $data1=explode(',', $data);
        $this->couponByIds($data1);
    }
    
    public function couponByPage()
    {

    }

    public function couponsByCategory($arr,$cid,$lim)
    {
        return Coupon::join('cat_coupons','cat_coupons.cid','=','coupons.id')
        ->join('categories','categories.id','=','cat_coupons.cat_id')
        ->join('stores','stores.id','=','coupons.sid')
        ->where(function($q) {
            $q->where('coupons.expire_date','>=',date('Y-m-d'))
            ->orWhere('coupons.expire_date', '0000-00-00');
            })
        ->where(function($q) {
            $q->where('coupons.start_dt','<=',date('Y-m-d'))
            ->orWhere('coupons.start_dt', '0000-00-00');
            })
        ->where('categories.id',$cid)->take($lim)->get($arr);
    }

    public function couponsByEvent($arr,$eid,$lim)
    {
        return Coupon::join('eve_coupons','eve_coupons.cid','=','coupons.id')
        ->join('events','events.id','=','eve_coupons.eid')
        ->join('stores','stores.id','=','coupons.sid')
        ->where('events.id',$eid)->take($lim)->get($arr);
    }

    public function couponsBySID($sid){
        $store = new StoreController;
        $category = new CategoryController;
        $data = $store->show($sid);
        $data->coupons = $this->couponsByStore(array('coupons.title','coupons.code','coupons.expire_date','coupons.id'),$sid,30);
        $data->categories = $category->categoriesByStore($sid,array('categories.name','categories.id'));

        return $data;
    }

    public function couponsByStore($arr,$sid,$lim)
    {
        $res = Coupon::join('stores as s','s.id','=','coupons.sid')->where('s.id',$sid)
        ->where(function($q) {
            $q->where('coupons.expire_date','>=',date('Y-m-d'))
            ->orWhere('coupons.expire_date', '0000-00-00')
            ->orWhere('coupons.expire_date', '1970-01-01');
            })
        ->where(function($q) {
            $q->where('coupons.start_dt','<=',date('Y-m-d'))
            ->orWhere('coupons.start_dt', '0000-00-00')
            ->orWhere('coupons.expire_date', '1970-01-01');
            })->
        take($lim)->orderBy('coupons.id','desc')->get($arr);
        foreach ($res as $key) {
            $key->discount_value = unserialize($key->discount_value);
            // echo '<pre>';
            // print_r($key->discount_value);
            // echo '</pre>';
        }
        // dd('asdf');
        return $res;
    }

    public function couponsByStoreExp($arr,$sid,$lim)
    {
        return Coupon::join('stores as s','s.id','=','coupons.sid')->where('s.id',$sid)
        ->where('coupons.expire_date','<',date('Y-m-d'))
        ->where('coupons.expire_date','!=','0000-00-00')
        ->take($lim)->orderBy('coupons.id','desc')->get($arr);
    }

    private function extractOffer($str)
    {
        $toeu = $str;

        $valueMiscArray = array();
        $toeu = preg_replace('/&pound;|GBP|£/i',' &pound; ',$toeu);

        // dd('adsf');

        if(preg_match('/\$[0-9\.]+ off|\$ [0-9\.]+ off|[0-9\.]+\% off|[0-9\.]+\% discount|[0-9\.]+\% savings|\$[0-9\.]+ savings|\$[0-9\.]+ discount|save \$[0-9\.]+|save up to [0-9\.]+\%|save [0-9\.]+\%|save an extra [0-9\.]+\%|save an extra \$[0-9\.]+|USD[0-9\.]+ off|USD [0-9\.]+ off|USD\$[0-9\.]+ off|USD\$ [0-9\.]+ off|USD \$ [0-9\.]+ off|USD \$[0-9\.]+ off|£[0-9\.]+ off|£ [0-9\.]+ off|&pound;[0-9\.]+ off|&pound;[\ |][0-9\.]+ discount|&pound;[\ |][0-9\.]+ savings|&pound; [0-9\.]+ off|save £ [0-9\.]+|save £[0-9\.]+|save &pound; [0-9\.]+|save &pound;[0-9\.]+|GBP [0-9\.]+ off|[0-9\.]+ GBP off|[0-9\.]+ GBP savings|[0-9\.]+ GBP discount|[0-9\.]+ GBP extra savings|[0-9\.]+ GBP extra discount/i',$toeu)){
            preg_match('/\$[0-9\.]+ off|\$ [0-9\.]+ off|[0-9\.]+\% off|[0-9\.]+\% discount|[0-9\.]+\% savings|\$[0-9\.]+ savings|\$[0-9\.]+ discount|save \$[0-9\.]+|save up to [0-9\.]+\%|save [0-9\.]+\%|save an extra [0-9\.]+\%|save an extra \$[0-9\.]+|USD[0-9\.]+ off|USD [0-9\.]+ off|USD\$[0-9\.]+ off|USD\$ [0-9\.]+ off|USD \$ [0-9\.]+ off|USD \$[0-9\.]+ off|£[0-9\.]+ off|£ [0-9\.]+ off|&pound;[0-9\.]+ off|&pound;[\ |][0-9\.]+ discount|&pound;[\ |][0-9\.]+ savings|&pound; [0-9\.]+ off|save £ [0-9\.]+|save £[0-9\.]+|save &pound; [0-9\.]+|save &pound;[0-9\.]+|GBP [0-9\.]+ off|[0-9\.]+ GBP off|[0-9\.]+ GBP savings|[0-9\.]+ GBP discount|[0-9\.]+ GBP extra savings|[0-9\.]+ GBP extra discount/i',$toeu, $matches);

            $valueMisc=$matches[0];
            $valueMisc=preg_replace('/save an extra|extra savings|extra discount|discount|savings|save up to|save/i',' save ',$valueMisc);
            $valueMisc=preg_replace('/USD\$|USD|\$/i',' $ ',$valueMisc);
            $valueMisc=preg_replace('/&pound;|GBP|£/i',' &pound; ',$valueMisc);
            $valueMisc=preg_replace('/%/i',' % ',$valueMisc);
        if(preg_match('/%/i',$valueMisc)){
            $valueMisc=preg_replace('/save/i',' off ',$valueMisc);
        }
        if(preg_match('/\$|pound/i',$valueMisc)){
            $valueMisc=preg_replace('/off/i',' save ',$valueMisc);
        }
            $valueMisc=preg_replace('/off/i',' off ',$valueMisc);
            $valueMisc=preg_replace('/\s+/', ' ', $valueMisc);
            $valueMisc=trim($valueMisc);
            $valueMiscArray=explode(' ',$valueMisc);
            sort($valueMiscArray);
        }elseif(preg_match('/freeshipping|free shipping/i',$toeu)){
            preg_match('/freeshipping|free shipping/i',$toeu,$valueMiscArray);
        }else{$valueMiscArray[]="sale";}

        return serialize($valueMiscArray);
    }
}
