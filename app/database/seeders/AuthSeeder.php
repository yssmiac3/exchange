<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
           'name' => 'Yehor Hnedash',
           'email' => 'admin@exchange.com',
            'password' => bcrypt('secret'),
        ]);
        $admin->roles()->attach(Role::find(1));

        $client = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@exchange.com',
            'password' => bcrypt('secret'),
        ]);
        $client->roles()->attach(Role::find(2));
    }
}
