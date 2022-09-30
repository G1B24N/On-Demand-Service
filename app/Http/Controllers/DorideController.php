<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDoride;
use App\User;
use App\Driver;
use Illuminate\Support\Facades\Auth;


class DorideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('do-ride.index');
    }

    public function pesan()
    {
        $orderDoride = OrderDoride::all();
        $driver = Driver::all();
        // dump ($driver);
        return view('do-ride.pesan', ['driver' => $driver, 'orderDoride' => $orderDoride]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesanan = new OrderDoride;
        // $ide = Auth()->user()->id;
        
        $pesanan->user = $request->user;
        // $pesanan->user = $request->Auth::user()->id;
        $pesanan->lokasi_awal = $request->lokasi_awal;
        $pesanan->tujuan = $request->tujuan;
        $pesanan->jarak = $request->jarak;
        $pesanan->harga = $request->harga;
        $pesanan->durasi = $request->durasi;
        $pesanan->driver = $request->driver;
        $pesanan->status = 0;
        $pesanan->save();
        // dd($request);
        return redirect()->back();




        // $request->user = $request->user = Auth::user()->id;
        // // $request->driver;
        // $request->lokasi_awal = $request->lokasi_awal;
        // $request->tujuan = $request->tujuan;
        // $request->jarak = $request->jarak;
        // $request->harga = $request->harga;
        // $request->durasi =  $request->durasi;
        // $request->save();
        // return response()->json($pesanan->load('user'));
        // return redirect(route('doRide'));
        
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
