<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use App\Meta;
use App\Category;
use App\Event;
use App\Http\Requests;

class SearchController extends Controller
{
    public function autoComplete(Request $request) {
        $query = $request->get('term', '');

        return Store::where(function($q) use($query) {
            $q->where('title', 'LIKE', $query . '%')
            ->orWhere('domain', 'LIKE', $query . '%');
            })
        ->where('IsActive',1)
        ->take(10)->get(['id','title as value','image_url as img','seo_url as url'])->toJson();
    }
    


    public function autoCompleteA(Request $request) {
        $query = $request->get('term', '');

        $all = Meta::where('page', 'LIKE', $query . '%')->take(10)->get();

        $data = array();
        foreach ($all as $page) {
            $data[] = array('id' => $page->id, 'value' => $page->page,);
        }
        return \Response::Json($data);
    }



    public function autoCompleteC(Request $request) {
        $query = $request->get('term', '');

        $categories = Category::where('name', 'LIKE', $query . '%')->take(10)->get();

        $data = array();
        foreach ($categories as $category) {
            $data[] = array('id' => $category->id, 'value' => $category->name);
        }
        return \Response::Json($data);
    }

    public function autoCompleteE(Request $request) {
        $query = $request->get('term', '');

        $events = Event::where('event', 'LIKE', $query . '%')->take(10)->get();

        $data = array();
        foreach ($events as $event) {
            $data[] = array('id' => $event->id, 'value' => $event->event);
        }
        return \Response::Json($data);
    }

    public function searchStores($id)
    {
        return Store::where('id',$id)->get();
    }

    public function searchStoreCoupons($id)
    {
        return Store::join('coupons as c','c.sid','=','stores.id')->where('stores.id',$id)->get(['stores.title as store','c.code','c.title','c.description','c.expire_date','c.id']);
    }

    public function searchStoresLatest($limit)
    {
        return Store::orderBy('id','desc')->take($limit)->get();
    }

    public function searchCouponsLatest($limit)
    {
        return Store::join('coupons as c','c.sid','=','stores.id')->orderBy('c.id','desc')->take($limit)->get(['stores.title as store','c.code','c.title','c.description','c.expire_date','c.id']);
    }

    public function searchDomain(Request $request)
    {
        $query = $request->search_string;
        $store = Store::where(function($q) use($query) {
            $q->where('title', 'LIKE', $query . '%')
            ->orWhere('domain', 'LIKE', $query . '%');
            })
        ->take(1)->get(['seo_url as url'])->first();

        if($store==''){
            return response()->view('errors.404');
        }else{
            return redirect()->route('page.store',$store->url);
        }
        
    }
}
