<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['domain' => 'admin.test115.in'], function () {

	Route::get('server_bak',function(){
		return view('server_bak');
	});

	Route::get('jsontoarray',[
		'uses' => 'jsonController@index',
		'as' => 'jsontoarray'
	]);

	Route::get('cron/discount',[
		'uses' => 'CronController@discount',
		'as' => 'cron.discount'
	]);

	Route::get('allajax',[
		'uses' => 'SearchController@autoCompleteA',
		'as' => 'search.admin.all.json'
	]);
	Route::get('storeajax',[
		'uses' => 'SearchController@autoComplete',
		'as' => 'search.admin.store.json'
	]);
	Route::get('categoryajax',[
		'uses' => 'SearchController@autoCompleteC',
		'as' => 'search.admin.category.json'
	]);
	Route::get('eventajax',[
		'uses' => 'SearchController@autoCompleteE',
		'as' => 'search.admin.event.json'
	]);
	
	Route::group(['middleware' => ['auth']], function () {
	Route::get('/', function () {
	    return view('welcome');
	});


	Route::get('search/stores/{id}',[
		'uses' => 'SearchController@searchStores',
		'as' => 'search.stores.json'
	]);
	Route::get('search/stores/latest/{limit}',[
		'uses' => 'SearchController@searchStoresLatest',
		'as' => 'search.stores.latest.json'
	]);
	Route::get('search/coupons/latest/{limit}',[
		'uses' => 'SearchController@searchCouponsLatest',
		'as' => 'search.coupons.latest.json'
	]);
	Route::get('search/stores/coupons/{id}',[
		'uses' => 'SearchController@searchStoreCoupons',
		'as' => 'search.stores.coupons.json'
	]);

	// Route::get('/errorNotFound', [
	// 	'as' => 'notFound',
	// 	'uses' => 'errorController@notfound'
	// ]);


// users routes
Route::group(['middleware' => ['role:users']],function(){
	Route::get('users',[
		'as'=>'users.index',
		'uses'=>'UserController@index'
	]);		
	Route::get('users/create',[
		'as'=>'users.create',
		'uses'=>'UserController@create'	
	]);
	Route::post('users/create',[
		'as'=>'users.store',
		'uses'=>'UserController@store'	
	]);
	Route::get('users/{users}/edit',[
		'as'=>'users.edit',
		'uses'=>'UserController@edit'	
	]);
	Route::put('users/{users}',[
		'as'=>'users.update',
		'uses'=>'UserController@update'	
	]);
	Route::delete('users/{users}',[
		'as'=>'users.destroy',
		'uses'=>'UserController@destroy'	
	]);
});


// roles routes
Route::group(['middleware' => ['role:roles']],function(){
	Route::get('roles',[
		'as'=>'roles.index',
		'uses'=>'RoleController@index'
	]);
	Route::get('roles/create',[
		'as'=>'roles.create',
		'uses'=>'RoleController@create'
	]);
	Route::post('roles/create',[
		'as'=>'roles.store',
		'uses'=>'RoleController@store'
	]);
	Route::get('roles/{id}',[
		'as'=>'roles.show',
		'uses'=>'RoleController@show'
	]);
	Route::get('roles/{id}/edit',[
		'as'=>'roles.edit',
		'uses'=>'RoleController@edit'
	]);
	Route::patch('roles/{id}',[
		'as'=>'roles.update',
		'uses'=>'RoleController@update'
	]);
	Route::delete('roles/{id}',[
		'as'=>'roles.destroy',
		'uses'=>'RoleController@destroy'
	]);
});


// network routes
Route::group(['middleware' => ['role:network']],function(){
	Route::get('network',[
		'as'=>'network.admin.list',
		'uses'=>'NetworkController@networkAdminList'
	]);
	Route::get('network/create',[
		'as'=>'network.admin.addForm',
		'uses'=>'NetworkController@networkAdminAddForm'
	]);
	Route::post('network/create',[
		'as'=>'network.store',
		'uses'=>'NetworkController@networkAdd'
	]);
	Route::get('network/{id}/edit',[
		'as'=>'network.admin.editForm',
		'uses'=>'NetworkController@networkAdminEditForm'
	]);
	Route::put('network/{id}',[
		'uses' => 'NetworkController@networkEdit',
		'as' => 'network.update'
	]);
	Route::delete('network/{id}',[
		'as'=>'network.destroy',
		'uses'=>'NetworkController@networkDeactive'
	]);
});

// category routes CategoriesController
Route::group(['middleware' => ['role:category']],function(){
	Route::get('category',[
		'as'=>'category.admin.list',
		'uses'=>'CategoryController@categoryAdminList'
	]);
	Route::get('category/create',[
		'as'=>'category.admin.addForm',
		'uses'=>'CategoryController@categoryAdminAddForm'
	]);
	Route::post('category/create',[
		'as'=>'category.store',
		'uses'=>'CategoryController@categoryAdd'
	]);
	Route::get('category/{id}/edit',[
		'as'=>'category.admin.editForm',
		'uses'=>'CategoryController@categoryAdminEditForm'
	]);
	Route::put('category/{id}',[
		'uses' => 'CategoryController@categoryEdit',
		'as' => 'category.update'
	]);
	Route::delete('category/{id}',[
		'as'=>'category.destroy',
		'uses'=>'CategoryController@categoryDeactive'
	]);
});

// event routes
Route::group(['middleware' => ['role:event']],function(){
	Route::get('event',[
		'as'=>'event.admin.list',
		'uses'=>'EventController@eventAdminList'
	]);
	Route::get('event/create',[
		'as'=>'event.admin.addForm',
		'uses'=>'EventController@eventAdminAddForm'
	]);
	Route::post('event/create',[
		'as'=>'event.store',
		'uses'=>'EventController@eventAdd'
	]);
	Route::get('event/{id}/edit',[
		'as'=>'event.admin.editForm',
		'uses'=>'EventController@eventAdminEditForm'
	]);
	Route::put('event/{id}',[
		'uses' => 'EventController@eventEdit',
		'as' => 'event.update'
	]);
	Route::delete('event/{id}',[
		'as'=>'event.destroy',
		'uses'=>'EventController@eventDeactive'
	]);
});

// store routes
Route::group(['middleware' => ['role:store']],function(){
	Route::get('store',[
		'as'=>'store.admin.list',
		'uses'=>'StoreController@storeAdminList'
	]);
	Route::get('store/create',[
		'as'=>'store.admin.addForm',
		'uses'=>'StoreController@storeAdminAddForm'
	]);
	Route::post('store/create',[
		'as'=>'store.store',
		'uses'=>'StoreController@storeAdd'
	]);
	Route::get('store/{id}/edit',[
		'as'=>'store.admin.editForm',
		'uses'=>'StoreController@storeAdminEditForm'
	]);
	Route::put('store/{id}',[
		'uses' => 'StoreController@storeEdit',
		'as' => 'store.update'
	]);
	Route::delete('store/{id}',[
		'as'=>'store.destroy',
		'uses'=>'StoreController@storeDeactive'
	]);
});

// seo routes
Route::group(['middleware' => ['role:seo'],'prefix' => 'seo'],function(){
	Route::get('/',[
		'uses' => 'MetaController@index',
		'as' => 'meta.index'
	]);
	Route::get('category',[
		'uses' => 'MetaController@category',
		'as' => 'meta.category'
	]);
	Route::get('type/{type}/{id}',[
		'uses' => 'MetaController@linkType',
		'as' => 'meta.url.type'
	]);
	Route::get('category',[
		'uses' => 'MetaController@category',
		'as' => 'meta.category'
	]);
	Route::get('event',[
		'uses' => 'MetaController@event',
		'as' => 'meta.event'
	]);
	Route::get('store',[
		'uses' => 'MetaController@store',
		'as' => 'meta.store'
	]);
	Route::get('all',[
		'uses' => 'MetaController@all',
		'as' => 'meta.all'
	]);
	Route::get('all/{id}/edit',[
		'uses' => 'MetaController@allEdit',
		'as' => 'meta.all.editForm'
	]);
	Route::get('category/{id}/edit',[
		'uses' => 'MetaController@categoryEdit',
		'as' => 'meta.category.editForm'
	]);
	Route::get('event/{id}/edit',[
		'uses' => 'MetaController@eventEdit',
		'as' => 'meta.event.editForm'
	]);
	Route::get('store/{id}/edit',[
		'uses' => 'MetaController@storeEdit',
		'as' => 'meta.store.editForm'
	]);
	Route::put('category/{id}',[
		'uses' => 'MetaController@categoryMetaEdit',
		'as' => 'meta.category.update'
	]);
	Route::put('event/{id}',[
		'uses' => 'MetaController@eventMetaEdit',
		'as' => 'meta.event.update'
	]);
	Route::put('store/{id}',[
		'uses' => 'MetaController@storeMetaEdit',
		'as' => 'meta.store.update'
	]);
	Route::put('page/{id}',[
		'uses' => 'MetaController@pageEdit',
		'as' => 'meta.all.update'
	]);
	Route::post('store/content/sort',[
		'uses' => 'ContentController@sort',
		'as' => 'store.content.sort'
	]);
	Route::resource('store/content','ContentController');
});

// coupon routes
Route::group(['middleware' => ['role:coupon']],function(){
	Route::get('coupon',[
		'as'=>'coupon.admin.list',
		'uses'=>'CouponController@couponAdminList'
	]);
	Route::get('coupon/create',[
		'as'=>'coupon.admin.addForm',
		'uses'=>'CouponController@couponAdminAddForm'
	]);
	Route::post('coupon/create',[
		'as'=>'coupon.store',
		'uses'=>'CouponController@couponAdd'
	]);
	Route::get('coupon/{id}/edit',[
		'as'=>'coupon.admin.editForm',
		'uses'=>'CouponController@couponAdminEditForm'
	]);
	Route::put('coupon/{id}',[
		'uses' => 'CouponController@couponEdit',
		'as' => 'coupon.update'
	]);
	Route::delete('coupon/{id}',[
		'as'=>'coupon.destroy',
		'uses'=>'CouponController@couponDeactive'
	]);	
	Route::get('coupon/sid/{id}/',[
		'as'=>'coupon.admin.bysid',
		'uses'=>'CouponController@couponsBySID'
	]);

	


//	Route::get('allajax',[
//		'uses' => 'SearchController@autoCompleteA',
//		'as' => 'search.all.json'
//	]);
//	Route::get('storeajax',[
//		'uses' => 'SearchController@autoComplete',
//		'as' => 'search.store.json'
//	]);
//	Route::get('categoryajax',[
//		'uses' => 'SearchController@autoCompleteC',
//		'as' => 'search.category.json'
//	]);
//	Route::get('eventajax',[
//		'uses' => 'SearchController@autoCompleteE',
//		'as' => 'search.event.json'
//	]);
});

});

Route::resource('front','FrontController');

Route::auth();

});


