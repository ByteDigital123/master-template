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
            'phone_number' => '07775551112',
            'email' => 'Johndoe@gmail.com',
            'subject' => 'testing subject',
            'message' => 'testing message here',
        ]);
    }
}
