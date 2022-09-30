<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $tbl_restorans = Restaurant::all()/* Auth::user()->id() */;
        // $kategoris = Kategori::all();
        return view('restaurant.index', compact('tbl_restorans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tbl_kategoris = Category::all();
        $tbl_restorans = Restaurant::all();
        $users = User::all();

       return view('restaurant.create', ['tbl_kategoris'=> $tbl_kategoris, 'tbl_restorans'=>$tbl_restorans, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tbl_restorans = new Restaurant();

        $tbl_restorans->id_user = $request->id_user;
        $tbl_restorans->nama_restoran = $request->nama_restoran;
        $tbl_restorans->waktu_pemesanan = $request->waktu_pemesanan;
        $tbl_restorans->no_hp = $request->no_hp;
        $tbl_restorans->kategori = $request->kategori;
        $tbl_restorans->alamat = $request->alamat;
        $tbl_restorans->email = $request->email;
        $tbl_restorans->kota = $request->kota;
        $tbl_restorans->zipcode = $request->zipcode;
        $tbl_restorans->author = Auth::user()->name;
        $tbl_restorans->jam_kerja =  $request->jam_kerja;
        $tbl_restorans->latitude =  $request->latitude;
        $tbl_restorans->longitude =  $request->longitude;
        $tbl_restorans->save();

        if($request->hasfile('foto'))
        {
            $request->file('foto')->move('uploads/restoran/', $request->file('foto')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $restorans->foto= $request->file('foto')->getClientOriginalName();
            $restorans->save();
        }   
        if($request->hasfile('cover'))
        {
            $request->file('cover')->move('uploads/restoran/', $request->file('cover')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_m otor')->getClientOriginalName();
            $restorans->cover= $request->file('cover')->getClientOriginalName();
            $restorans->save();
        }   

        return redirect(url('restaurant/index'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restoran)
    {
        // $restoran = Restaurant::all();
        $users = User::all();
        return view('restaurant.edit', [
            'restoran' => $restoran,
            'users' => $users
        ]);
        // $user = User::all(); 

        // $restoran = Restaurant::find($id);
        // $tbl_kategoris = Category::all();
        // // // return $restorans;
        // // return view('restaurant.edit', ['tbl_kategoris'=>$kategoris,'resto'=>$restorans]);
        // return $tbl_restoran;
        // return view('restaurant.edit', ['tbl_kategoris'=>$kategoris,'resto'=>$restorans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $restoran = Restaurant::find($id);
        if($request->hasfile('foto'))
         {
            $destination = 'uploads/restoran/' .$restoran->foto;
            if(File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/restoran/', $filename);
            $restoran->foto = $filename;
         }
        $restoran->id_user = Auth::user()->user_id;
        $restoran->nama_restoran = $request->nama_restoran;
        $restoran->kategori = $request->kategori;
        $restoran->alamat = $request->alamat;
        $restoran->email = $request->email;
        $restoran->kota = $request->kota;
        $restoran->zipcode = $request->zipcode;
        $restoran->no_hp = $request->no_hp;
        $restoran->latitude =  $request->latitude;
        $restoran->longitude =  $request->longitude;
        $restoran->save();

        // $kategori->nama_kategori = $validatedData['nama_kategori'];
        
       
        // $kategori->nama_kategori = $request->nama_kategori;
        $restoran->save();
       
    return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restorans = Restaurant::findOrFail($id);

        if(file::exists("foto/".$restorans->foto))
        {
            file::delete("foto/".$restorans->foto);
        }
        $restorans->delete();
        return back();
    }
}
