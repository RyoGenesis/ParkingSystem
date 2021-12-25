<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
