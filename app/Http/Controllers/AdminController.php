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

    public function reportIndex(){
        return view('adminview.report');
    }

    public function editIndex(){
        return view('adminview.profile_edit');
    }

    public function changeIndex(){
        return view('adminview.change_password');
    }

    public function update(Request $request){
        $validation = [
            "name"=>'required|min:1',
            "email"=>"required|email|unique:users,email,".Auth::user()->id,
            "address"=>"required|min:1",
            "gender"=>"required",
            "dob"=>"required|date"
        ];
        $validated = $request->validate($validation);
        
        $user = User::find(Auth::user()->id);
        if($user == null) return redirect()->back()->withErrors(['error'=>'User Not Found!']);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->address = $validated['address'];
        $user->gender = $validated['gender'];
        $user->dob = $validated['dob'];
        $user->save();

        return redirect()->route('admin.profile');
    }
}
