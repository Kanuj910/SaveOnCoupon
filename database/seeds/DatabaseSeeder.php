<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        // $this->call(NetworksTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(StoresTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
        // $this->call(CouponsTableSeeder::class);
        // $this->call(CatStoresTableSeeder::class);
        // $this->call(CatCouponsTableSeeder::class);
        // $this->call(EveCouponsTableSeeder::class);
        $this->call(HomeCouponsTableSeeder::class);
        $this->call(MetasTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
    }
}
