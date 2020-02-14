<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'status_id' => 1,
            'user_id' => 1,
            'name' => 'Alex Paid For Course Number 284',
            'total' => 1000,
            'fee' => 200,
            'net_amount' => 800,
            'transaction_reference_id' => 'REF27847FHC',
            'provider_user_id' => 1
        ]);
    }
}
