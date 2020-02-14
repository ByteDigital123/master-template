<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
        $this->call(CountriesTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
    }
}
