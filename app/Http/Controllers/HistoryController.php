<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
    	$tbl_pesanans = Order::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('do-food.history',['cekPesanan'=>$cekPesanan], compact('tbl_pesanans'));
    }

    public function detail($id, Request $request)
    {
        $cekPesanan = $request->get('cekPesanan');
    	$pesanan = Order::where('id', $id)->first();
    	$pesanan_details = OrderDetail::where('pesanan_id', $pesanan->id)->get();

     	return view('do-food.detailHistory',['cekPesanan'=>$cekPesanan], compact('pesanan','pesanan_details'));
    }
}
