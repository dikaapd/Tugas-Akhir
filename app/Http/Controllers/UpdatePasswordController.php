<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Beasiswa;
use Exception;
use Illuminate\Http\Request;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;

class UpdatePasswordController extends Controller
{
    //
    public function edit($id)
    {
        // $data = DB::table('users' )->where('id', $id)->first();
        return view('Auth.resetpw' );
    }
    public function update ( Request $request ) {

        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        Alert::success('Congrats', 'Kata Sandi Berhasil Diubah');
        
        return redirect('beasiswa');
        
        // $User = User::where('id', $id)->first();  
        // DB::table('users') -> where('id', $id) 
        // -> update([
        //     'password' => bcrypt($request->password),
        // ]);
    }
}
