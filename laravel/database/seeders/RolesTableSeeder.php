<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'role' => 'System Admin'
        ]);

        Role::create([
            'id' => 2,
            'role' => 'Admin'
        ]);

        Role::create([
            'id' => 3,
            'role' => 'Merchant'
        ]);
    }
}
