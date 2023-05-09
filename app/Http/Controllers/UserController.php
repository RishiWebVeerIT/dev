<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class UserController extends Controller
{
    public function AddAdminForm()
    {

     return view('add_admin');

    }
    public function AddAdmin(Request $request)
    {
    $request->validate([
        'first_name' => 'required|string|max:50',
        'middle_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users',
    ]);

    $user = new User();
        $user->firstname = $request->first_name;
        $user->middlename = $request->middle_name;
        $user->lastname = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Alert::success('Successfully Added');
        return back();
}
}
