<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type')->insert([
            'id' => 1,
            'description' => 'admin',
        ]);
        DB::table('users_type')->insert([
            'id' => 2,
            'description' => 'user',
        ]);
        
    }
}
