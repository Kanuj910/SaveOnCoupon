<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContentController;
use App\Store;
use App\Category;
use App\Event;
use App\Meta;
use App\HomeCoupons;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MetaController extends Controller
{
	public function index(){
		return view('be.meta.index');
	}

	public function linkType($type,$id)
	{
		if($type==1){
			return redirect()->route('meta.store.editForm',$id);
		}elseif($type==2){
			return redirect()->route('meta.category.editForm',$id);
		}elseif($type==3){
			return redirect()->route('meta.event.editForm',$id);
		}elseif($type==4){
			return redirect()->route('meta.all.editForm',$id);
		}else{

		}
	}

	public function show($id)
	{
		return Meta::find($id);
	}

	public function homeCoupons()
	{

		$data = array('name' => 'Store','ajaxReq' => 'storeajax','type' => '1');
		return view('be.meta.homecoupons',compact('data'));
	}

	public function getHomeCoupons(Request $request)
	{
		$id = $request->get('id','');
		return Store::find($id);
	}

	public function allEdit($id)
	{
        $all = $this->show($id);
        $data = array('page' => 'All',
            'route' => 'meta.all.update',
            'arr'=>$all,
            'name' => "Edit ".$all->page." page meta",
            'form' => array(0 => array('type' => 'text','name' => 'meta_title'),
				array('type' => 'text','name' => 'meta_description'),
				array('type' => 'text','name' => 'meta_keywords'),
				array('type' => 'text','name' => 'h1'),
				array('type' => 'text','name' => 'h2'),
            ));

		return view('be.templates.edit',compact('data'));
	}

	public function categoryEdit($id)
	{
		$category = new CategoryController;
        $category = $category->show($id);
        $data = array('page' => 'Category',
            'route' => 'meta.category.update',
            'arr'=>$category,
            'name' => "Edit ".$category->name." page meta",
            'form' => array(0 => array('type' => 'text','name' => 'meta_title'),
				array('type' => 'text','name' => 'meta_description'),
				array('type' => 'text','name' => 'meta_keywords'),
				array('type' => 'text','name' => 'h1'),
				array('type' => 'text','name' => 'h2'),
				array('type' => 'textarea','name' => 'description'),
            ));

		return view('be.templates.edit',compact('data'));
	}

	public function eventEdit($id)
	{
		$event = new EventController;
        $event = $event->show($id);
        $data = array('page' => 'Event',
            'route' => 'meta.event.update',
            'arr'=>$event,
            'name' => "Edit ".$event->event." page meta",
            'form' => array(0 => array('type' => 'text','name' => 'meta_title'),
				array('type' => 'text','name' => 'meta_description'),
				array('type' => 'text','name' => 'meta_keywords'),
				array('type' => 'text','name' => 'h1'),
				array('type' => 'text','name' => 'h2'),
            ));

		return view('be.templates.edit',compact('data'));
	}

	public function storeEdit($id)
	{
        $store = Store::find($id);

        $content = new ContentController;
        $contentPri = $content->getPremiumContent($id, 1);
        $sort = $contentPri['sort'];
        $premium_content = $contentPri['content'];

        $data = array('page' => 'Store',
            'route' => 'meta.store.update',
            'arr'=>$store,
            'name' => "Edit ".$store->title." page meta",
            'form' => array(0 => array('type' => 'text','name' => 'meta_title'),
				array('type' => 'text','name' => 'meta_description'),
				array('type' => 'text','name' => 'meta_keywords'),
				array('type' => 'text','name' => 'h1'),
				array('type' => 'text','name' => 'h2'),
				array('type' => 'textarea','name' => 'description'),
				array('type' => 'text','name' => 'video_url'),
				array('type' => 'file','name' => 'banner'),
            ),
            'premium_content' => $premium_content,
            'content_sort' => $sort
            );

		return view('be.meta.content.edit',compact('data'));
		// return view('be.templates.edit',compact('data'));
	}


	public function all()
	{
        $all = Meta::get(['page as name','url','id as edit'])->toArray();        
		$data = array('name' => 'Page','ajaxReq' => 'allajax','type' => '4','list' => $all,'editroute'=>'meta.all.editForm');
     	return view('be.templates.autoSuggest',compact(['data']));		  
	}

	public function category()
	{
		$categories = Category::get(['name','seo_url','id as edit'])->toArray();
		$data = array('name' => 'Category','ajaxReq' => 'categoryajax','type' => '2','list' => $categories,'editroute'=>'meta.category.editForm');

     	return view('be.templates.autoSuggest',compact(['data']));		  
	}

	public function event()
	{		
		$events = Event::get(['event','seo_url','id as edit'])->toArray();
		$data = array('name' => 'Event','ajaxReq' => 'eventajax','type' => '3','list' => $events,'editroute'=>'meta.event.editForm');
     	return view('be.templates.autoSuggest',compact(['data']));
	}

	public function store()
	{
		$data = array('name' => 'Store','ajaxReq' => 'storeajax','type' => '1');
     	return view('be.templates.autoSuggest',compact(['data']));
	}

	public function pageEdit(Request $request, $id)
    {
        $res = Meta::find($id);
        $request['u_uid'] = Auth::user()->id;
        $res->update($request->all());
    	return redirect()->back()->withSuccess('Successfully Updated');
    }

    public function metaTrim($data,$off)
    {
    	$data['meta']->meta_title = (isset($data['page']->meta_title) && $data['page']->meta_title != '' ? $data['page']->meta_title : $data['meta']->meta_title );
		$data['meta']->meta_description = (isset($data['page']->meta_description) && $data['page']->meta_description != '' ? $data['page']->meta_description : $data['meta']->meta_description );
		$data['meta']->meta_keywords = (isset($data['page']->meta_keywords) && $data['page']->meta_keywords != '' ? $data['page']->meta_keywords : $data['meta']->meta_keywords );
		$data['meta']->h1 = (isset($data['page']->h1) && $data['page']->h1 != '' ? $data['page']->h1 : $data['meta']->h1 );
		$data['meta']->h2 = (isset($data['page']->h2) && $data['page']->h2 != '' ? $data['page']->h2 : $data['meta']->h2 );

		if(in_array($data['meta']->id, array(2,3,4))){
			$data['meta']->meta_title = $this->smartMeta($data['meta']->meta_title,$data['page'],$data['coupons'],$off);
	    	$data['meta']->meta_description = $this->smartMeta($data['meta']->meta_description,$data['page'],$data['coupons'],$off);
	    	$data['meta']->meta_keywords = $this->smartMeta($data['meta']->meta_keywords,$data['page'],$data['coupons'],$off);
	    	$data['meta']->h1 = $this->smartMeta($data['meta']->h1,$data['page'],$data['coupons'],$off);
	    	$data['meta']->h2 = $this->smartMeta($data['meta']->h2,$data['page'],$data['coupons'],$off);
		}

    	return $data['meta'];

    }

    public function smartMeta($str,$store,$coupons,$off)
    {
    	$year = date('Y');
    	$this->str = $str;
    	$this->str = str_ireplace('%s%', $store->title, $this->str);
    	$this->str = str_ireplace('%c%', $store->name, $this->str);
    	$this->str = str_ireplace('%e%', $store->event, $this->str);
		$this->str = str_ireplace('%ActCou%', $coupons->count(), $this->str);
		$this->str = str_ireplace('%D%', $store->domain, $this->str);
		$this->str = str_ireplace('%Y%', $year, $this->str);
		$this->str = str_ireplace('%OFFO%', $off, $this->str);
		$this->str = str_ireplace('%YI%', $year+1, $this->str);
		$this->str = str_ireplace('%DT%', date('M Y'), $this->str);
		$this->str = str_replace("\\'","&#39;",$this->str);
		$this->str = str_replace("'","&#39;",$this->str);
		$this->str = str_replace('"',"&#34;",$this->str);
		$this->str = str_replace(" & "," &amp; ",$this->str);
		$this->str = str_replace("£","&pound;",$this->str);

        if($coupons->count()==0){
            $this->str = str_ireplace('%FirstCou%', '', $this->str);
        }else{
            $this->str = str_ireplace('%FirstCou%', $coupons->first()->title, $this->str);
        }

        // if(strpos($this->str,'%OFFO%')==true && $off->first()->off==''){
        //     $this->str = 'gotit';
        // }

    	return $this->str;
    }

	public function categoryMetaEdit(Request $request, $id)
	{
		$category = new CategoryController;
		return $category->categoryEdit($request,$id);
	}

	public function eventMetaEdit(Request $request, $id)
	{
		$event = new EventController;
		return $event->eventEdit($request,$id);
	}

	public function storeMetaEdit(Request $request, $id)
	{
		$store = new StoreController;
		return $store->storeEdit($request,$id);
	}

}
