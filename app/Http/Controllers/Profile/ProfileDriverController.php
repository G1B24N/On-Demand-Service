<?php

namespace App\Http\Controllers\Profile;

use App\User;
use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Profile;

class ProfileDriverController extends Controller
{
    public function profileDriver()
    {
        $id = Auth::id();
        
        $driver = Driver::where('user_id',$id)->get();

        return view('do-ride.profile',compact('driver'));
    }
    public function tambahUser(Request $request)
    {
        $id = Auth::id();
        $driver = new Driver();
        $driver->user_id = $id;
        $driver->save();
        return redirect()->back();
        

    }

    public function createProfile(Request $request)
    {
        $driver = new Driver();
        // $driver->gambar = $request->gambar;
        $driver->user_id = $request->user_id;
        $driver->nik = $request->nik;
        $driver->sim = $request->sim;
        $driver->nama_driver = $request->nama_driver;
        $driver->alamat = $request->alamat;
        $driver->ttl = $request->ttl;
        $driver->nama_motor = $request->nama_motor;
        // $driver->foto_motor = $request->foto_motor;
        // $driver->foto_driver = $request->foto_driver;
        
        $driver->save(); 

        // return redirect(route('indexBarang'));
        // $driver = Barang::create($request->all());
        if($request->hasfile('foto_driver'))
        {
            $request->file('foto_driver')->move('uploads/driver/', $request->file('foto_driver')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $driver->foto_driver = $request->file('foto_driver')->getClientOriginalName();
            $driver->save();
        }   
        if($request->hasfile('foto_motor'))
        {
            $request->file('foto_motor')->move('uploads/driver/', $request->file('foto_motor')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $driver->save();
        }   
        return redirect('dashboard_driver')->with('success', 'Data Berhasil Ditambahkan'); 
    }
    // <---Profile Update---->
    public function profileupdate(Request $request)
    {
        
        $user_id = Auth::user()->id;
        $driver = Driver::where('user_id',$request->user_id)->get();
        // return $request;
        $driver->nik = $request->nik;
        $driver->sim = $request->sim; 
        $driver->nama_driver = $request->nama_driver; 
        $driver->alamat = $request->alamat; 
        $driver->ttl = $request->ttl; 
        $driver->nama_motor = $request->nama_motor; 

        if($request->hasfile('foto_driver'))
        {
            $destination = 'uploads/driver/' .$driver->foto_driver;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto_driver');  
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/driver/', $filename);
            $driver->foto_driver = $filename;
        }
        if($request->hasfile('foto_motor'))
        {
            $destination = 'uploads/driver/' .$driver->foto_motor;
            if(File::exists($destination)){
                File::delete($destination);
                
            }
            $file = $request->file('foto_motor');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/driver/', $filename);
            $driver->foto_motor = $filename;
        }
        
        // dd($driver);
        
        
        return redirect()->back();
        $driver->update();
        // return redirect()->back(); 
    }
}
