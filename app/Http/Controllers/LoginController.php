<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use Alert;
// use RealRashid\SweetAlert\Facades\Alert;

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

   public function registrasimodal(){
    return view ('auth.createmodal');
}

public function postregistrasimodal(Request $request){
   //dd($request -> all());

   User::create([
       'nama' => $request->nama,
       'username' => $request->username,
       'password' => bcrypt($request->password),
       'level' => $request->level,
       'remember_token' => Str::random(60),
   ]);
   Alert::success('Congrats', 'You\'ve Successfully Registered');

   return redirect ('usercontrol');
}
   public function index1()
   {
       $data = User::where('level' , '=' , "admin")
       ->orWhere ('level' , '=' , "prodi")
       ->orWhere ('level' , '=' , "mahasiswa")
       ->paginate(5);
       return view('auth.control', compact('data'));
   }

   public function cari(Request $request)
   {
     // menangkap data pencarian
	$cari = $request->cari;
 
     // mengambil data dari table pegawai sesuai pencarian data
    $data = DB::table('users')
    ->where('nama','like',"%".$cari."%")
    ->paginate();
        // mengirim data pegawai ke view index
    return view('auth.control', compact('data'));
   }

   public function reset($id)
   {
        $data = User::find($id);
        $data->password = hash::make('password');
        $data->update();
        return redirect()->back()->with('Password Berhasil Di Reset');
   }
}
