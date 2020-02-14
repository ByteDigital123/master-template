<?php

use Illuminate\Database\Seeder;

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
            'first_name' => 'Alex',
            'last_name' => 'Etel',
            'username' => 'AlexEtel',
            'email' => 'Alex@builtbypixel.com',
            'telephone' => '07775552221',
            'api_token' => 'token3u2h3ri3bf',
        ]);
    }
}
