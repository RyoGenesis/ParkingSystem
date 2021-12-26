<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function parkIndex(){
        return view('park_vehicle');
    }

    public function checkoutIndex(){
        return view('checkout');
    }

    public function detail(){
        return view('checkout_detail');
    }
}
