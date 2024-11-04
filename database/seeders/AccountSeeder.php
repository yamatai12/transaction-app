<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['name' => 'Taisei', 'balance' => 100000],
            ['name' => 'Father', 'balance' => 100000000],
        ];

        DB::table('accounts')->insert
        (
            $accounts
        );
    }
}
