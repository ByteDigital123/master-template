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
        $files_arr = scandir( dirname(__FILE__) );
        foreach ($files_arr as $key => $file){
            if ($file !== 'DatabaseSeeder.php' && $file[0] !== "."){
                $this->call( explode('.', $file)[0]);
            }
        }
    }
}
