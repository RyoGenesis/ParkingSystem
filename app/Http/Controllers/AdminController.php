<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('adminview.admin_login');
    }

    public function dashboard(){
        return view('adminview.admin_dashboard');
    }

    public function login(){

    }

    public function logout(){
        
    }
}
