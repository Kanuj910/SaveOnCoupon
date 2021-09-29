<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(array (
  0 => 
  array (
    'id' => 1,
    'name' => 'network-create',
    'display_name' => 'Add Network',
    'description' => 'Add Network',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'network-read',
    'display_name' => 'Display Network',
    'description' => 'Display Network',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'network-update',
    'display_name' => 'Edit Network',
    'description' => 'Edit Network',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'network-destroy',
    'display_name' => 'Delete Network',
    'description' => 'Delete Network',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'category-create',
    'display_name' => 'Add Category',
    'description' => 'Add Category',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'category-read',
    'display_name' => 'Display Category',
    'description' => 'Display Category',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'category-update',
    'display_name' => 'Edit Category',
    'description' => 'Edit Category',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'category-destroy',
    'display_name' => 'Delete Category',
    'description' => 'Delete Category',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'event-create',
    'display_name' => 'Add Event',
    'description' => 'Add Event',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'event-read',
    'display_name' => 'Display Event',
    'description' => 'Display Event',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  10 => 
  array (
    'id' => 11,
    'name' => 'event-update',
    'display_name' => 'Edit Event',
    'description' => 'Edit Event',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  11 => 
  array (
    'id' => 12,
    'name' => 'event-destroy',
    'display_name' => 'Delete Event',
    'description' => 'Delete Event',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  12 => 
  array (
    'id' => 13,
    'name' => 'store-create',
    'display_name' => 'Add Store',
    'description' => 'Add Store',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  13 => 
  array (
    'id' => 14,
    'name' => 'store-read',
    'display_name' => 'Display Store',
    'description' => 'Display Store',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  14 => 
  array (
    'id' => 15,
    'name' => 'store-update',
    'display_name' => 'Edit Store',
    'description' => 'Edit Store',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  15 => 
  array (
    'id' => 16,
    'name' => 'store-destroy',
    'display_name' => 'Delete Store',
    'description' => 'Delete Store',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  16 => 
  array (
    'id' => 17,
    'name' => 'users-create',
    'display_name' => 'Add Users',
    'description' => 'Add Users',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  17 => 
  array (
    'id' => 18,
    'name' => 'users-read',
    'display_name' => 'Display Users',
    'description' => 'Display Users',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  18 => 
  array (
    'id' => 19,
    'name' => 'users-update',
    'display_name' => 'Edit Users',
    'description' => 'Edit Users',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  19 => 
  array (
    'id' => 20,
    'name' => 'users-destroy',
    'display_name' => 'Delete Users',
    'description' => 'Delete Users',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  20 => 
  array (
    'id' => 21,
    'name' => 'roles-create',
    'display_name' => 'Add Roles',
    'description' => 'Add Roles',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  21 => 
  array (
    'id' => 22,
    'name' => 'roles-read',
    'display_name' => 'Display Roles',
    'description' => 'Display Roles',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  22 => 
  array (
    'id' => 23,
    'name' => 'roles-update',
    'display_name' => 'Edit Roles',
    'description' => 'Edit Roles',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  23 => 
  array (
    'id' => 24,
    'name' => 'roles-destroy',
    'display_name' => 'Delete Roles',
    'description' => 'Delete Roles',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  24 => 
  array (
    'id' => 25,
    'name' => 'coupon-create',
    'display_name' => 'Add Coupon',
    'description' => 'Add Coupon',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  25 => 
  array (
    'id' => 26,
    'name' => 'coupon-read',
    'display_name' => 'Display Coupon',
    'description' => 'Display Coupon',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  26 => 
  array (
    'id' => 27,
    'name' => 'coupon-update',
    'display_name' => 'Edit Coupon',
    'description' => 'Edit Coupon',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  27 => 
  array (
    'id' => 28,
    'name' => 'coupon-destroy',
    'display_name' => 'Delete Coupon',
    'description' => 'Delete Coupon',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  28 => 
  array (
    'id' => 29,
    'name' => 'automation-create',
    'display_name' => 'Add Automation',
    'description' => 'Add Automation',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  29 => 
  array (
    'id' => 30,
    'name' => 'automation-read',
    'display_name' => 'Display Automation',
    'description' => 'Display Automation',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  30 => 
  array (
    'id' => 31,
    'name' => 'automation-update',
    'display_name' => 'Edit Automation',
    'description' => 'Edit Automation',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  31 => 
  array (
    'id' => 32,
    'name' => 'automation-destroy',
    'display_name' => 'Delete Automation',
    'description' => 'Delete Automation',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  32 => 
  array (
    'id' => 33,
    'name' => 'uk-create',
    'display_name' => 'Add UK',
    'description' => 'Add UK',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  33 => 
  array (
    'id' => 34,
    'name' => 'uk-read',
    'display_name' => 'Display UK',
    'description' => 'Display UK',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  34 => 
  array (
    'id' => 35,
    'name' => 'uk-update',
    'display_name' => 'Edit UK',
    'description' => 'Edit UK',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  35 => 
  array (
    'id' => 36,
    'name' => 'uk-destroy',
    'display_name' => 'Delete UK',
    'description' => 'Delete UK',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  36 => 
  array (
    'id' => 37,
    'name' => 'aus-create',
    'display_name' => 'Add AUS',
    'description' => 'Add AUS',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  37 => 
  array (
    'id' => 38,
    'name' => 'aus-read',
    'display_name' => 'Display AUS',
    'description' => 'Display AUS',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  38 => 
  array (
    'id' => 39,
    'name' => 'aus-update',
    'display_name' => 'Edit AUS',
    'description' => 'Edit AUS',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  39 => 
  array (
    'id' => 40,
    'name' => 'aus-destroy',
    'display_name' => 'Delete AUS',
    'description' => 'Delete AUS',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  40 => 
  array (
    'id' => 41,
    'name' => 'ind-create',
    'display_name' => 'Add IND',
    'description' => 'Add IND',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  41 => 
  array (
    'id' => 42,
    'name' => 'ind-read',
    'display_name' => 'Display IND',
    'description' => 'Display IND',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  42 => 
  array (
    'id' => 43,
    'name' => 'ind-update',
    'display_name' => 'Edit IND',
    'description' => 'Edit IND',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  43 => 
  array (
    'id' => 44,
    'name' => 'ind-destroy',
    'display_name' => 'Delete IND',
    'description' => 'Delete IND',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  44 => 
  array (
    'id' => 45,
    'name' => 'email-create',
    'display_name' => 'Add Email',
    'description' => 'Add Email',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  45 => 
  array (
    'id' => 46,
    'name' => 'email-read',
    'display_name' => 'Display Email',
    'description' => 'Display Email',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  46 => 
  array (
    'id' => 47,
    'name' => 'email-update',
    'display_name' => 'Edit Email',
    'description' => 'Edit Email',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  47 => 
  array (
    'id' => 48,
    'name' => 'email-destroy',
    'display_name' => 'Delete Email',
    'description' => 'Delete Email',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  48 => 
  array (
    'id' => 49,
    'name' => 'swp-create',
    'display_name' => 'Add SWP',
    'description' => 'Add SWP',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  49 => 
  array (
    'id' => 50,
    'name' => 'swp-read',
    'display_name' => 'Display SWP',
    'description' => 'Display SWP',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  50 => 
  array (
    'id' => 51,
    'name' => 'swp-update',
    'display_name' => 'Edit SWP',
    'description' => 'Edit SWP',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  51 => 
  array (
    'id' => 52,
    'name' => 'swp-destroy',
    'display_name' => 'Delete SWP',
    'description' => 'Delete SWP',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  52 => 
  array (
    'id' => 53,
    'name' => 'seo-create',
    'display_name' => 'Add SEO',
    'description' => 'Add SEO',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  53 => 
  array (
    'id' => 54,
    'name' => 'seo-read',
    'display_name' => 'Display SEO',
    'description' => 'Display SEO',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  54 => 
  array (
    'id' => 55,
    'name' => 'seo-update',
    'display_name' => 'Edit SEO',
    'description' => 'Edit SEO',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  55 => 
  array (
    'id' => 56,
    'name' => 'seo-destroy',
    'display_name' => 'Delete SEO',
    'description' => 'Delete SEO',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  56 => 
  array (
    'id' => 57,
    'name' => 'cache-create',
    'display_name' => 'Add Cache',
    'description' => 'Add Cache',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  57 => 
  array (
    'id' => 58,
    'name' => 'cache-read',
    'display_name' => 'Display Cache',
    'description' => 'Display Cache',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  58 => 
  array (
    'id' => 59,
    'name' => 'cache-update',
    'display_name' => 'Edit Cache',
    'description' => 'Edit Cache',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
  59 => 
  array (
    'id' => 60,
    'name' => 'cache-destroy',
    'display_name' => 'Delete Cache',
    'description' => 'Delete Cache',
    'created_at' => '2017-02-04 10:43:46',
    'updated_at' => '2017-02-04 10:43:46',
  ),
));
    }
}
