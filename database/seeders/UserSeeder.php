<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ["name"=>"Gran",
            "email"=>"admin@gmail.com","password"=>Hash::make("admin123"),
            "address"=>"Grancypher","gender"=>"Male","dob"=>"2000-12-25"],
            
        ];
        DB::table("users")->insert($user);
    }
}
