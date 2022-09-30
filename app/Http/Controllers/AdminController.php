<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\Restaurant;
use App\OrderDetail;
use App\Payment;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        // $users = User::where('id', Auth::user()->id)->first();    
        $users = User::all();  
        // dd($users);
        return view('dashboard_admin.user',compact('users'));
    }

    public function dashboard()
    {
        $pesanan_details = OrderDetail:: all()->sum('jumlah');
        $jumlah = OrderDetail::all()->sum('jumlah_harga');
        $user= User::count();
        $restaurant = Restaurant::count();
        return view('dashboard_admin.dashboard', ['pesanan_details' => $pesanan_details, 'jumlah'=>$jumlah, 'user'=>$user, 'restaurant'=>$restaurant]);
    }
    
    public function restoran(Restaurant $restoran)
    {
        // $users = User::where('id', Auth::user()->id)->first();    
        // $restorans = Restoran::all(); 
        $restoran = Restaurant::all(); 
        $tbl_kategoris = Category::all();
        // dd($users);
        return view('dashboard_admin.restaurant.index',['tbl_kategoris' => $tbl_kategoris],compact('restoran'));
    }

    public function kategori(Category $kategori)
    {
        $tbl_kategoris = Category::all();
        return view('kategori.index',['tbl_kategoris' => $tbl_kategoris], compact('tbl_kategoris'));
    }


    /* ////<<<<<< RESTAURANT CONTROLLER >>>>>>\\\\\\\*/

    public function indexResto()
    {
        // $user = User::all();

        $restoran = Restaurant::all(); 
        $tbl_kategoris = Category::all();
        $users = User::all();
        return view('dashboard_admin.restaurant.index',['tbl_kategoris' => $tbl_kategoris, 'users'=>$users],compact('restoran'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createResto()
    {
        $tbl_kategoris = Category::all();
        $users = User::all();
        $tbl_restorans = Restaurant::all();
        // $user = User::where('id', Auth::id())->first();

       return view('dashboard_admin.restaurant.create', ['tbl_kategoris'=> $tbl_kategoris, 'tbl_restorans'=>$tbl_restorans, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeResto(Request $request)
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
        // $tbl_restorans->latitude =  $request->latitude;
        // $tbl_restorans->longitude =  $request->longitude;
        $tbl_restorans->save();

        if($request->hasfile('foto'))
        {
            $request->file('foto')->move('uploads/restoran/', $request->file('foto')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $tbl_restorans->foto= $request->file('foto')->getClientOriginalName();
            $tbl_restorans->save();
        }   
        if($request->hasfile('cover'))
        {
            $request->file('cover')->move('uploads/restoran/', $request->file('cover')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $tbl_restorans->cover= $request->file('cover')->getClientOriginalName();
            $tbl_restorans->save();
        }   

        return redirect(route('indexRestaurant'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editResto( $id, Category $kategori)
    {
        $restoran = Restaurant::find($id);
        $users = User::all();
        $kategori = Category::all();
        return view('dashboard_admin.restaurant.edit', [    
            'restoran' => $restoran,
            'kategori' => $kategori,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateResto(Request $request, $id)
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
        if($request->hasfile('cover'))
        {
            $destination = 'uploads/restoran/' .$restoran->cover;
            if(File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('cover');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/restoran/', $filename);
            $restoran->cover = $filename;
        }           
        if(!is_null($restoran){
            $restoran->id_user = $request->id_user
        });
        $restoran->nama_restoran = $request->nama_restoran;
        $restoran->kategori = $request->kategori;
        $restoran->alamat = $request->alamat;
        $restoran->email = $request->email;
        $restoran->kota = $request->kota;
        $restoran->zipcode = $request->zipcode;
        $restoran->no_hp = $request->no_hp;
        $restoran->save();

        // $kategori->nama_kategori = $validatedData['nama_kategori'];
        
       
        // $kategori->nama_kategori = $request->nama_kategori;
        $restoran->save();
       
    return redirect(route('indexRestaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyResto($id)
    {
        $restorans = Restaurant::findOrFail($id);

        if(file::exists("foto/".$restorans->foto))
        {
            file::delete("foto/".$restorans->foto);
        }
        $restorans->delete();
        return back();
    }

    public function detailResto($id)
    {   
        // $restoran = Restaurant::find($id);
        $restoran = Restaurant::where('id_restoran', $id)->first();
        $tbl_barangs = Product::where('id_restoran',$id)->paginate(20);
        return view('dashboard_admin.restaurant.detail', ['restoran'=>$restoran, 'tbl_barangs' => $tbl_barangs], compact('tbl_barangs'));
    }


    //<<<<<<<<<<<<<<<--------__________---------->>>>>>>>>>>>>> 
    // <<<<<<<<<<------ Product Admin Controller -------->>>>>>>..
    public function indexProduct()
    {

        $product = Product::all();
    	return view('dashboard_admin.product.index',[
            'products' => $product]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct()
    {
        $restaurant = Restaurant::all();
        $category = Category::all();
        return view('dashboard_admin.product.create', [
            'tbl_kategoris' => $category,
            'tbl_restorans' => $restaurant
        ]);
        // // $restoran = Restaurant::all();
        // // return view('product.create', [
        // //     'tbl_restorans' => $restoran 
        // ]);

       return view('dashboard_admin.product.create', ['tbl_kategoris'=> $restaurant, 'tbl_restorans'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        $barang = new Product();
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
        return redirect()->route('indexproduct')->with('success', 'Data Berhasil Ditambahkan'); 
    }

    public function editProduct(Category $kategori, $id)
    {
        $barang = Product::find($id);
        $kategori = Category::all();
        $restoran = Restaurant::all();
        return view('dashboard_admin.product.edit', [
            'barang' => $barang,
            'kategori' => $kategori,
            'restoran' => $restoran

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, Product $barang)
    {
        
        if($request->hasfile('gambar'))
        {
            $destination = 'uploads/barang/' .$barang->foto;
            if(File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/restoran/', $filename);
            $barang->gambar = $filename;
        }
        $barang->nama_barang = $request->nama_barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->id_restoran = $request->id_restoran;
        $barang->keterangan = $request->keterangan;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->save();

        // $kategori->nama_kategori = $validatedData['nama_kategori'];
        
       
        // $kategori->nama_kategori = $request->nama_kategori;
        // $barang->save();
       
    return redirect(route('indexproduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
        $barangs = Product::findOrFail($id);

        if(file::exists("foto/".$barangs->foto))
        {
            file::delete("foto/".$barangs->foto);
        }
        $barangs->delete();
        return /* view('dashboard_admin.restaurant.index') */ back();
    }
    // /* <<<<<<----- CLOSE PRODUCT ------->>>>>>>  */
   

    // /* <<<<<<<-------- ORDER CONTROLLER ----------->>>>>>>>>>  */

    public function indexOrder()
    {

        $pesanan = OrderDetail::all();
    	return view('dashboard_admin.order.index',[
            'pesanan' => $pesanan], compact('pesanan')
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
       $pesanan = new OrderDetail;
       $pesanan->pesanan_id = $request->pesanan_id;
       $pesanan->barang_id = $request->barang_id;
       $pesanan->jumlah = $request->jumlah;
       $pesanan->jumlah_harga = $request->jumlah_harga;
       $pesanan->id_restoran = $request->id_restoran;
       $pesanan->metode_pembayaran = $request->metode_pembayaran;
       $pesanan->save();

        return redirect(route('indexOrder'))->with('success', 'Data Berhasil Ditambahkan');
    }


    public function editOrder(Category $kategori, $id)
    {
       
        return view('dashboard_admin.order.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, Order $barang)
    {
        // $pesanan = OrderDetail::find('pesanan_id');
        $pesanan->pesanan_id = $p->pesanan->user->name;
        $pesanan->barang_id = $p->barang->nama_barang;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->jumlah_harga = $request->jumlah_harga;
        $pesanan->id_restoran = $request->id_restoran;
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->save();
 
    
        return redirect(route('indexOrder'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyOrder($id, OrderDetail $pesanan)
    {
       
        $pesanan=OrderDetail::find($id)->delete();
        return redirect(route('indexOrder'));
    }
    // /* <<<<<<----- CLOSE Order ------->>>>>>>  */

    

    // /* <<<<<<----- PAYMENT------->>>>>>>  */

    public function indexPayment()
    {
        $payment = Payment::all();
        return view('dashboard_admin.payment.index', ['payment' => $payment]);
    }


    public function createPayment()
    {
        $payment = Payment::all();
        return view('dashboard_admin.payment.create');
    }

    public function storePayment(Request $request)
    {
        $payment = new Payment;
        $payment->metode_pembayaran = $request->metode_pembayaran;
        $payment->save();

        return redirect(route('indexPayment'));
    }

    public function editPayment($id)
    {
        return view('dashboard_admin.payment.edit');
    }

    public function updatePayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $validatedData = validator($request->all(),[
            'metode_pembayaran' => 'required|string|max:225',
        ])->validate();

        $payment->metode_pembayaran = $validatedData['metode_pembayaran'];
        
        $payment->metode_pembayaran = $request->metode_pembayaran;
        $payment->save();
       
        return redirect(route('indexPayment'));
    }

    public function destroyPayment($id, Payment $payment)
    {
        $payment=Payment::find($id)->delete();
        return redirect(route('indexPayment'));
    }

       // /* <<<<<<----- CLOSE payment ------->>>>>>>  */


    public function indexContact()
    {
        $pesan = Contact::all();
        return view('dashboard_admin.contact.index', ['pesan' => $pesan]);
    }

    public function hapusContact($id, Contact $pesan)
    {
        $pesan =Contact::find($id)->delete();
        return redirect(route('indexContact'));
    }
}
