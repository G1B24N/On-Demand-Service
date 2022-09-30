<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ResellerController extends Controller
{
    public function dashboard()
    {
        $pesanan_details = OrderDetail::where('id_restoran', 1)->sum('jumlah');
        $jumlah = Order::all()->sum('jumlah_harga');
        return view('dashboard_seller', ['pesanan_details' => $pesanan_details, 'jumlah'=>$jumlah]);
    }

    public function incomingOrder()
    {
        $pesanan = Order::all();
        $pesanan_details = OrderDetail::all();
        return view('incomingOrder.index', ['pesanan' => $pesanan ,'pesanan_details' => $pesanan_details]);
    }

    // public function konfirmasi()
    // {
    //     if($pesanan->status==1)
    //     $pesanan = Order::where('user_id', Auth::user()->id)->where('status',1)->first();
    //     $pesanan_id = $pesanan->id;
    //     $pesanan->status = 2;
    //     $pesanan->update();

        


    // }
}
