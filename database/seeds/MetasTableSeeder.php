<?php

use Illuminate\Database\Seeder;

class MetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metas')->insert(array (
  0 => 
  array (
    'id' => 1,
    'page' => 'home',
    'url' => '/',
    'meta_title' => 'Best Discounts, Coupons and Deals at Coupontopay.in',
    'meta_description' => 'Save big using online Deals, Promos and Coupon codes for all popular stores available at Coupontopay.in.',
    'meta_keywords' => 'Discounts, Coupons,  Promo codes,  online deals, Coupon Codes, Discount Codes, Promotional codes,Coupontopay.in',
    'h1' => 'Best Coupons and Promo Codes',
    'h2' => 'Top Deals and Discounts',
    'c_uid' => 0,
    'u_uid' => 1,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-03-22 18:02:00',
  ),
  1 => 
  array (
    'id' => 2,
    'page' => 'store',
    'url' => '/get/{store-url}',
    'meta_title' => '%S% Coupons and Discount Codes',
    'meta_description' => 'store description',
    'meta_keywords' => 'store keywords',
    'h1' => '%S% Coupons',
    'h2' => '%S% Coupon Codes',
    'c_uid' => 0,
    'u_uid' => 3,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-03-01 23:00:16',
  ),
  2 => 
  array (
    'id' => 3,
    'page' => 'category',
    'url' => '/category/{category-url}',
    'meta_title' => 'Latest %C% Coupons and Discounts to save big',
    'meta_description' => 'Find all %ActCou% Discounts and Coupons available at Coupontopay.in. Browse for %C% related Genuine deals to save big.',
    'meta_keywords' => '%C% Coupons, %C% Discounts, %C% Deals, %C% Promo Codes, %C% Promotional codes, Coupontopay.in',
    'h1' => '%C% Discounts and Deals',
    'h2' => '%C% Coupons',
    'c_uid' => 0,
    'u_uid' => 2,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-03-03 21:31:31',
  ),
  3 => 
  array (
    'id' => 4,
    'page' => 'event',
    'url' => '/{event-url}-offers',
    'meta_title' => 'event title',
    'meta_description' => 'event description',
    'meta_keywords' => 'event keywords',
    'h1' => 'event H1',
    'h2' => 'event H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  4 => 
  array (
    'id' => 5,
    'page' => 'eventList',
    'url' => '/events/',
    'meta_title' => 'eventList title',
    'meta_description' => 'eventList description',
    'meta_keywords' => 'eventList keywords',
    'h1' => 'eventList H1',
    'h2' => 'eventList H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  5 => 
  array (
    'id' => 6,
    'page' => 'categoryList',
    'url' => '/categories/',
    'meta_title' => 'Categories at Coupontopay.in',
    'meta_description' => 'Find all the Categories and related stores to get discounts on all your orders at Coupontopay.in',
    'meta_keywords' => 'Categories, Stores, Category coupons, discounts, Deals, Coupontopay.in',
    'h1' => 'Categories',
    'h2' => 'Stores by Category ',
    'c_uid' => 0,
    'u_uid' => 2,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-03-03 23:34:55',
  ),
  6 => 
  array (
    'id' => 7,
    'page' => 'storeList',
    'url' => '/stores/',
    'meta_title' => 'CouponToPay.in - Store List',
    'meta_description' => 'storeList description',
    'meta_keywords' => 'storeList keywords',
    'h1' => 'Coupons By Store',
    'h2' => 'storeList H2',
    'c_uid' => 0,
    'u_uid' => 3,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-03-02 20:47:58',
  ),
  7 => 
  array (
    'id' => 8,
    'page' => 'about',
    'url' => '/about-us.html',
    'meta_title' => 'about title',
    'meta_description' => 'about description',
    'meta_keywords' => 'about keywords',
    'h1' => 'about H1',
    'h2' => 'about H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  8 => 
  array (
    'id' => 9,
    'page' => 'contact',
    'url' => '/contact-us.html',
    'meta_title' => 'contact title',
    'meta_description' => 'contact description',
    'meta_keywords' => 'contact keywords',
    'h1' => 'contact H1',
    'h2' => 'contact H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  9 => 
  array (
    'id' => 10,
    'page' => 'privacy',
    'url' => '/privacy-policy.html',
    'meta_title' => 'privacy title',
    'meta_description' => 'privacy description',
    'meta_keywords' => 'privacy keywords',
    'h1' => 'privacy H1',
    'h2' => 'privacy H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  10 => 
  array (
    'id' => 11,
    'page' => 'terms',
    'url' => '/terms-and-conditions.html',
    'meta_title' => 'terms title',
    'meta_description' => 'terms description',
    'meta_keywords' => 'terms keywords',
    'h1' => 'terms H1',
    'h2' => 'terms H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:44',
    'updated_at' => '2017-02-27 09:47:44',
  ),
  11 => 
  array (
    'id' => 12,
    'page' => 'faq',
    'url' => '/faq.html',
    'meta_title' => 'faq title',
    'meta_description' => 'faq description',
    'meta_keywords' => 'faq keywords',
    'h1' => 'faq H1',
    'h2' => 'faq H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 09:47:45',
    'updated_at' => '2017-02-27 09:47:45',
  ),
  12 => 
  array (
    'id' => 13,
    'page' => 'sitemap',
    'url' => '/sitemap.html',
    'meta_title' => 'faq title',
    'meta_description' => 'faq description',
    'meta_keywords' => 'faq keywords',
    'h1' => 'faq H1',
    'h2' => 'faq H2',
    'c_uid' => 0,
    'u_uid' => 0,
    'created_at' => '2017-02-27 20:17:45',
    'updated_at' => '2017-02-27 20:17:45',
  ),
));
    }
}
