<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

			['name' => 'karthik',
			'email' => 'karthik@coupontopay.com',
			'password' => '$2y$10$.z3n3ytL2PrFN9ZfO3fF8OuHGXjRMYmTXu9xrhFQZdBk9pcLHuzkC',
			'remember_token' => 'g4Hv03nvC5CDPLA9E3yy0J7PJVoW2RWONjkiRzyWF4got172W0aLxHROqe2F',
			'created_at' => '2017-02-08 12:37:15',
			'updated_at' => '2017-03-17 20:18:48'],

			['name' => 'Sagar', 
			'email' => 'vidyasagar@coupontopay.com', 
			'password' => '$2y$10$MkkvrtmHYXi753aOItxa7OcbSmkEdd.8.xzfUSVx3YwmCMEkD7HOi', 
			'remember_token' => 'l4NnVxhoYVt3Gbx71quloP8xzzndqFeojEdWm97IgBc6emRebbVLwIQYpUrD', 
			'created_at' => '2017-02-09 09:56:29', 
			'updated_at' => '2017-02-13 23:46:57'],

			['name' => 'Khirod', 
			'email' => 'khirod@coupontopay.com', 
			'password' => '$2y$10$ske7uyn5PGf.AhHFSBbWXeILeNxd99QvOmsqe9WzhvSYedUvFK9FK', 
			'remember_token' => 'agJ5V84HUsTy1vWEnkxQl3OP2XvFjVRhnJMfnqgl367oZpa3KeRvzoMn3TyU', 
			'created_at' => '2017-02-09 23:54:27', 
			'updated_at' => '2017-03-17 20:18:34'],

			['name' => 'Krishna Prasad', 
			'email' => 'krishnaprasad@coupontopay.com', 
			'password' => '$2y$10$cl6SHMfj6PRMMD7bKljNs.B8KpBp/cBlyggPYzDEPNkAH/jE4TbNK', 
			'remember_token' => 'R6hELuwhV5x6XVblmMcXmUTLLatmDp9wUX8kBkFpeqDju3OWXQS9R7VfuSq3', 
			'created_at' => '2017-02-14 02:36:53', 
			'updated_at' => '2017-02-14 02:40:23'],

			['name' => 'Sankar', 
			'email' => 'sankar@coupontopay.com', 
			'password' => '$2y$10$EtTNt3gXMRFskkIkDJhR9ehqZmIgXNcDv/dSqp30dkN6Nz.r0pSzK', 
			'remember_token' => '',
			'created_at' => '2017-02-17 03:50:08', 
			'updated_at' => '2017-02-17 03:50:08'],

			['name' => 'Anusha', 
			'email' => 'sanusha195@gmail.com', 
			'password' => '$2y$10$2zVws26wzD3.EmzPnmTJC.Hf5zMsKsd3.0f1PeaLQky4vWiruszcG', 
			'remember_token' => 'BpTd0zQfxkJ6SDnXhJxiRoYQlv1fukjExIYTXxsNTufJCOEhAZxClGDAzfWQ', 
			'created_at' => '2017-02-17 22:26:59', 
			'updated_at' => '2017-02-21 02:32:08'],

			['name' => 'Sharon', 
			'email' => 'sharon@coupontopay.com', 
			'password' => '$2y$10$PvbjZSfNc3FPDfiaJciBeOmip3Lk8Tx2qnu0e9nbcy0QsiR/L.lYi', 
			'remember_token' => 'aDW4n9hRQ5GHZrrKCpDKld0ofcR4yTIHgaO0tamx8UUq5t3v83JOUMEyDvBQ', 
			'created_at' => '2017-03-01 22:00:09', 
			'updated_at' => '2017-03-02 23:07:22'],

			['name' => 'Sheryl', 
			'email' => 'sheryl@coupontopay.com', 
			'password' => '$2y$10$Z5u9ArWi6IVXvm9O6o1amO4/vwNihWSTGypdCuC6In31LIW.V56Fy', 
			'remember_token' => 'IBM2ogN8H5niNDqmMYWblc4Li9R6M7VRSCSqFGiNE2AXCzv6VUI2PgqD0Gnb', 
			'created_at' => '2017-03-01 22:01:04', 
			'updated_at' => '2017-03-10 23:00:49'],

			['name' => 'Pathan', 
			'email' => 'pathan@coupontopay.com', 
			'password' => '$2y$10$hh43V3pHoqAqquIKHpbvdOJKu21q6I/jnvpTNs8fCbcdLfOcZSAO.', 
			'remember_token' => 'pMJ0ncQoNluDZ5s4itMJkzmnRTtRY1vZcuh4mjZrhVJJtrqz43GGCpJLxNf7', 
			'created_at' => '2017-03-02 20:14:29', 
			'updated_at' => '2017-03-02 23:10:57'],

			['name' => 'Vinaya', 
			'email' => 'vinaya@coupontopay.com', 
			'password' => '$2y$10$vFTZdBZXdDZ/0dep0G1E0.CzruGXNwi7kv8AXaZhix5ZOSfrXQb7i', 
			'remember_token' => '4AKX2o3a880wyX9Z29NwCjYpACocZj4p3KpDCvymERjHBpJeFvKtKPl5miUK', 
			'created_at' => '2017-03-02 20:14:56', 
			'updated_at' => '2017-03-02 20:23:36'],

			['name' => 'Padmavathi', 
			'email' => 'padmavathi@coupontopay.com', 
			'password' => '$2y$10$ErsP4/fbXZNoWA77c2IZwuO3wJuKa5COwAxGD8R2H7DH7j6D.aD9K', 
			'remember_token' => 'S9Xi66HzyMwaWuzOCE0fFqWQCCjq5UUOjituwGemiL4ALs53CsChEMyV2Hqo', 
			'created_at' => '2017-03-02 20:14:56',
			'updated_at' => '2017-03-02 21:44:20']
		]);
    }
}
