<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CouponController;
// use App\Http\Controllers\cidsController;
// use App\Domain_coupon_grid;
use App\Subscribe;
// use App\Store;
use Validator;
use Mail;

class EmailController extends Controller
{
    protected function validatorSubject(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'name' => 'required|max:100',
            'message' => 'required|max:500',
            'subject' => 'required|max:100',
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
        ]);
    }

    public function contact(Request $request)
    {
        $validator = $this->validatorSubject($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $clientIpAddress = $this->getIp();

        $serialized_data = serialize(array('subject' => $request->subject, 'message' => $request->message));
        $contact = Subscribe::Create(['email' => $request->email,'content' => $serialized_data,'ip' => $clientIpAddress]);

        Mail::send('email.contact', compact('request'), function ($m) use($request){
            $m->from('contact@vouchertopay.co.uk', 'VoucherToPay');
            $m->to($request->email, '')->subject('Thank you for contacting us');
        });

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $clientIpAddress = $this->getIp();

        $vcode = md5(rand(1,100));


        $exists = Subscribe::where('email',$request->email)
        ->where('sid',$request->sid)
        ->where(function($q) {
            $q->where('source',3)
            ->orWhere('source',5);
            })
        ->get();

        

        if($exists->count() > 0){
            return redirect()->back()->with('warning', 'You already subscribed for this store');
        }

        $contact = Subscribe::Create(['email' => $request->email, 'sid' => $request->sid,'ip' => $clientIpAddress,'source' => 3,'vcode' => $vcode])->id;


        // $data = $this->getStoreCoupons($request);

        $coupon = new CouponController;
        $data['coupons'] = $coupon->couponsByStore(array('coupons.title','coupons.description','s.id as sid','coupons.id as cid','s.title as store','s.image_url as image','coupons.code','coupons.expire_date'),$request->sid,5);

        $data['emailToken'] = "?id=".$contact."&code=".$vcode;

        // return view('email.welcome', compact(['data']));

        Mail::send('email.welcome', compact('data'), function ($m) use($request){
            $m->from('team@vouchertopay.co.uk', 'VoucherToPay');
            $m->to($request->email, '')->subject('Welcome Newsletter');
        });

        return redirect()->back()->with('success', 'You will receive an email shortly');
    }

    public function returnUser($request,$did,$source){

        $vcode = md5(rand(1,100));
        $clientIpAddress = $this->getIp();
        $contact = Subscribe::Create(['email' => $request->email, 'sid' => $request->sid, 'did' => $did,'ip' => $clientIpAddress,'source' => $source,'vcode' => $vcode])->id;


        $data = $this->getStoreCoupons($request);
        $data->emailToken = "?id=".$contact."&code=".$vcode;

        // return view('email.return',compact(['data']));

        Mail::send('email.return', compact('data'), function ($m) use($data){
            $m->from('feedback@coupontopay.com', 'VoucherToPay');
            $m->to($data->email, '')->subject($data->coupons->first()->store.' Coupon Subscription');
        });
    }

    public function popup(Request $request)
    {
        exit;
        dd('adf');
        
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $exists = Subscribe::where('email',$request->email)
        ->where('sid',$request->sid)
        ->where(function($q) {
            $q->where('source',3)
            ->orWhere('source',5);
            })
        ->get();


        if($exists->count() > 0){
            return redirect()->back()->with('message', 'You already subscribed for this store');
        }

        $this->returnUser($request,1,5);

        // $data = $this->getStoreCoupons($request);
        // Mail::send('email.popup', compact('data'), function ($m) use($data){
        //     $m->from('feedback@coupontopay.com', 'VoucherToPay');
        //     $m->to($data->email, '')->subject('Welcome Newsletter');
        // });
        
        return redirect()->back()->with('message', 'Thank you for subscribing you will receive an email shortly');
    }

    public function sitewide(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $exists = Subscribe::where('email',$request->email)
        ->where(function($q) {
            $q->where('source',3)
            ->orWhere('source',5)
            ->orWhere('source',4);
            })
        ->get();

        if($exists->count() > 0){
            return redirect()->back()->with('warning', 'You already subscribed with us');
        }

        $coupon = new CouponController;
        $data['coupons'] = $coupon->homeCoupons();
        
        $vcode = md5(rand(1,100));
        $clientIpAddress = $this->getIp();
        $did = 1;
        $source = 4;
        $contact = Subscribe::Create(['email' => $request->email, 'ip' => $clientIpAddress,'source' => $source,'vcode' => $vcode])->id;

        
        $data['emailToken'] = "?id=".$contact."&code=".$vcode;

        // return view('email.sitewide',compact(['data']));exit;

        Mail::send('email.sitewide', compact('data'), function ($m) use($request){
            $m->from('team@vouchertopay.co.uk', 'VoucherToPay');
            $m->to($request->email, '')->subject('Welcome Newsletter');
        });
        return redirect()->back()->with('success', 'You will receive an email shortly');
    }

    public function feedback(Request $request)
    {
        Mail::send('email.feedback', compact('request'), function ($m) use($request){
            $m->from('feedback@coupontopay.com', 'VoucherToPay');
            $m->to($request->email, '')->subject('We received your feedback');
        });

        return redirect()->back();
    }

    public function getStoreCoupons($request){
        $store = Store::where('id',$request->sid)
        ->get(['id','title','img_str','img_str1']);

        $cidsclass = new cidsController();
        $couponClass = new CouponController();

        $cids = $cidsclass->coupons($request->sid);

        $couponsAct = array();
        foreach ($cids as $key) {
            $couponsAct[] = $key['cid'];
        }

        $coupons = $couponClass->getCoupon($couponsAct,5);

        foreach ($coupons as $key) {
            $key->description = strip_tags($key->description);
        }unset($key);

        foreach ($store as $key) {
            if($key->img_str1==1){
                $key->img = "http://o.coupontopay.com/thumb/220/".$key->id.".jpg";
            }else{
                $key->img = "http://www.clicksnm.com/".$key->img_str;
            }
            
        }unset($key);

        $request->store = $store;
        $request->coupons = $coupons;
        return $request;
    }

    public function getIp(){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
            $clientIpAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $clientIpAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $clientIpAddress;
    }

    public function verifyReq(){
        $id = $_GET['id'];
        $code = $_GET['code'];

        $valid = Subscribe::where('id',$id)->where('vcode',$code)->get(['id','status']);

        if($valid->count() > 0){
            if($valid[0]->status == 1){
                return redirect()->route('email.subscribeAlready');
            }else{
                $unsub = Subscribe::find($id);
                $unsub->update(['status' => 1]);
                return redirect()->route('email.subscribe');
            }
            
        }else{
            $home = new HomeController();
            $homeCoupons = $home->getCoupons();
            return response()->view('errors.404');
        }
    }


    public function unsubscribeReq(){
        $id = $_GET['id'];
        $code = $_GET['code'];

        $valid = Subscribe::where('id',$id)->where('vcode',$code)->get(['id','status']);

        if($valid->count() > 0){
            if($valid[0]->status == 2){
                return redirect()->route('email.unsubscribeAlready');
            }else{
                $unsub = Subscribe::find($id);
                $unsub->update(['status' => 2]);
                return redirect()->route('email.unsubscribe');
            }
            
        }else{
            $home = new HomeController();
            $homeCoupons = $home->getCoupons();
            return response()->view('errors.404');
        }
    }


    public function subscribe()
    {
        $h1 = "<i class='glyphicon glyphicon-ok'> </i> Successfully Subscribed";
        return $this->emailPage($h1);
    }
    public function verify()
    {
        $h1 = "<i class='glyphicon glyphicon-ok'> </i> Successfully Verified";
        return $this->emailPage($h1);
    }
    public function unsubscribe()
    {
        $h1 = "<i class='glyphicon glyphicon-ok'> </i> Successfully Unsubscribed";
        return $this->emailPage($h1);
    }
    public function subscribeAlready()
    {
        $h1 = "<i class='glyphicon glyphicon-warning-sign'> </i> Already Subscribed";
        return $this->emailPage($h1);
    }
    public function verifyAlready()
    {
        $h1 = "<i class='glyphicon glyphicon-warning-sign'> </i> Already Verified";
        return $this->emailPage($h1);
    }
    public function unsubscribeAlready()
    {
        $h1 = "<i class='glyphicon glyphicon-warning-sign'> </i> Already Unsubscribed";
        return $this->emailPage($h1);
    }
    public function emailPage($h1)
    {
        $coupon = new CouponController;
        $data['coupons'] = $coupon->homeCoupons();
        $data['h1'] = $h1;
        return view('fe.static_pages.email',compact('data'));
    }
}
