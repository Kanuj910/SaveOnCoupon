<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageoptController;
use App\Network;
use App\Store;
use App\Category;
use App\StoreCategory;
use Illuminate\Http\Request;
use Validator;
use Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $dataMember = array();
        $dataMember['storeList'] = array('image_url','name','url');
        $dataMember['relatedStores'] = array('image_url','name','url');
        $dataMember['topStores'] = array('image_url','name','url');
        $dataMember['newStores'] = array('image_url','name','url');
        $dataMember['search'] = array('image_url','name','url');
    }

    public function show($id)
    {
        return Store::find($id);
    }

    public function topStores($arr,$lim)
    {
        $res = Store::where('IsActive',1)->get($arr)->take($lim)->toJson();
        return $res;
    }

    public function newStores($arr,$lim)
    {
        return Store::where('IsActive',1)->orderBy('id','desc')->take($lim)->get($arr);
    }

    public function stores($arr)
    {
        return Store::get($arr);
    }

    public function storeAdminList()
    {
        $stores = Store::join('networks as n','n.id','=','stores.nid')->get(['stores.id','stores.image_url','stores.title as Store','stores.domain as Domain','stores.IsActive','n.name as Network','stores.id as edit'])->toArray();

        $data = array('page' => 'Store','route' => 'store.admin.addForm','list' => $stores,'editroute'=>'store.admin.editForm');

        return view('be.templates.list',compact(['data']));
    }

    protected function validator(array $data,$form,$id) {
        if($form=='store'){
            if($id!=''){
                return Validator::make($data, [
                    'owsid' => 'required|numeric',
                    'title' => 'required|max:255|unique:stores,title,'.$id,
                    'categoryID' => 'required',
                    'domain' => 'required',
                    'seo_url' => 'unique:stores,seo_url,'.$id,
                    // 'image_url' => 'required|image|mimes:jpeg,jpg',
                    'url' => 'required|url|unique:stores,url,'.$id,
                ]);
            }else{
                return Validator::make($data, [
                    'owsid' => 'required|numeric',
                    'title' => 'required|max:255|unique:stores',
                    'categoryID' => 'required',
                    'category' => 'required',
                    'domain' => 'required',
                    'seo_url' => 'unique:stores',
                    'image_url' => 'required|image|mimes:jpeg,jpg,png,gif',
                    'url' => 'required|url|unique:stores',
                ]);
            }
            
        }elseif($form=='seo'){
            return Validator::make($data, [
                'meta_title' => 'required|max:70|min:10',
                'meta_description' => 'required|max:170|min:10',
                'meta_keywords' => 'required',
                'h1' => 'required',
                'description' => 'required|min:20',
                'video_url' => 'url',
            ]);
        }
        
    }

    public function storeAdminAddForm()
    {
        $categorys = Category::where('parent_id', '=', 0)->get();
        $tree='';
        $tree.='<ul>';
        foreach ($categorys as $category) {
        $tree .='<li>'.'<input type="checkbox" name="categoryID[]" value="' . $category->id . '"' . '/>
        &nbsp;<input type="radio" name="category" value="' . $category->id . '"' . '/>'.'<span class="parent1">' . '&nbsp &nbsp'.$category->name.'</span>';
            if(count($category->childs)) {
                $tree .=$this->childView($category);
            }
        }
        $tree .='<ul>';
        $network = Network::pluck('name','id');
        $data = array('page' => 'Store',
        'route' => 'store.store',
        'form' => array(0 => array('type'=>'select','name' => 'nid','label' => 'N/W Name','list'=>$network),
            array('type' => 'text','name' => 'owsid','label' => 'Store ID in N/W'),
            array('type' => 'text','name' => 'title','label' => 'Store Name'),
            array('type' => 'text','name' => 'domain','label' => 'Domain'),
            array('type' => 'text','name' => 'url','label' => 'Affiliate URL'),
            array('type' => 'text','name' => 'seo_url','label' => 'SEO URL'),
            array('type' => 'file','name' => 'image_url','label' => 'Upload Image'),
            array('type' => 'checkbox','name' => 'IsActive','label' => 'IsActive'))
        );
        return view('be.store.add',compact(['data','tree']));

    }

    public function childView($category)
    {                 
        $html ='<ul>';
        foreach ($category->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li>'.'<input type="checkbox" name="categoryID[]" value="' .$arr->id . '"' . '/>'.'<span class="parent2">' . '&nbsp; &nbsp;'.$arr->name.'</span>';                  
                $html.= $this->childView($arr);
            }else{
                $html .='<li>'.'<input type="checkbox" name="categoryID[]" value="' . $arr->id . '"' . '/>'.'<span class="parent3">' . '&nbsp; &nbsp;'.$arr->name.'</span>';                                 
                $html .="</li>";
            }
        }

        $html .="</ul>";
        return $html;
    }    

    public function storeAdd(Request $request)
    {
        $validator = $this->validator($request->all(),'store','');

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['c_uid'] = Auth::user()->id;       
        $request['cid'] = $request->category;   

        $store = new Store($request->input());

        if ($file = $request->hasFile('image_url')) {

            $file = $request->file('image_url');
            $request->title = trim($request->title);
            $request->title = str_replace(' ', '-', $request->title);
            $fileName = strtolower($request->title).".jpg";
            $store->image_url = $fileName;

            $imgOpt = new ImageoptController;
            $imgOpt->imageUploadPost($_FILES, $fileName);
        }
        
        $store->save();
        $sid = $store->id;
        foreach ($request->categoryID as $key => $val) {
            $cats = array('cat_id' => $val, 'sid' => $sid);
            StoreCategory::create($cats);
        }
        return redirect()->route('store.admin.list')->withSuccess('successfully added');
    }

    public function storeAdminEditForm($id)
    {
        // $store = Store::find($id);
        
        $store = Store::leftjoin('users as uc','uc.id','=','stores.c_uid')->
        leftjoin('users as uu','uu.id','=','stores.u_uid')->
        where('stores.id',$id)->get(['stores.*','uc.name as created_by','uu.name as updated_by'])->first();

        $Selcategories = StoreCategory::join('categories', 'categories.id', '=', 'cat_stores.cat_id')
        ->where('sid', $store['id'])->pluck('name', 'id')->toArray();
        //$GLOBALS['select'] = array();
        $select = array();
        foreach ($Selcategories as $key => $value) {
            $select[] = $key;
        }
        //return $select;
        $categorys = Category::where('parent_id', '=', 0)->get();
        $tree='';

        $tree.='<ul>';
        foreach ($categorys as $category) {

            $tree .='<li>'.'<input type="checkbox" name="categoryID[]" value="' .$category->id . '"' . (in_array($category->id, $select) ? "checked" : "") . '>' .

        '&nbsp;<input type="radio" name="category" '.($store->cid==$category->id ? "checked" : "" ).' value="' . $category->id . '"' . '/><span class="parent1">' . '&nbsp &nbsp'.$category->name.'</span>';
            if(count($category->childs)) {
                $tree .="<ul>";
                foreach ($category->childs as $arr) {
                    if(count($arr->childs)){
                        $tree .='<li>'.'<input type="checkbox" name="categoryID[]" value="' .$arr->id . '"' . (in_array($arr->id,$select) ? "checked" : "") . '>' . '<span class="parent2">'  . '&nbsp &nbsp'.$arr->name.'</span>';
                        $tree.= $this->childView($arr);
                    }else{
                        $tree .='<li>'.'<input type="checkbox" name="categoryID[]" value="' .$arr->id . '"' . (in_array($arr->id, $select) ? "checked" : "") . '>' . '<span class="parent1">' .'<span class="parent3">' . '&nbsp &nbsp'.$arr->name.'</span>';                                 
                        $tree .="</li>";
                    }
                }
                $tree.="</ul>";
            }
        }
        $tree .='<ul>';

        $network = Network::pluck('name','id');
        $data = array('page' => 'Store',
        'route' => 'store.store',
        'form' => array(0 => array('type'=>'select','name' => 'nid','label' => 'N/W Name','list'=>$network),
            array('type' => 'text','name' => 'owsid','label' => 'Store ID in N/W'),
            array('type' => 'text','name' => 'title','label' => 'Store Name'),
            array('type' => 'text','name' => 'domain','label' => 'Domain'),
            array('type' => 'text','name' => 'url','label' => 'Affiliate URL'),
            array('type' => 'text','name' => 'seo_url','label' => 'SEO URL'),
            array('type' => 'file','name' => 'image_url','label' => 'Upload Image'),
            array('type' => 'checkbox','name' => 'IsActive','label' => 'IsActive'))
        );       
        return view('be.store.edit',compact(['data','store','tree','select']));
    }
   
    public function storeEdit(Request $request, $id)
    {

if(1==2){
    $stores = Store::join('ukdb_bk1.bk_stores as bs','bs.id','=','stores.id')->where('stores.image_url','')
    ->whereIn('bs.bk_id',array(10161,10909,11172,11257,11442,11570,11906,13931,13987,15365,15760,15801,15858,15963,16002,16994,17178,6591,6607,6619,6649,6757,6759,6775,6782,6809,6813,6821,6822,6841,6895,6973,7021,7024,7034,7042,7203,7208,7432))
    ->take(20)->get(['bs.bk_id','stores.id','stores.title']);

    $imgOpt = new ImageoptController;

    foreach ($stores as $key) {
        $key->title = trim($key->title);
        $key->title = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $key->title)));
        $key->title = strtolower($key->title).".jpg";

        // echo $key->bk_id;
        // echo '<br />';
        // echo $key->title;
        // echo '<br />';
        // echo $key->id;
        // echo '<br />';
        // echo '<br />';

        
        $imgOpt->imageUploadPostBulk($key->bk_id.".jpg", $key->title);

        $storeupdate=Store::find($key->id);
        $storeupdate->update(['image_url' => $key->title]);
    }

    // dd('adf');

    return redirect()->back()->withSuccess('Successfully updatedd');
}
if(1==2){
    $stores = Store::join('bk_stores as bs','bs.id','=','stores.id')->where('stores.banner','')
    ->whereIn('bs.bk_id',array(10132,10161,10465,10486,10609,10814,10909,11186,11218,11233,11276,11409,11442,11449,11537,11674,11701,11793,11798,11863,11926,11930,11979,12026,12083,12086,12140,13511,13525,13586,13649,13931,14116,14151,14426,14568,14571,14572,15365,15757,15965,16002,16102,16128,16188,16228,16994,16999,17001,17054,17112,17113,17187,17231,6122,6132,6136,6184,6199,6522,6526,6555,6597,6635,6660,6669,6671,6706,6709,6725,6755,6757,6771,6776,6833,6834,6841,6842,6843,6856,6860,6868,6871,6878,6884,6908,6969,6973,7009,7012,7016,7021,7027,7034,7035,7037,7042,7073,7204,7382,7432,7567,7627,9934))
    ->take(20)->get(['bs.bk_id','stores.id','stores.title']);

    $imgOpt = new ImageoptController;

    foreach ($stores as $key) {
        $key->title = trim($key->title);
        $key->title = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $key->title)));
        $key->title = strtolower($key->title).".jpg";

        // echo $key->bk_id;
        // echo '<br />';
        // echo $key->title;
        // echo '<br />';
        // echo $key->id;
        // echo '<br />';
        // echo '<br />';

        
        $imgOpt->imageUploadPostBulkBanner($key->bk_id.".jpg", $key->title);

        $storeupdate=Store::find($key->id);
        $storeupdate->update(['banner' => $key->title]);
    }

    // dd('adf');

    return redirect()->back()->withSuccess('Successfully updatedd');
}


        if(isset($request->h1)){
            $validator = $this->validator($request->all(),'seo',$id);
        }else{
            $validator = $this->validator($request->all(),'store',$id);
            $request['IsActive'] = (isset($request['IsActive']) && $request['IsActive']==1 ? 1 : 0);
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['u_uid'] = Auth::user()->id;
        
        $data = $request->all();

        $store = Store::find($id);

        if (isset($request->image_url) && $request->hasFile('image_url')) 
        {
            $image = $request->file('image_url');
            $request->title = trim($request->title);
            $request->title = str_replace(' ', '-', $request->title);
            $fileName = strtolower($request->title).".jpg";
            $data['image_url'] = $fileName;
            $imgOpt = new ImageoptController;
            $imgOpt->imageUploadPost($_FILES, $fileName);
        }

        if (isset($request->banner) && $request->hasFile('banner')) 
        {
            $request->title = $store->title;
            $image = $request->file('banner');
            $request->title = trim($request->title);
            $request->title = str_replace(' ', '-', $request->title);
            $fileName = strtolower($request->title).".jpg";
            $data['banner'] = $fileName;
            $imgOpt = new ImageoptController;
            $imgOpt->imageUploadPostBanner($_FILES, $fileName);
        }

        if(isset($request->categoryID)){

            $data['cid'] = $request->category;
            $store->update($data);
            $catmap = StoreCategory::where('sid', $store->id)->delete();
            foreach ($request->categoryID as $key => $val) {
                $cats = array('cat_id' => $val, 'sid' => $store->id);
                StoreCategory::create($cats);
            }
            return redirect()->back()->withSuccess('Successfully updated');
        }elseif(isset($request->h1)){
            $store->update($data);
            return redirect()->back()->withSuccess('Successfully updated');
        }else{

        }
        return redirect()->back()->withSuccess('Successfully updated');
    }

    public function storeDeactive($id)
    {
        Store::find($id)->delete();
        return redirect()->route('store.index')->withSuccess( 'successfully added');
    }

    public function storeById($id)
    {
        $store=Store::where('id','=',$id)->get();
        return $store;
    }

    public function storeByURL($url)
    {
        $res = Store::where('seo_url','=',$url)->get(['id','title','domain','meta_title','meta_description','meta_description','h1','h2']);
        if($res->count() > 0){
            return $res;
        }else{
            exit;
        }
    }

    public function storeByIds($data1)
    {
        $stores=Store::whereIn('id',$data1)->get()->toJson();
        dd($stores);
    }

    public function getIds(Request $request)
    {
        $data = $request->get('cat_id','');
        $data1=explode(',', $data);
        $this->storeByIds($data1);
    }

    public function storeByStore()
    {

    }

    public function storesByCategory($arr,$cat,$lim)
    {
        $res = Category::join('cat_stores as cs','cs.cat_id','=','categories.id')->join('stores as s','s.id','=','cs.sid')->where('categories.id',$cat)->take($lim)->get($arr);


        return $res;
    }

    public function storeByPage()
    {

    }

    public function storeByNetwork($nid)
    {

    }

    public function storeDiscount($sid)
    {
        $offer = Store::join('store_discounts as sd','sd.id','=','stores.id')->where('stores.id',$sid)->get(['sd.discount'])->first();

        $val = '';

        if($offer!='' && isset($offer->discount)){
            $arr = unserialize($offer->discount);
            if($arr[0] == '&pound;'){
                $val = $arr[0]." ".$arr[1];
            }elseif(isset($arr[1])){
                $val = $arr[1]."%";
            }else{
                
            }
        }

        return $val;
    }

}
