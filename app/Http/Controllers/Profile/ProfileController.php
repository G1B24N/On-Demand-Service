<?php

namespace App\Http\Controllers\Profile;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Profile;

class ProfileController extends Controller
{
    public function myprofile(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        return view('do-food.profile', ['cekPesanan'=>$cekPesanan]);
    }
    //---Profile Update---->
    public function profileupdate(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->nama_depan = $request->input('nama_depan'); 
        $user->nama_belakang = $request->input('nama_belakang'); 
        $user->no_hp = $request->input('no_hp'); 
        $user->jenis_kelamin = $request->input('jenis_kelamin'); 
        $user->alamat = $request->input('alamat'); 
        $user->kota = $request->input('kota'); 

         if($request->hasfile('image'))
         {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
         }

         $user->update();
         return redirect()->back()->with('status', 'Profile Updated', ['cekPesanan'=>$cekPesanan]); 
         
    }
  }
