<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'bank_name' => 'Bank 1',
        ]);

        DB::table('banks')->insert([
            'bank_name' => 'Bank 2',
        ]);

        DB::table('banks')->insert([
            'bank_name' => 'Bank 3',
        ]);
    }
}
