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
        DB::table('categories')->insert(array (
            0 =>
                array (
            'name' => 'Accounting & Finance',
            'slug' => 'accounting-and-finance'
                ),
            1 =>
                array (
            'name' => 'Business & Leadership',
            'slug' => 'business-and-leadership'
                ),
            2 =>
                array (
            'name' => 'Health & Safety',
            'slug' => 'health-and-safety'
                ),
            3 =>
                array (
            'name' => 'Emotional Intelligence',
            'slug' => 'emotional-intelligence'
                )
        ));
    }
}
