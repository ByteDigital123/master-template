<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('admin_users')->insert([
          'first_name' => 'Admin',
          'last_name' => 'User',
          'email' => 'admin@nucleus.org',
          'password' => bcrypt('abc123'),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
       ]);
    }
}
