<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('do-food.barang');
    }
    public function read()
    {
        return 'Silahkan Melakukan Pencarian';
    }
    public function ajax(Request $request)
    {
        $name = $request->name;
        $results = DB::table('barangs')->where('name', 'like', '%'.$name.'%')->get();
        $c = count($results);
        
        if($c == 0){
            // jika data kosong
            return '<p class="text-muted"> Maaf Data tidak Ditemukan</p>';
        }
        else
        {
            // jika data ada
            return view('do-food.barang')->with([
                'data' => $results
            ]);
        }
    }
}
