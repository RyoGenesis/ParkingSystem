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
            ["vehicle_id"=>"1",
            "unique_code"=>"CODE-1",
            "time_in"=> "2021-09-20 01:21:39" , "time_out"=> "2021-09-20 02:11:19", "is_active"=>false],
            
            ["vehicle_id"=>"1",
            "unique_code"=>"CODE-2",
            "time_in"=> "2021-09-25 11:10:20" , "time_out"=> "2021-09-25 12:10:20", "is_active"=>false],

            ["vehicle_id"=>"2",
            "unique_code"=>"CODE-3",
            "time_in"=> "2021-10-01 14:11:21" , "time_out"=> "2021-10-01 17:21:11", "is_active"=>false],

            ["vehicle_id"=>"1",
            "unique_code"=>"CODE-4",
            "time_in"=> "2021-10-01 15:21:00" , "time_out"=> "2021-10-01 16:10:10", "is_active"=>false],

            ["vehicle_id"=>"3",
            "unique_code"=>"CODE-5",
            "time_in"=> "2021-10-10 09:00:49" , "time_out"=> "2021-10-10 09:30:10", "is_active"=>false],

            ["vehicle_id"=>"4",
            "unique_code"=>"CODE-6",
            "time_in"=> "2021-10-29 14:55:31" , "time_out"=> "2021-10-29 20:10:20", "is_active"=>false],

            ["vehicle_id"=>"4",
            "unique_code"=>"CODE-7",
            "time_in"=> "2021-11-06 05:20:39" , "time_out"=> "2021-11-06 09:01:29", "is_active"=>false],

            ["vehicle_id"=>"2",
            "unique_code"=>"CODE-8",
            "time_in"=> "2021-11-21 15:20:01" , "time_out"=> "2021-11-21 17:20:00", "is_active"=>false],

            ["vehicle_id"=>"1",
            "unique_code"=>"CODE-9",
            "time_in"=> "2021-12-26 20:00:00" , "time_out"=> null, "is_active"=>true],

            ["vehicle_id"=>"2",
            "unique_code"=>"CODE-10",
            "time_in"=> "2021-12-26 21:13:16" , "time_out"=> null, "is_active"=>true],

            ["vehicle_id"=>"3",
            "unique_code"=>"CODE-11",
            "time_in"=> "2021-12-26 23:12:45" , "time_out"=> null, "is_active"=>true],

            ["vehicle_id"=>"4",
            "unique_code"=>"CODE-12",
            "time_in"=> "2021-12-27 00:20:11" , "time_out"=> null, "is_active"=>true],
        ];
        DB::table("parking_data")->insert($parking_data);
    }
}
