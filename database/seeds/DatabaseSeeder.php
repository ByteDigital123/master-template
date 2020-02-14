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
        $this->call(ContactFormsTableSeeder::class);
        $this->call(TransactionStatusesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
