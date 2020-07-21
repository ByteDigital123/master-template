<?php

use Illuminate\Database\Seeder;

class ContentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_statuses')->insert([
            'name' => 'Image',
        ],[
            'name' => 'Video',
        ],[
            'name' => 'PDF',
        ],[
            'name' => 'File',
        ],[
            'name' => 'Audio',
        ]);
    }
}
