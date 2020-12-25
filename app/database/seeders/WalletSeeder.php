<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wallet;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::create([
            'currency' => 'EUR',
            'amount' => 10,
            'user_id' => 2
        ]);
        Wallet::create([
            'currency' => 'EUR',
            'amount' => 0,
            'user_id' => 1
        ]);
    }
}
