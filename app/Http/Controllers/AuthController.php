<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $validation = [
            "email"=>"required|email",
            "password"=>"required"
        ];
        $credential = $request->validate($validation);

        if($request->remember){
            Cookie::queue('email',$credential['email'],10080);
        }
        if(Auth::attempt($credential,true)) return redirect()->route("admin.dashboard");
        else{
            return redirect()->back()->withErrors("Invalid Account!");
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function changePassIndex(){
        return view('change_password');
    }

    public function changePassword(Request $request){
        $validate = [
            "password"=>"required",
            "newPassword"=>"required",
            "confirm"=>"required|same:newPassword"
        ];
        $request->validate($validate);
        print_r(Hash::make($request->password));
        
        
        if(!Hash::check($request->password,Auth::user()->password)){
            return redirect()->back()->withErrors("Old Password is wrong!");
        }

        $user = User::where("email",Auth::user()->email)->first();
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect()->back()->withSuccess("Change Password Success!");
    }
}
