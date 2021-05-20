<?php

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

// Route::get('/coba', function () {
//     return view('admins.orders.view-order');
// });

// Route::get('/', function () {

//     return view('index-public');
// });
Route::get('/', 'IndexController@index')->name('index.public');

Route::get('/page-404', function(){
    return view('page-404');
});

Auth::routes();

Route::post('/payment_detail/', 'OrderController@paymentDetail');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin/daftar/customer','AdminController@daftarCustomer')->name('admin.daftar.customer');
    Route::get('/admin/table-order','AdminController@tableOrder')->name('admin.table-order');
    Route::get('/admin/table-paymnet','AdminController@tablePayment')->name('admin.table-payment');
    Route::put('/admin/order/update/{id}','AdminController@updateOrder')->name('admin.order.update');
    Route::get('/admin/daftar/order/{id}','AdminController@view')->name('admin.view.order');

    // Route::get('/admin/order/status-memesan','AdminController@orderMemesan')->name('admin.order.memesan');
    // Route::get('/admin/order/status-menunggu','AdminController@orderMenunggu')->name('admin.order.menunggu');
    // Route::get('/admin/order/status-menunggu-pembayaran','AdminController@orderMenungguBayar')->name('admin.order.menunggu.bayar');
    // Route::get('/admin/order/status-dibatalkan','AdminController@orderDibatalkan')->name('admin.order.dibatalkan');

    // Route::get('/admin/order/status-telah-dibayar','AdminController@orderTelahDibayar')->name('admin.order.telahdibayar');
    // Route::get('/admin/order/status-selesai','AdminController@orderSelesai')->name('admin.order.selesai');

     // Route::get('/admin/orders/payment/{payid}','AdminController@viewPayment')->name('order.admin.payment');

    Route::get('/home','AdminController@index')->name('admin.index');
   
    Route::group(['prefix' => 'admin'], function(){

        Route::resource('/wisata','WisataController');
    
        Route::resource('/hotel','HotelController');
    
        Route::resource('/resto', 'RestoController');
    
        Route::post('/paket/wisata/{wisata_id}', 'PaketController@hapusWisata')->name('paket.hapus.wisata');
        Route::post('/paket/wisata', 'PaketController@addToWisata')->name('wisata.carts');
    
        Route::post('/paket/hotel', 'PaketController@addToHotel')->name('hotel.carts');
        Route::post('/paket/hotel/{hotel_id}', 'PaketController@hapusHotel')->name('paket.hapus.hotel');
    
        Route::post('/paket/resto', 'PaketController@addToResto')->name('resto.carts');
        Route::post('/paket/resto/{resto_id}', 'PaketController@hapusResto')->name('paket.hapus.resto');
    
        Route::get('/paket/cart', 'PaketController@listCart')->name('paket.list');
        Route::post('/paket/simpan', 'PaketController@simpanPaket')->name('paket.simpan');
    
        Route::get('/paket/create', 'PaketController@create')->name('paket.create');
        Route::get('/paket', 'PaketController@index')->name('paket.index');

        Route::get('/table/data-customer','AdminController@dataCustomer')->name('admin.data.customer');
        Route::get('/table/data-admin','AdminController@dataAdmin')->name('admin.data.admin');
        Route::get('/form/input-customer','AdminController@formInputCustomer')->name('admin.input.customer');
        Route::post('/tambah/customer' ,'AdminController@tambahCustomer')->name('admin.tambah.customer');
        Route::get('/form/input-admin','AdminController@formInputAdmin')->name('admin.input.admin');
        Route::post('/tambah/admin' ,'AdminController@tambahAdmin')->name('admin.tambah.admin');
        Route::get('/ubah/customer/{id}','AdminController@formUbahCustomer')->name('admin.formubah.customer');
        Route::put('/simpan/ubah/customer/{id}','AdminController@simpanUbahCustomer')->name('admin.simpanUbah.customer');
        Route::get('ubah/admin/{id}','AdminController@formUbahAdmin')->name('admin.formubah.admin');
        Route::put('/simpan/ubah/admin/{id}','AdminController@simpanUbahAdmin')->name('admin.simpanUbah.admin');
    
    });
});

// Route::get('/home','AdminController@index')->name('admin.index');

Route::group(['prefix' => 'customer'], function() {
    Route::get('/login', 'CustomerController@loginForm')->name('customer.loginForm');
    Route::post('/login', 'CustomerController@login')->name('customer.login');
    Route::get('/register', 'CustomerController@registerForm')->name('customer.registerForm');
    Route::post('/register', 'CustomerController@register')->name('customer.register');

    Route::get('logout', 'CustomerController@logout')->name('customer.logout');

    Route::group(['middleware' => 'customer'], function() {
        Route::get('/home', 'CustomerController@index')->name('customer.home');

        Route::get('/profil/{id}','CustomerController@profilCustomer')->name('customer.profil');
        Route::get('/table-orders', 'CustomerController@tableOrderCustomer')->name('customer.table.order');
        Route::get('/table-payment', 'CustomerController@tablePaymentCustomer')->name('customer.table.payment');
        
            Route::get('/order/{id}', 'OrderController@index')->name('order.index');
            
            Route::post('/order/cart', 'OrderController@cartOrder')->name('order.cart');
            Route::post('/order/hapus/{id}', 'OrderController@hapusCart')->name('order.hapus.cart');
            Route::get('/orders/cart', 'OrderController@list')->name('order.carts');
            Route::post('/order/simpan', 'OrderController@simpanOrder')->name('order.simpan');

            Route::post('/order/input', 'OrderController@inputOrder')->name('order.input');

            Route::get('/orders','OrderController@Order')->name('order.list');

            Route::post('orders/batal/{id}', 'OrderController@batal')->name('order.batal');

            Route::get('/orders/payments/{id}','OrderController@Payment')->name('order.payment.bayar');

            Route::post('/orders/payment/simpan', 'OrderController@simpanPayment')->name('payment.simpan');

            Route::get('/orders/payment/view/{id}','OrderController@viewPayment')->name('order.payment.view');

            // Route::get('/lihat','OrderController@lihatdata')->name('lihatdata');

    });

});


    // Route::get('order/list', 'OrderController@list')->name('order.list');
    // Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/wisata', 'WisataController@wisata')->name('wisata.public');
    Route::get('/wisata/{id}','WisataController@detail')->name('wisata.detail');

    Route::get('/resto', 'RestoController@resto')->name('resto.public');
    Route::get('/resto/{id}','RestoController@detail')->name('resto.detail');

    Route::get('/hotel', 'HotelController@hotel')->name('hotel.public');
    Route::get('/hotel/{id}','HotelController@detail')->name('hotel.detail');

    Route::get('/paket', 'PaketController@paket')->name('paket.public');
    Route::get('/paket/{id}','PaketController@detail')->name('paket.detail');

    Route::get('/paket/detail/{id}', 'PaketController@adminDetail')->name('paket.admin.detail');

// Route::get('/test', 'OrderController@test')->name('test');








// Route::resource('/paket', 'PaketController');





