<?php
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function() {
//     return redirect(route('login'));
// });
Route::get('/', function() {
    return redirect(route('home'));
});


    //-----middleware Auth 
Route::group(['middleware' => ['auth', 'customer']], function(){
    Route::get('/home', function () {
        return view('home');
    })->name('home');

}); 
Route::group(['middleware' => ['auth', 'role:Seller']], function(){
    Route::get('/dashboard_seller', function () {   
        return view('dashboard_seller');
    })->name('dashboard_seller');
    Route::get('dashboard_seller', 'ResellerController@dashboard');  
}); 

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    

}); 
// Route::get('dashboard_seller', 'SellerController@dashboardSeller');
// Route::post('dashboard_seller', 'SellerController@dashboardSeller');

// }); 

Route::get('dashboard_admin.dashboard', 'AdminController@dashboard');





    //-----tutup
Route::get('/ajax', [SearchController::class,'ajax']);
Route::get('/read', [SearchController::class,'read']);



Auth::routes();

Route::get('/doFood', 'DofoodController@index')->name('doFood.home');

Route::get('/login', [loginController::class, 'index']);

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});


// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/dashboard_seller', function() {
//     return view('dashboard_seller');
// });


Route::get('/barang_seller', function() {
    return view('barang.indexSeller');
});

Route::get('/create_barang_seller', function() {
    return view('barang.create');
});

Route::get('/edit_barang_seller', function() {
    return view('barang.edit');
});

// Route::get('/dashboard_admin.dashboard', function() {
//     return view('dashboard_admin.dashboard');
// });

// Route::get('/dashboard_user', function() {
//     return view('dashboard_admin.user');
// });


// Route::get('/restoran', function() {
//     return view('restoran.index');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware(['auth', 'pesanan'])->group(function () {
   Route::get('/my-profile', 'Profile\ProfileController@myprofile');
   Route::post('/my-profile-update', 'Profile\ProfileController@profileupdate');
    
   Route::get('/profile-driver', 'Profile\ProfileDriverController@profileDriver');
   Route::get('/tambahUser', 'Profile\ProfileDriverController@tambahUser')->name('tambahUser');
   Route::post('/driver-profile-create', 'Profile\ProfileDriverController@createProfile');  
   Route::post('/driver-profile-update', 'Profile\ProfileDriverController@profileupdate'); 
});

// route login role
Route::get('/registerSeller', function() {
    return view('auth.registerSeller');
});
Route::get('/loginSeller', function() {
    return view('auth.loginSeller');
});
Route::get('/registerDriver', function() {
    return view('auth.registerDriver');
});
Route::get('/loginDriver', function() {
    return view('auth.loginDriver');
});

// tutup /*   */

Route::get('/home', 'HomeController@index')->name('home', [
    "title" => "Home"
]);

Route::get('/do-food', 'DofoodController@index')->name('doFood', [
    "title" => "Do-Food"
])->middleware('pesanan');



// do-food

Route::get('/do-food/product', 'ProductController@index')->name('product')->middleware('pesanan');
Route::post('/do-food/product', 'ProductController@index')->name('product')->middleware('pesanan');

Route::get('order/{id}', 'ProductController@show')->middleware('pesanan');
Route::post('order/{id}', 'ProductController@order')->middleware('pesanan');

Route::get('do-food/orderNow/', 'ProductController@orderNow')->name('orderNow')/* ->middleware('pesanan') */;
Route::delete('do-food/orderNow/{id}', 'ProductController@delete');

Route::get('/do-food/detailRestoran/{id}', 'ProductController@restoran')->middleware('pesanan');
Route::post('/do-food/detailRestoran/{id}`', 'ProductController@restoran')->middleware('pesanan');

Route::get('konfirmasi', 'ProductController@konfirmasi')->middleware('pesanan');

Route::get('/do-food/history', 'HistoryController@index')->middleware('pesanan');
Route::get('/do-food/detailHistory/{id}', 'HistoryController@detail' )->middleware('pesanan');

Route::get('/do-food/maps/{id}', 'DofoodController@maps');

// profile customer 
Route::get('do-food/profile', 'Profile\ProfileController@myprofile')->middleware('pesanan');
Route::post('do-food/profile', 'Profile\ProfileController@profileupdate')->middleware('pesanan');

//Kategori

Route::get('/category/minuman', 'CategoryController@minuman')->name('minuman');
Route::get('/category/anekanasi','CategoryController@anekaNasi')->name('anekaNasi');
Route::get('/category/jajanan', 'CategoryController@jajanan')->name('jajanan');
Route::get('/category/siapsaji', 'CategoryController@siapSaji')->name('siapSaji');
Route::get('/category/roti', 'CategoryController@roti')->name('roti');
Route::get('/category/makanansehat', 'CategoryController@makananSehat')->name('makananSehat');

