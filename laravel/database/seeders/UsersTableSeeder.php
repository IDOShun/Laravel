<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear table
        DB::table('users')->truncate();

        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password'),
            'CRUD' => 3,
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => Hash::make('password'),
            'CRUD' => 3,
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Bob Smith',
            'email' => 'bob.smith@example.com',
            'password' => Hash::make('password'),
            'CRUD' => 210,
            'role_id' => 3
        ]);
    }
}
