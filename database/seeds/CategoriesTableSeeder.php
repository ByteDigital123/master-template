<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Accounting & Finance',
        ],[
            'name' => 'Business & Leadership',
        ],[
            'name' => 'Health & Safety',
        ],[
            'name' => 'Emotional Intelligence',
        ]);
    }
}
