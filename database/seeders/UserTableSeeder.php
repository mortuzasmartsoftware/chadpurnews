<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            ['name'		=>'admin',
            'user_type'		=> 1,
            'status'		=> 1,
    		'email'		=>'admin@gmail.com',
    		'password'	=>Hash::make(123456789)],
        ]);
    }

}