//close//

// <<<<<<<< Profile Ojol >>>>>>>>> 
Route::get('do-ride/profile', 'Profile\ProfileDriverController@profileDriver');
Route::post('do-ride/profile', 'Profile\ProfileDriverController@profileupdate');



Route::get('/do-ride', 'DorideController@index')->name('doRide', [
    "title" => "Do-Ride"
]);

Route::get('/do-ride/pesan', 'DorideController@pesan')->name('pesanDoride');
Route::post('/do-ride-store', 'DorideController@store')->name('storeDoride');


Route::middleware(['auth', 'role:Seller'])->group(function () {
// <---- Seller---->

    Route::get('/product/indexSeller', 'SellerController@index')->name('indexProduct');

    Route::get('/product/create', 'SellerController@create')->name('createProduct');

    Route::post('/product-store', 'SellerController@store')->name('storeProduct'); 

    Route::get('/product/{barang}/edit', 'SellerController@edit')->name('editProduct');
    Route::post('/product/{barang}/edit', 'SellerController@update')->name('updateProduct');
    Route::get('/product/{barang}/delete', 'SellerController@destroy')->name('deleteProduct');

    Route::get('/restaurant/index2', function () {
        $tbl_restorans = Restaurant::with('user')->where('id_user', Auth::user()->id)->firstOrFail();
        return view('restaurant.index', ['tbl_restorans' => $tbl_restorans]);
    })->name('indexResto');

    Route::get('/restaurant/index', 'RestaurantController@index');
    Route::get('/restaurant/create', 'RestaurantController@create')->name('createResto');
    Route::post('/restaurant-store', 'RestaurantController@store');
    Route::post('/restaurant-update', 'RestaurantController@update');
    Route::get('/incomingOrder/index', 'ResellerController@incomingOrder');
    // //////////------ CLOSE SELLER --------\\\\\\\\\
});

Route::group(['middleware' => ['auth', 'role:Driver']], function(){
    Route::get('/dashboard_driver', function () {
        return view('dashboard_driver');
    })->name('dashboard_driver');
    //////// Driver /////////
    Route::get('/dashboard_driver', 'DriverController@indexDashboard'); 
    Route::get('changeStatus', 'DriverController@changeStatus')->name('changeStatus');
    Route::get('/driver/order', 'DriverController@pesanan')->name('pesan');
    Route::get('/driver/history', 'DriverController@history')->name('riwayat');
    
}); 


