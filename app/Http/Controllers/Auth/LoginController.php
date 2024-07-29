<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function logout(Request $request){
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('');
    }

    public function showLogin(){
        return view('login');
    }

    public function loginUser(Request $request){
        $cred = $request->validate([
            'username'=>'required',
            'password'=>'required'            
        ]);

        if(Auth::attempt($cred)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user && $user->role == 0){
               return redirect('gallery');
            }else{
                return redirect('users');
            }
        }else{
            echo 'data not in db';
        }
    }
    
}