Route::group(['domain' => 'www.test115.in'], function () {
	Route::get('/',[
		'uses' => 'PagesController@home',
		'as' => 'page.home'
	]);
	Route::get('/get/{url}',[
		'uses' => 'PagesController@store',
		'as' => 'page.store'
	]);
	Route::get('/category/{url}',[
		'uses' => 'PagesController@category',
		'as' => 'page.category'
	]);
	Route::get('/{url}-offers',[
		'uses' => 'PagesController@event',
		'as' => 'page.event'
	])->where('url','[A-Za-z0-9_\-]+');

	Route::get('/stores',[
		'uses' => 'PagesController@stores',
		'as' => 'page.stores'
	]);
	Route::get('/categories',[
		'uses' => 'PagesController@categories',
		'as' => 'page.categories'
	]);
	Route::get('/events',[
		'uses' => 'PagesController@events',
		'as' => 'page.events'
	]);
	Route::get('/contact-us.html',[
		'uses' => 'PagesController@contact',
		'as' => 'page.contact'
	]);
	Route::get('/sitemap.xml',[
		'uses' => 'PagesController@sitemapXml',
		'as' => 'page.sitemapXml'
	]);
	Route::get('/sitemap.html',[
		'uses' => 'PagesController@sitemap',
		'as' => 'page.sitemap'
	]);
	Route::get('/about-us.html',[
		'uses' => 'PagesController@about',
		'as' => 'page.about'
	]);
	Route::get('/terms-and-conditions.html',[
		'uses' => 'PagesController@terms',
		'as' => 'page.terms'
	]);
	Route::get('/privacy-policy.html',[
		'uses' => 'PagesController@privacy',
		'as' => 'page.privacy'
	]);
	Route::get('/faq.html',[
		'uses' => 'PagesController@faq',
		'as' => 'page.faq'
	]);
	Route::get('storeajax',[
		'uses' => 'SearchController@autoComplete',
		'as' => 'search.store.json'
	]);	
	Route::post('search/domain',[
		'uses' => 'SearchController@searchDomain',
		'as' => 'search.domain'
	]);
	Route::get('/use-coupon/{couponId}',[
	        'uses' => 'CouponController@useCoupon',
	        'as' => 'usecoupon'
	]);	
	Route::get('/coupon-code/{couponId}',[
	        'uses' => 'CouponController@couponCode',
	        'as' => 'couponcode'
	]);

	Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
		Route::post('sitewide',[
			'uses' => 'EmailController@sitewide',
			'as' => 'sitewide'
		]);
		Route::post('contact',[
			'uses' => 'EmailController@contact',
			'as' => 'contact'
		]);
		Route::post('store',[
			'uses' => 'EmailController@store',
			'as' => 'store'
		]);
		Route::get('verify-req',[
			'uses' => 'EmailController@verifyReq',
			'as' => 'verifyreq'
		]);
		Route::get('unsubscribe-req',[
			'uses' => 'EmailController@unsubscribeReq',
			'as' => 'unsubscribereq'
		]);
		Route::get('subscribe',[
			'uses' => 'EmailController@subscribe',
			'as' => 'subscribe'
		]);
		Route::get('verify',[
			'uses' => 'EmailController@verify',
			'as' => 'verify'
		]);
		Route::get('unsubscribe',[
			'uses' => 'EmailController@unsubscribe',
			'as' => 'unsubscribe'
		]);
		Route::get('already-subscribe',[
			'uses' => 'EmailController@subscribeAlready',
			'as' => 'subscribeAlready'
		]);
		Route::get('already-verify',[
			'uses' => 'EmailController@verifyAlready',
			'as' => 'verifyAlready'
		]);
		Route::get('already-unsubscribe',[
			'uses' => 'EmailController@unsubscribeAlready',
			'as' => 'unsubscribeAlready'
		]);
		Route::get('search',[
			'uses' => 'EmailController@unsubscribeAlready',
			'as' => 'search'
		]);
	});

});
