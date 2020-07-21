<?php

use Illuminate\Database\Seeder;

class TransactionStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_statuses')->insert([
            'name' => 'Active',
        ],[
            'name' => 'Pending',
        ],[
            'name' => 'Cancelled',
        ],[
            'name' => 'Error',
        ],[
            'name' => 'Completed',
        ]);
    }
}
