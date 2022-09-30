<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Category::all();
        return view('dashboard_admin.category.index',['kategoris' => $kategori], compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::all();
        return view('dashboard_admin.category.create', [
            'kategoris' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $kategori)
    {
        $validatedData = validator($request->all(),[
            'nama_kategori' => 'required|string|max:255',
        ])->validate();

        // $kategori = new Kategori($validatedData);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect(route('indexCategory'));
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
    public function edit(Category $kategori)
    {
        return view('dashboard_admin.category.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $kategori)
    {
        $validatedData = validator($request->all(),[
            'nama_kategori' => 'required|string|max:225',
        ])->validate();

        $kategori->nama_kategori = $validatedData['nama_kategori'];
        
       
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
       
        return redirect(route('indexCategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $kategori)
    {
        $kategori->delete();
        return redirect(route('indexCategory'));
    }




    //categori blade

    public function minuman(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.minuman', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }

    public function jajanan(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.jajanan', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }

    public function anekaNasi(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.anekanasi', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }

    public function siapSaji(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.cepatsaji', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }

    public function roti(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.roti', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }

    public function makananSehat(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
        $barangs = Product::all();
        return view('category.makanansehat', ['barangs' => $barangs, 'cekPesanan' => $cekPesanan]);
    }
}
