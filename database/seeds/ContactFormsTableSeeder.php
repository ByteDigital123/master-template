<?php

use Illuminate\Database\Seeder;

class ContactFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_forms')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'Johndoe@gmail.com',
            'message' => 'rlwebwbelubeubelfbqelfubwelirbfuwerubfweuibrflwuebrf',
            'agreed_to_marketing' => true,
        ]);
    }
}
