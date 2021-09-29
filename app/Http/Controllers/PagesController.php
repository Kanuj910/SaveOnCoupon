<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContentController;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function home()
	{

		$front = new FrontController();
		$data['banner'] = $front->home();

		$store = new StoreController();
		$data['newStores'] = $store->newStores(array('title','seo_url'),16);

		$meta = new MetaController;
		$data['meta'] = $meta->show(1);
		$data['meta'] = $meta->metaTrim($data,'10%');


		$coupon = new CouponController;
		$data['coupons'] = $coupon->homeCoupons();
		$data['new_coupons'] = $coupon->homeCouponsNew();

		// dd($data['coupons']);
		$data['meta']->robots = 1;
		return view('fe.home',compact(['data']));
	}

	public function store($url)
	{
		$store = new StoreController;
		$storeId = $store->storeByURL($url);
		$data['page'] = $store->show($storeId->first()->id);

		$data['page']->cid==0 ? '' : $data['relStores'] = $store->storesByCategory(array('s.title','s.seo_url'),$data['page']->cid,10);

        $content = new ContentController;
        $contentPri = $content->getPremiumContent($data['page']->id, 0);
        $sort = $contentPri['sort'];
        $data['premium_content'] = $contentPri['sort'];

		$coupon = new CouponController;
		$data['coupons'] = $coupon->couponsByStore(array('coupons.title','coupons.description','s.id as sid','coupons.id as cid','s.title as store','coupons.code','coupons.expire_date','coupons.discount_value'),$data['page']->id,30);

		$data['coupons_exp'] = $coupon->couponsByStoreExp(array('coupons.title','coupons.description','s.id as sid','coupons.id as cid','s.title as store','coupons.code','coupons.expire_date'),$data['page']->id,5);
		$off = $store->storeDiscount($storeId->first()->id);

		$meta = new MetaController;
		$data['meta'] = $meta->show(2);
		$data['meta'] = $meta->metaTrim($data,$off);

		$data['meta']->robots = $coupon->storeHasCoupon($data['page']->id)->count();
		return view('fe.store',compact(['data']));
	}

	public function category($url)
	{
		$category = new CategoryController;
		$cid = $category->categoryByURL($url);

		$store = new StoreController;

		$data['page'] = $category->show($cid->first()->id);
		$data['relStores'] = $store->storesByCategory(array('s.title','s.url'),1,10);

		$coupon = new CouponController;

		$coupons = $coupon->couponsByCategory(array('coupons.title','coupons.description','stores.id as sid','coupons.id as cid','stores.title as store','stores.image_url as image','stores.seo_url','coupons.code','coupons.expire_date'),$data['page']->id,5);


		$data['coupons'] = $coupons;

		$relStores = $store->storesByCategory(array('s.title','s.url'),1,10);

		$data['relStores'] = $coupons;


		$meta = new MetaController;
		$data['meta'] = $meta->show(3);
		$data['meta'] = $meta->metaTrim($data,'');
		$data['meta']->robots = 0;
		// dd($data);

		return view('fe.category',compact(['data']));

	}

	public function event($url)
	{
		$event = new EventController;
		$eid = $event->eventByURL($url);

		$data['page'] = $event->show($eid->first()->id);


		$coupon = new CouponController;
		$coupons = $coupon->couponsByEvent(array('coupons.title','coupons.description','stores.id as sid','coupons.id as cid','stores.title as store','stores.image_url as image','coupons.code','coupons.expire_date'),$data['page']->id,5);

		$data['coupons'] = $coupons;

		$meta = new MetaController;
		$data['meta'] = $meta->show(4);
		$data['meta'] = $meta->metaTrim($data,'');

		// dd($data);
		$data['meta']->robots = 0;
		return view('fe.event',compact(['data']));
	}

	public function stores()
	{
		$store = new StoreController;
		$data['stores'] = $store->stores(array('id','title','seo_url','image_url'));

		$meta = new MetaController;
		$data['meta'] = $meta->show(7);
		$data['meta'] = $meta->metaTrim($data,'');

		// dd($data);

		$data['meta']->robots = 0;
		return view('fe.stores',compact(['data']));
	}

	public function categories()
	{
		$category = new CategoryController;
		$data['categories'] = $category->categories(array('id','name','seo_url','image_url'));

		$meta = new MetaController;
		$data['meta'] = $meta->show(6);
		$data['meta'] = $meta->metaTrim($data,'');

		// dd($data);
		$data['meta']->robots = 0;
		return view('fe.categories',compact(['data']));
	}

	public function events()
	{
		$event = new EventController();
		$data['events'] = $event->events(array('event','seo_url','image_url'));

		$meta = new MetaController;
		$data['meta'] = $meta->show(5);
		$data['meta'] = $meta->metaTrim($data,'');

		// dd($data);
		$data['meta']->robots = 0;
		return view('fe.events',compact(['data']));
	}

	public function contact()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(9);
		$data['meta'] = $meta->metaTrim($data,'');

		return view('fe.static_pages.contact',compact(['data']));

	}

	public function about()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(8);
		$data['meta'] = $meta->metaTrim($data,'');

		$data['meta']->robots = 0;

		return view('fe.static_pages.about',compact(['data']));
	}

	public function terms()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(11);
		$data['meta'] = $meta->metaTrim($data,'');

		$data['meta']->robots = 0;
		return view('fe.static_pages.terms',compact(['data']));
	}

	public function privacy()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(10);
		$data['meta'] = $meta->metaTrim($data,'');

		$data['meta']->robots = 0;
		return view('fe.static_pages.privacy',compact(['data']));
	}

	public function faq()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(12);
		$data['meta'] = $meta->metaTrim($data,'');

		$data['meta']->robots = 0;
		return view('fe.static_pages.faq',compact(['data']));
	}

	public function sitemap()
	{
		$meta = new MetaController;
		$data['meta'] = $meta->show(13);
		$data['meta'] = $meta->metaTrim($data,'');

		$category = new CategoryController;
		$data['categories'] = $category->categories(array('id','name','seo_url','image_url'));

		$store = new StoreController;
		$data['stores'] = $store->stores(array('id','title','seo_url'));

		$data['meta']->robots = 0;
		return view('fe.static_pages.sitemap',compact(['data']));
	}

	public function sitemapXml()
	{
		$category = new CategoryController;
		$data['categories'] = $category->categories(array('id','name','seo_url','image_url'));

		$store = new StoreController;
		$data['stores'] = $store->stores(array('id','title','seo_url'));
		return response()->view('fe.static_pages.sitemapXml',compact(['data']))->header('Content-Type', 'text/xml');
	}
}
