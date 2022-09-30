<?php

namespace App\Http\Controllers;
use App\Product;
use App\Restaurant;
use App\Cart;
use App\Dofood;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Driver;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $resto = Restaurant::where('nama_restoran', 'like', '%'.$request->cari.'%')->get();
        }else{
            $resto = Restaurant::all();
        }
        $cari = Restaurant::latest();

        // if(request('search')) {
        //      $cari->where('nama_restoran', 'like', '%' . request('search') . '%');
        // }
        $cekPesanan = $request->get('cekPesanan');
        $tbl_restorans = Restaurant::paginate(20);
        return view('do-food.product',['cekPesanan'=>$cekPesanan, 'cari'=>$cari->get()], compact('tbl_restorans', 'request'));
    }

    public function restoran(Request $request, $id)
    {
        $cekPesanan = $request->get('cekPesanan');
        $tbl_restorans = Restaurant::where('id_restoran', $id)->first();
        $tbl_barangs = Product::where('id_restoran',$id)->paginate(20);
        return view('do-food.detailRestoran', ['tbl_restorans'=>$tbl_restorans, 'cekPesanan'=>$cekPesanan], compact('tbl_barangs'));
    }

    public function show(Request $request, $id) {
        $cekPesanan = $request->get('cekPesanan');
        $barang = Product::where('id', $id)->first();
        return view('do-food.order', ['barang' => $barang, 'cekPesanan'=>$cekPesanan]);
    }

    public function order(Request $request, $id, Order $pesanan)

    {
        $tbl_restorans = Restaurant::where('id_restoran', $id)->first();
        $tbl_restorans = ['tbl_restorans'=>$tbl_restorans];
        $cekPesanan = $request->get('cekPesanan');
        $payment = Payment::all();
		$payment = ['payment' => $payment];
        $pesanan = Order::all();
    	$barang = Product::where('id', $id)->first();
    	$tanggal = Carbon::now();


        $request->jumlah_pesan;
		$request->id_restoran;


        // cek pesanan ada atau tidak?
        // kalau tidak, berarti pesan seperti biasa
        // kalah ada, cek lagi pesananya itu dari restoran yang sama tidak>
        // kalau iya berarti seperti biasa
        // kalau tidak, berarti hapus dari database
        $cek_pesanan = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        
        if($cek_pesanan){
            $cek_detail_pesanan = OrderDetail::where([['id_restoran', $barang->restaurant->nama_restoran],['pesanan_id',$cek_pesanan->id]])->get();
            if(count($cek_detail_pesanan) == 0){
                Order::where('user_id', Auth::user()->id)->where('status',0)->delete();
                OrderDetail::where([['id_restoran', $barang->restaurant->id_restoran],['pesanan_id',$cek_pesanan->id]])->delete();
            }
        }


        $cek_pesanan = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Order;
	    	$pesanan->user_id = Auth::user()->id;
			// $pesanan->restaurant->nama_restoran;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
	    	$pesanan->save();
    	}
		
        $pesanan_baru = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = OrderDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new OrderDetail;
	    	$pesanan_detail->barang_id = $barang->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
			// $pesanan_detail->metode_pembayaran= $request->metode_pembayaran;
			$pesanan_detail->id_restoran =$barang->restaurant->id_restoran;
	    	$pesanan_detail->save();
    	}else
    	{
    		$pesanan_detail = OrderDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
    	$pesanan->update();

        return redirect('do-food/orderNow');
    }

    public function orderNow(Request $request)
   {

        // $resto = Restaurant::where('id', $id)->first();
        $cekPesanan = $request->get('cekPesanan');
		$payment = Payment::all();
        $driver = Driver::all();
        $pesanan = order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $tbl_pesanan_details = [];
        
        if(!empty($pesanan))
        {
            $tbl_pesanan_details = OrderDetail::where('pesanan_id', $pesanan->id)->get();
            
        } 
		

        return view('do-food.orderNow',['payment' => $payment, 'driver' => $driver], compact('pesanan', 'tbl_pesanan_details'));
   }

   public function konfirmasi()
   {
	$user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            // Alert::error('Identitasi Harap dilengkapi', 'Error');P
            return redirect('do-food/profile');
        }

        // if(empty($user->nohp))
        // {
        //     // Alert::error('Identitasi Harap dilengkapi', 'Error');
        //     return redirect('do-food/profile');
        // }

        $pesanan = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = OrderDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Product::where('id', $pesanan_detail->barang_id)->first();
            // $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }



        // Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('do-food/product');
   }

    public function delete($id)
        {
            $pesanan_detail = OrderDetail::where('id', $id)->first();
            $cekPesanan = $request->get('cekPesanan');
            $pesanan = Order::where('id', $pesanan_detail->pesanan_id)->first();
            $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
            $pesanan->update();


            $pesanan_detail->delete();

            // Alert::error('Pesanan Sukses Dihapus', 'Hapus');
            return redirect('do-food/orderNow', ['cekPesanan'=>$cekPesanan]);
        }

        public function ajax(Request $request)
        {
            $name = $request->name;
            $results = Product::where('nama_barang', 'like', '%'.$name.'%')->get();

            $c = count($result);

            if($c == 0)
            {
                return '<p class="text-center">Srooy data Not Found</p>';
            }
            else
            {
                return view('ajaxpage')->with([
                    'data' => $results
                ]);
            }
        }

        public function read()        
        {
            return '<p class="text-center">inpurt data pleadsckajsndcf</p>';
        }

        public function search(Request $request)
        {
            // $request->validate([
            //      'cari' => 'required|min:3'
            // ]);
            $cari = $request->input('cari');
            $restorans = Restaurant::where('nama_restoran', 'like', "%$cari%")->get();
            $barangs = Product::where('nama_barang', 'like', "%$cari%")->get();
            return view('do-food.search-result', ['barangs'=>$barangs])->with('restorans', $restorans);
        }
}
