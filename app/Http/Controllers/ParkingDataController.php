<?php

namespace App\Http\Controllers;

use App\Models\ParkingData;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParkingDataController extends Controller
{
    //
    public function index(){
        $date = date("Y-m-d H:i:s");
    }

    public function fromDate(Request $request){
        $validation = [
            "date_start"=>'required|date|before_or_equal:date_end',
            "date_end"=>'date|after_or_equal:date_start',
        ];

        // $request->validate($validation);
        // $category = Category::find($request->id);

        // $categ = Category::all();

        // if($request->category == "name") $keyboard = $this->searchByName($request,$category->id);
        // else $keyboard = $this->searchByPrice($request,$category->id);

        // return view('view_keyboard')
        //     ->with('categories',$categ)
        //     ->with('keyboards', $keyboard)
        //     ->with('category',$category)
        //     ->with("success","Search result for (".$request->category.") : ".$request->input);
        
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
        //dd($parkingdata);
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

        $parkingdata->vehicle->is_parked = false;
        $parkingdata->vehicle->save();
        $parkingdata->is_active = false;
        $date = date("Y-m-d H:i:s");
        $parkingdata->time_out = $date;
        $parkingdata->save();
        return redirect()->route('checkout-detail')->with('parking', $parkingdata);
    }
}
