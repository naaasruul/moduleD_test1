<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function showRegister(){
        return view('register');
    }

    public function registerUser(Request $request){
        $cred = $request->validate([
            'username'=>'required|unique:users|string',
            'password'=>'required|confirmed',
        ]);
        if($cred){
            User::create([
                'username'=> $request->username,
                'password'=> $request->password,
                'role'=>0
            ]);
        }

        return redirect('');
    }
}
