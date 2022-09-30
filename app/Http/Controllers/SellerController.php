<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use App\Category;
use App\PesananDetail;
use App\Restaurant;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Product::all();
    	return view('product.indexSeller',[
            'barangs' => $barang]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tbl_restorans = Restaurant::all();
        $kategori = Category::all();
        return view('product.create', [
            'tbl_kategoris' => $kategori,
            'tbl_restorans' => $tbl_restorans
        ]);
        $restoran = Restaurant::all();
        return view('product.create', [
            'tbl_restorans' => $restoran 
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = new Product();
        // $data = validator($request->all(),[
        //     'gambar' => 'required|string',
        //     'id_kategori' => 'required|integer',
        //     'id_restoran' => 'required|integer',
        //     'nama_barang' => 'required|string',
        //     'stok' =>'required|integer',
        //     'harga' => 'required|integer',  
        //     'deskripsi' =>'required|string',
        //     'keterangan' =>'required|strin',
        // ])->validate();

       
        $barang = new Product();
        // $barang->gambar = $request->gambar;
        $barang->id_kategori = $request->id_kategori;
        $barang->id_restoran = /* (!is_null($request->id_restoran) ?  */$request->id_restoran;
        $barang->nama_barang = $request->nama_barang;
        // $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->keterangan = $request->keterangan;
        $barang->deskripsi = $request->deskripsi;
        
        // $barang->save();

        // return redirect(route('indexProduct'));
        // $barang = Product::create($request->all());
        if($request->hasfile('gambar'))
        {
            $request->file('gambar')->move('uploads/barang/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }   
        // dd($request->all());
        return redirect()->route('indexProduct')->with('success', 'Data Berhasil Ditambahkan'); 
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
    public function edit(Product $barang, Category $kategori)
    {
        return view('product.edit', [
            'barang' => $barang,
            'kategori' => $kategori, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $barang, Category $kategori)
    {
        // $validatedData = validator($request->all(),[
        //     'gambar' => 'string',
        //     'nama_barang' => 'required|string|max:225',
        //     'stok' =>'required|integer',
        //     'harga' => 'required|integer',
        //     'keterangan' => 'required|string',
        //     'deskripsi' => 'required|integer',
        // ])->validate();

        // $barang->gambar = $validatedData['gambar'];
        // $barang->nama_barang = $validatedData['nama_barang'];
        // $barang->stok = $validatedData['stok'];
        // $barang->harga = $validatedData['harga'];
        // $barang->keterangan = $validatedData['keterangan'];
        // $barang->deskripsi = $validatedData['deskripsi'];
        
        if($request->hasfile('gambar'))
        {
            $destination = 'uploads/barang/' .$barang->gambar;
            if(File::exists($destination)){
                File::delete($destination);

        }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/barang/', $filename);
            $barang->gambar = $filename;
        }
        
        $barang->nama_barang = $request->nama_barang;
        // $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->keterangan = $request->keterangan;
        $barang->deskripsi = $request->deskripsi;
        $barang->save();


       
        return redirect(route('indexProduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $barang)
    {
        $barang->delete();
        return redirect(route('indexProduct'));
    }


    
}
