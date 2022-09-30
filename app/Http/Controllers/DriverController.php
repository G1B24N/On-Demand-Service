<?php

namespace App\Http\Controllers;
use App\Driver;
use App\User;
use App\OrderDoride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        return view('dashboard_driver', compact('index'));
    }

    public function admin()
    {
        $drivers = Driver::all();
        return view('dashboard_admin.driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Driver $driver)
    {
        $user = User::all();
        $driver = Driver::all();
        // $user = User::where('id', Auth::id())->first();

       return view('dashboard_admin.driver.create', ['drivers'=>$driver, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $driver = new Driver();
        $driver->user_id = $request->user_id;
        $driver->nik = $request->nik;
        $driver->sim = $request->sim;
        $driver->nama_driver = $request->nama_driver;
        $driver->alamat = $request->alamat;
        $driver->ttl = $request->ttl;
        $driver->nama_motor = $request->nama_motor;
        $driver->status = 0;
        // $driver->foto_motor = $request->foto_motor;
        // $driver->foto_driver = $request->foto_driver;
        
        
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
        $driver->save(); 
        return redirect(url('dashboard_admin/driver/index'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Driver $driver)
    {
        // dd($driver); 
        $driver = Driver::find($id);
        return view('dashboard_admin.driver.edit', [
            'driver' => $driver
        ]);
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
        // $driver_id = Auth::user()->id;
        $driver = Driver::findorFail($id);
        $driver->nik = $request->input('nik');
        $driver->sim = $request->input('sim'); 
        $driver->nama_driver = $request->input('nama_driver')   ; 
        $driver->alamat = $request->input('alamat'); 
        $driver->nohp = $request->input('nohp'); 
        $driver->ttl = $request->input('ttl'); 
        $driver->nama_motor = $request->input('nama_motor'); 

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

        $driver->update();
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);

        if(file::exists("uploads/driver/".$driver->foto_driver))
        {
            file::delete("uploads/driver/".$driver->foto_driver);
        }
        if(file::exists("foto/".$driver->foto_driver))
        {
            file::delete("foto/".$driver->foto_driver);
        }
        $driver->delete();
        return back();
    }

    // /------Dashboard Driver ------/ //


    public function indexDashboard()
    {
        $driver = Driver::all();
        $pesanan = OrderDoride::where('harga')->count();
        $jumlah = OrderDoride::where('status', 1)->sum('harga');
        return view('dashboard_driver', ['driver' => $driver, 'pesanan' => $pesanan, 'jumlah' => $jumlah]);

    }

    public function changeStatus(Request $request)
    {
        $pesanan = OrderDoride::find($request->user_id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function pesanan()
    {
        $pesanan = OrderDoride::all();

        return view('driver.pesanan', ['pesanan' => $pesanan]);
    }

    public function history()
    {
        $pesanan = OrderDoride::all();

        return view('driver.history', ['pesanan' => $pesanan]);
    }

}
