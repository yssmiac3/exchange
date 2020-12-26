<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);

        Role::create([
            'name' => 'client',
            'slug' => 'client'
        ]);
    }
}
