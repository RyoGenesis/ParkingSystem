<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            ["license_plate"=>"AA 1234 BT", "is_parked"=>true],
            ["license_plate"=>"B 0912 WAS", "is_parked"=>true],
            ["license_plate"=>"B 1984 GO", "is_parked"=>true],
            ["license_plate"=>"DD 2020 HS", "is_parked"=>true],
        ];
        DB::table("vehicles")->insert($vehicles);
    }
}