// <<<<< Middleware Admin >>>>>>>> \\\\\
// Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard_admin.dashboard', 'AdminController@dashboard')->name('dashboard_admin');
    // <<<------- route Kategori ------>>>s
    Route::get('/category/index', 'CategoryController@index')->name('indexCategory');
    Route::post('category/index', 'CategoryController@index')->name('indexCategory');
    Route::get('/category/create', 'CategoryController@create')->name('createCategory');
    // Route::post('/kategori/create', 'KategoriController@store')->name('storeKategori');
    Route::post('/category-store', 'CategoryController@store'); 
    Route::get('/category/{kategori}/edit', 'CategoryController@edit')->name('editCategory');
    Route::post('/category/{kategori}/edit', 'CategoryController@update')->name('updateCategory');
    Route::get('/category/{kategori}/delete', 'CategoryController@destroy')->name('deleteCategory');
    // //////----- CLOSE CATEGORY ----- \\\\\\\\

    // <<<<<< dashboard User CRUD ADMIN  >>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('.dashboard', 'AdminController@dashboard')->name('dashboardAdmin');
        Route::get('/user/search', 'UserController@search')->name('search');
        Route::get('/user/index', 'UserController@index')->name('indexUser');
        Route::get('/user/create', 'UserController@create')->name('createUser');
        Route::post('/user/store', 'UserController@store')->name('storeUser');
        Route::get('/user/{id}/edit', 'UserController@editUser')->name('editUser');
        Route::post('/user/{id}/edit', 'UserController@updateUser')->name('updateUser');
        Route::get('/user/{id}/destroy', 'UserController@destroyUser')->name('destroyUser');
    });
    // //////---- CLOSE ----  \\\\\\\\
    // <<<<<< Dashboard Driver CRUD ADMIN > >>>>>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('/driver/index', 'DriverController@admin')->name('indexDriver');
        Route::get('/driver/create', 'DriverController@create')->name('createDriver');
        Route::post('/driver/create', 'DriverController@store')->name('storeDriver');
        Route::get('/driver/{id}/edit', 'DriverController@edit')->name('editDriver');
        Route::post('/driver/{id}/edit', 'DriverController@update')->name('updateDriver');
        Route::get('/driver/{id}/destroy', 'DriverController@destroy')->name('destroyDriver');
    });
    /* <<<<<<< CLOSE >>>>>>>> */
    
    // <<<<<< Dashboard Product CRUD ADMIN > >>>>>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('/product/index', 'AdminController@indexProduct')->name('indexproduct');
        Route::get('/product/create', 'AdminController@createProduct')->name('createproduct');
        Route::post('/product/create', 'AdminController@storeProduct')->name('storeproduct');
        Route::get('/product/{id}/edit', 'AdminController@editProduct')->name('editproduct');
        Route::post('/product/{id}/edit', 'AdminController@updateProduct')->name('updateproduct');
        Route::get('/product/{id}/destroy', 'AdminController@destroyProduct')->name('destroyproduct');
    });
    /* <<<<<<< CLOSE >>>>>>>> */
    
    // <<<<<< Dashboard Order CRUD ADMIN > >>>>>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('/order/index', 'AdminController@indexOrder')->name('indexOrder');
        Route::get('/order/create', 'AdminController@createOrder')->name('createOrder');
        Route::post('/order/create', 'AdminController@storeorder')->name('storeOrder');
        Route::get('/order/{id}/edit', 'AdminController@editorder')->name('editOrder');
        Route::post('/order/{id}/edit', 'AdminController@updateorder')->name('updateOrder');
        Route::get('/order/{id}/destroy', 'AdminController@destroyorder')->name('destroyOrder');
    });
    /* <<<<<<< CLOSE >>>>>>>> */
    
    // <<<<<< Dashboard Payment CRUD ADMIN > >>>>>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('/payment/index', 'AdminController@indexPayment')->name('indexPayment');
        Route::get('/payment/create', 'AdminController@createPayment')->name('createPayment');
        Route::post('/payment/create', 'AdminController@storePayment' )->name('storePayment');
        Route::get('/payment/{id}/edit','AdminController@editPayment' )->name('editPayment');
        Route::post('/payment/{id}/edit', 'AdminController@updatePayment')->name('updatePayment');
        Route::get('/payment/{id}/destroy', 'AdminController@destroyPayment')->name('destroyPayment');
    });
    /* <<<<<<< CLOSE >>>>>>>> */
    
    // <<<<<< Dashboard Contact CRUD ADMIN > >>>>>>>>>>>>
    Route::prefix('dashboard_admin')->group(function () {
        Route::get('/contact/index', 'AdminController@indexContact')->name('indexContact');
        Route::get('/contact/{id}/hapus', 'AdminController@hapusContact')->name('hapusContact');
    });

    Route::prefix('dashboard_admin')->group(function () {
    
        Route::get('/restaurant/index', 'AdminController@indexResto')->name('indexRestaurant');
        Route::get('/restaurant/create', 'AdminController@createResto')->name('createRestaurant');
        Route::post('/restaurant/create', 'AdminController@storeResto')->name('storeRestaurant');
        Route::get('restaurant/{id}/edit', 'AdminController@editResto')->name('editRestaurant');
        Route::post('/restaurant/{id}/edit', 'AdminController@updateResto')->name('updateRestaurant');
        Route::get('/restaurant/{id}/destroy', 'AdminController@destroyResto')->name('destroyRestaurant');
    
        
        Route::get('/restaurant/detail/{id}', 'AdminController@detailResto')->name('detailResto');
        Route::post('/restaurant/detail/{id}`', 'AdminController@detailResto')->name('detailResto');
    });
    
// });

/* <<<<<<< CLOSE >>>>>>>> */


Route::get('/do-food/detailRestoran/{id}', 'ProductController@restoran');
Route::post('/do-food/detailRestoran/{id}`', 'ProductController@restoran');

// ------<<<< Restaurant(Admin) CRUD >>>>>--------
// ////////---CLOSE-----\\\\\\\\\\\\\

// ------<<<< Restaurant CRUD >>>>>--------
// Route::prefix('restaurant')->group(function () {

//     Route::get('/index', 'RestaurantController@index')->name('indexResto'); 
//     Route::get('/create', 'RestaurantController@create')->name('createrResto');
//     Route::post('/create', 'RestaurantController@store')->name('storeResto');
//     Route::get('/{restoran}/edit', 'RestaurantController@edit')->name('editResto');
//     Route::post('/{id}/edit', 'RestaurantController@update')->name('updateResto');
//     // Route::get('/{id}/destroy', 'RestaurantController@destroy')->name('destroyRestaurant');
// });
// ////////---CLOSE-----\\\\\\\\\\\\\


// <<<<<---- contact About ----->>>>>>>>
// Route::post('/contact', 'ContactController@sendEmail')->name('contact-send');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@simpan')->name('contact-send');
// ///////----- CLOSE CONTACT ------->>>>>>>


Route::get('/read', 'ProductController@read');
Route::get('/ajax', 'ProductController@ajax');
Route::get('/search', 'ProductController@search')->name('search');

