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
           'description' => 'Customer 1',
            'deposit' => 2000,
            'bank_id' => 1,
        ]);

        DB::table('transactions')->insert([
            'description' => 'Supplier 1',
            'withdraw' => 500,
            'bank_id' => 1,
        ]);

        DB::table('transactions')->insert([
            'description' => 'Customer 2',
            'deposit' => 4000,
            'bank_id' => 2,
        ]);

        DB::table('transactions')->insert([
            'description' => 'Supplier 2',
            'withdraw' => 2000,
            'bank_id' => 2,
        ]);

        DB::table('transactions')->insert([
            'description' => 'Customer 3',
            'deposit' => 2500,
            'bank_id' => 3,
        ]);
    }
}
