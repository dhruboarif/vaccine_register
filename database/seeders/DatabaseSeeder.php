<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'center_id' => '0',
            'role_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('arifarif'),
        ]);
        
        DB::table('users')->insert([
            'center_id' => '0',
            'role_id' => '2',
            'name' => 'operator',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('arifarif'),
        ]);
        
        DB::table('users')->insert([
            'center_id' => '0',
            'role_id' => '3',
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('pass@manager'),
        ]);
    }
}
