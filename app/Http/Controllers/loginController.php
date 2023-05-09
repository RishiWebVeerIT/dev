<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class loginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function index()
    {
        $name = Auth::user()->firstname." ".Auth::user()->middlename." ".Auth::user()->lastname;
        return view('home', compact('name'));
    }
    public function checkLogin(Request $request)
    {
        $credential = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($credential))
        {
            Alert::success('Logged In','you have logged in successfully !');
            return redirect('/');
        }
        else
        {
            Alert::error('Invalid','Please check credentials not found in our data');
    
            return redirect()->back();
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        Alert::success('Logged out','you have logged out successfully !');
        return redirect('/login');
      }
}
