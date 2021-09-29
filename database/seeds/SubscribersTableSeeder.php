<?php

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert(array (
  0 => 
  array (
    'id' => 1,
    'sid' => 3,
    'email' => 'karthikmasters@gmail.com',
    'did' => 0,
    'vcode' => '072b030ba126b2f4b2374f342be9ed44',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 3,
    'content' => '',
    'status' => 2,
    'created_at' => '2017-03-11 00:44:48',
    'updated_at' => '2017-03-11 00:48:39',
  ),
  1 => 
  array (
    'id' => 2,
    'sid' => 1,
    'email' => 'moulika29@gmail.com',
    'did' => 0,
    'vcode' => '98dce83da57b0395e163467c9dae521b',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 3,
    'content' => '',
    'status' => 2,
    'created_at' => '2017-03-11 01:19:13',
    'updated_at' => '2017-03-11 01:21:47',
  ),
  2 => 
  array (
    'id' => 3,
    'sid' => 0,
    'email' => 'd@gmail.com',
    'did' => 0,
    'vcode' => 'a3f390d88e4c41f2747bfa2f1b5f87db',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 4,
    'content' => '',
    'status' => 0,
    'created_at' => '2017-03-15 18:44:19',
    'updated_at' => '2017-03-15 18:44:19',
  ),
  3 => 
  array (
    'id' => 4,
    'sid' => 0,
    'email' => 'deepak@coupontopay.com',
    'did' => 0,
    'vcode' => '98f13708210194c475687be6106a3b84',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 4,
    'content' => '',
    'status' => 2,
    'created_at' => '2017-03-15 18:45:12',
    'updated_at' => '2017-03-15 18:50:35',
  ),
  4 => 
  array (
    'id' => 5,
    'sid' => 2,
    'email' => 'deepak@coupontopa.com',
    'did' => 0,
    'vcode' => '44f683a84163b3523afe57c2e008bc8c',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 3,
    'content' => '',
    'status' => 0,
    'created_at' => '2017-03-15 19:45:48',
    'updated_at' => '2017-03-15 19:45:48',
  ),
  5 => 
  array (
    'id' => 6,
    'sid' => 2,
    'email' => 'deepak@coupontopay.com',
    'did' => 0,
    'vcode' => '1c383cd30b7c298ab50293adfecb7b18',
    'ip' => '183.83.45.107',
    'ip_confirm' => '',
    'ip_date' => '0000-00-00',
    'source' => 3,
    'content' => '',
    'status' => 2,
    'created_at' => '2017-03-15 19:46:25',
    'updated_at' => '2017-03-15 19:47:33',
  ),
));
    }
}
