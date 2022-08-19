<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\Beasiswa;
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
        Alert::success('Selamat', 'Berhasil Melakukan Registrasi');

        return redirect ('login');
   }

    public function registrasimodal(){

        // $data = DB::table('users')
        // ->leftJoin('jurusan', 'jurusan.id', '=', 'users.prodi_id')
        // ->get();
        $program_studi = Jurusan::all();
        return view ('auth.control' , compact('prodi'));
}

public function postregistrasimodal(Request $request){
//    dd($request->all());

   User::create([
       'nama' => $request->nama,
       'username' => $request->username,
       'password' => bcrypt($request->password),
       'level' => $request->level,
       'prodi_id' => $request->prodi_id,
       'remember_token' => Str::random(60),
   ]);
   Alert::success('Congrats', 'You\'ve Successfully Registered');

   return redirect ('usercontrol');
}
   public function index1()
   {
    
        $prodi = Jurusan::all();
       $data = User::with('prodi')
       ->where('level' , '=' , "admin")
       ->orWhere ('level' , '=' , "prodi")
       ->orWhere ('level' , '=' , "mahasiswa")
       ->get();
       return view('auth.control', compact('data','prodi'));
   }

  

   public function reset($id)
   {
        $data = User::find($id);
        $data->password = hash::make('password');
        $data->update();
        Alert::success('Sukses', 'Password Berhasil Direset');
        return redirect()->back();
   }

   
}
