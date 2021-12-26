<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view('adminview.admin_login');
    }

    public function dashboard(){
        return view('adminview.admin_dashboard');
    }

    public function profileIndex(){
        return view('adminview.admin_profile');
    }
}
