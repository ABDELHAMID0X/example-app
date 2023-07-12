<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{


    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $credetails = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credetails)){
            return redirect('/book')->with('success','Register success ');
        }
        return back()->with('error','Email or password not match');
    }


    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Register success ');
    }


    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

}
