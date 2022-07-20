<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class LoginController extends Controller
{
    public function postLogin (Request $request)
    {
        //dd($request->all());
        if (Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        return redirect ('login');

    }

    public function logout (Request $request)
    {
       Auth::logout();
       return redirect ('login');
    }

    public function registrasi(){
         return view ('auth.register');
    }

    public function postregistrasi(Request $request){
        //dd($request -> all());

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect ('login');
   }
}
