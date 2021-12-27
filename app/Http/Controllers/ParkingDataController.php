<?php

namespace App\Http\Controllers;

use App\Models\ParkingData;
use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParkingDataController extends Controller
{
    //get all finished parking transaction
    public function all(){
        return view('adminview.report_detail')->with('parkingdata', ParkingData::where('is_active',false)->get());
    }

    //get finished parking transaction from a specified date range
    public function fromDate(Request $request){
        $validation = [
            "date_start"=>'required|date',
            "date_end"=>'required|date|after_or_equal:date_start',
        ];

        $validated = $request->validate($validation);
        $start = Carbon::parse($validated['date_start'])->toDatetimeString();
        $end = Carbon::parse($validated['date_end'])->toDatetimeString();

        $parkingdata = ParkingData::where('is_active',false)->whereBetween('time_in',[$start,$end])->get();

        return view('adminview.report_detail')->with('parkingdata', $parkingdata);
    }

    public function park(Request $request){
        $validation = [
            "license_plate"=>['required', 'regex:/^[A-Z]{1,2} [0-9]{1,4} [A-Z]{1,3}$/'],
        ];
        $temp = $request->validate($validation);

        $vehicle = Vehicle::where('license_plate',$temp['license_plate'])->first();

        if($vehicle != null){
            if($vehicle->is_parked == true)
                return redirect()->back()->withErrors(['isParked'=>'This vehicle is currently already parked!']);
            else
                $vehicle->is_parked = true;
        }
        else{
            $vehicle = new Vehicle();
            $vehicle->license_plate = $temp['license_plate'];
            $vehicle->is_parked = true; 
        }
        $vehicle->save();

        $date = date("Y-m-d H:i:s");
        $parkingdata = new ParkingData();
        $parkingdata->time_in = $date;
        $parkingdata->vehicle_id = $vehicle->id;
        $parkingdata->is_active = true;
        $parkingdata->unique_code = Str::remove(' ', $vehicle->license_plate) . '-' . time() . '-'. Str::random(8);
        $parkingdata->save();

        return redirect()->back()->with('parking', $parkingdata)->withSuccess('Successfully Generating Parking Ticket.');
    }


    public function checkout(Request $request){
        $validation = [
            "code"=>['required', 'string'],
        ];
        $temp = $request->validate($validation);
        
        $parkingdata = ParkingData::where('unique_code',$temp['code'])->where('is_active',true)->first();

        if($parkingdata == null){
            return redirect()->back()->withErrors(['invalid'=>'Unique Code Invalid!']);
        }

        $parkingdata = $this->updateParkingData($parkingdata);

        $in = Carbon::parse($parkingdata->time_in);
        $out = Carbon::parse($parkingdata->time_out);
        $difference = $in->diff($out);
        $fee = ($difference->i > 0 || $difference->s > 0) ? ($difference->h+1)*3000 : $difference->h*3000;
        $parkingdata->fee = $fee;
        $parkingdata->save();

        return redirect()->route('checkout-detail')->with('parking', $parkingdata)
                                                    ->with('difference',$difference)
                                                    ->with('fee',$fee);
    }

    private function updateParkingData($parkingdata){
        $parkingdata->vehicle->is_parked = false;
        $parkingdata->vehicle->save();
        $parkingdata->is_active = false;
        $date = date("Y-m-d H:i:s");
        $parkingdata->time_out = $date;
        $parkingdata->save();
        return $parkingdata;
    }
}
