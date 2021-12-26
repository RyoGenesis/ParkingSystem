<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $parking_data = [
            ["name"=>"Gran",
            "email"=>"admin@gmail.com","password"=>"",
            "address"=>"Grancypher","gender"=>"Male","dob"=>"2000-12-25"],
            
        ];
        DB::table("parking_data")->insert($parking_data);
    }
}
