<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\API;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CampingController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\ATWController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\DanaKController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DanaPController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ATFController;
use App\Http\Controllers\TodayController;
use App\Http\Controllers\JadwalKamarController;
use App\Http\Controllers\JadwalCampController;
use App\Http\Controllers\RekapWController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\EventController;


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

// Route::get('/w', function () {
//     // return view('admin/layouts.master');
//     return view('template');
// });

Auth::routes();


// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
// =>  Halaman sehabis login

// Route::get('/dashboard', 'DashboardController@index');      // officer
Route::resource('/profile', ProfileController::class);
Route::put('/profile/updateimage/{id}', [App\Http\Controllers\ProfileController::class, 'update2'])->name('profile.update2');
Route::put('/profile/updatepassword/{id}', [App\Http\Controllers\ProfileController::class, 'update3'])->name('profile.update3');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/qrcode/{kode}', [App\Http\Controllers\ProfileController::class, 'qrcode'])->name('qrcode.kode');
Route::resource('/', FrontendController::class);
Route::get('/event', [App\Http\Controllers\FrontendController::class, 'event']);
Route::get('/event/{slug}', [App\Http\Controllers\FrontendController::class, 'eventtempat']);
Route::get('/explore', [App\Http\Controllers\FrontendController::class, 'explore']);
Route::resource('/pay', PaymentController::class);


// // Route::resource('/bayar', [PaymentController::class, 'bayar']);
// Route::get('/getevent', [App\Http\Controllers\FullCalendarController::class, 'getEvent']);
// Route::post('/createevent', [App\Http\Controllers\FullCalendarController::class, 'createEvent']);
// Route::post('/deleteevent',  [App\Http\Controllers\FullCalendarController::class, 'deleteEvent']);
// Route::get('/full-calender', [App\Http\Controllers\FullCalendarController::class, 'index']);
// Route::post('/full-calender/action', [App\Http\Controllers\FullCalendarController::class, 'action']);

// //=====================================

// Route::get('/desa/{slug}', [FrontendController::class, 'tempatshow'])->name('front.showd');
// Route::get('/wisata/{slug}', [FrontendController::class, 'tempatshow'])->name('front.showw');
// Route::get('/hotel/{slug}', [FrontendController::class, 'tempatshow'])->name('front.showh');
// Route::get('/kuliner/{slug}', [FrontendController::class, 'tempatshow'])->name('front.showk');
// // Route::get('/{kategori}/{slug}', [FrontendController::class, 'tempatshow'])->name('front.show');
// // Route::get('/wahana/{name}', [FrontendController::class, 'wahanashow'])->name('wahana.show');
// Route::post('/tiket/{name}', [TiketController::class, 'beli'])->name('tiket.beli');
// Route::get('/logout2', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout2');

// // Route::get('/pesananku', [App\Http\Controllers\HomeController::class, 'pesananku'])->name('pesananku');

// // ===================================
// //Pembayaran Midrrans
// Route::get('/bayar', [PaymentController::class, 'index']);
// Route::get('/bayar/{id}', [PaymentController::class, 'bayar']);
// Route::post('/bayar/{id}', [PaymentController::class, 'bayar']);
// Route::get('/bayar/snapfinish', [PaymentController::class, 'finish']);
// Route::post('/bayar/snapfinish/store', [PaymentController::class, 'store'])->name('payment.store');


// Route::get('/bayar/status/{kode}', [PaymentController::class, 'status'])->name('bayar_status');
// Route::post('/bayar/status/update/{kode}', [PaymentController::class, 'update'])->name('payment.update');
// Route::post('/bayar/cancel/{kode}', [PaymentController::class, 'cancel'])->name('payment.cancel');
// // Route::get('/bayar/cancel/{kode}', [PaymentController::class, 'cancel']);
// // Route::post('/bayar/status/{kode}', [PaymentController::class, 'store2'])->name('bayar_store');

// Route::get('/bayar/astatus/{kode}', [PaymentController::class, 'astatus'])->name('admin_bayar_status');
// //====================================
// // Route::get('/checkpenginapan', [FrontendController::class, 'checkpenginapan'])->name('checkp.index');
// Route::get('/checkpenginapan/{id}', [FrontendController::class, 'checkpenginapan']);
// Route::post('/checkpenginapan/{id}', [FrontendController::class, 'checkpenginapan']);
// // Route::get('/vtweb', [App\Http\Controllers\VtwebController::class, 'vtweb']);
// // Route::get('/bayarr/{id}', [App\Http\Controllers\VtwebController::class, 'bayar']);

// // Route::get('/vtdirect', [App\Http\Controllers\VtdirectController::class, 'vtdirect']);
// // Route::post('/vtdirect', [App\Http\Controllers\VtdirectController::class, 'checkout_process']);


// // Route::post('/vt_notif', [App\Http\Controllers\VtwebController::class, 'notification']);

// // // Route::get('/snap', [App\Http\Controllers\SnapController::class, 'snap']);
// // Route::get('/snap', [App\Http\Controllers\SnapController::class, 'snap']);


// // // Route::get('/snap/{id}', [App\Http\Controllers\SnapController::class, 'snap']);
// // Route::get('/snaptoken',  [App\Http\Controllers\SnapController::class, 'token']);
// // Route::post('/snapfinish',  [App\Http\Controllers\SnapController::class, 'finish']);

// Route::get('/mau/nginap', [App\Http\Controllers\FrontendController::class, 'pilihkamar'])->name('pilih.kamar');
// Route::post('/mau/nginap/pesan', [App\Http\Controllers\FrontendController::class, 'pesankamar'])->name('pesan.kamar');
// Route::get('/mau/nginap/pesan', [App\Http\Controllers\FrontendController::class, 'pesankamar']);
// // Cek
// // Route::get('/vt_transaction',  [App\Http\Controllers\TransactionController::class, 'transaction']);
// Route::get('/vt_transaction',  [App\Http\Controllers\TransactionController::class, 'transaction']);
// Route::post('/vt_transaction', [App\Http\Controllers\TransactionController::class, 'transaction_process']);

// Route::get('crop-image-upload',  [App\Http\Controllers\CropImageController::class, 'editgambar']);
// Route::get('crop-image-upload2',  [App\Http\Controllers\CropImageController::class, 'editgambar2']);
// Route::get('video-upload',  [App\Http\Controllers\TempatController::class, 'indexvideo']);
// Route::any('video-upload2',  [App\Http\Controllers\TempatController::class, 'videoupload'])->name('video-upload2');

// Route::post('crop-image-before-upload-using-croppie', [App\Http\Controllers\CropImageController::class, 'uploadCropImage2'])->name('croppie.upload-image');

// Route::resource('/kegiatan', KegiatanController::class);
// Route::get('/status/update/kegiatan/{kode}', [KegiatanController::class, 'toggleStatus'])->name('update.status.kegiatan');

// Route::group([
//     'middleware' => ['auth', 'pelanggan'],
// ], function () {

//     Route::get('/mau/camping/{id}', [App\Http\Controllers\FrontendController::class, 'maucamping'])->name('mau.camping');
//     Route::post('/mau/camping/pesan', [App\Http\Controllers\FrontendController::class, 'pesancamping'])->name('pesan.camping');
//     Route::get('/my-tiket/print/{kode}', [App\Http\Controllers\FrontendController::class, 'print']);
//     Route::post('/my-tiket/print/{kode}', [App\Http\Controllers\FrontendController::class, 'print'])->name('print.tiket');


//     Route::get('/pesananku', [App\Http\Controllers\PaymentController::class, 'pesananku'])->name('pesananku');
//     Route::get('/pesanan/detail/{kode}', [App\Http\Controllers\PaymentController::class, 'pesananku_detail']);
//     Route::get('/pesanan/all', [App\Http\Controllers\PaymentController::class, 'pesananku_all']);

//     Route::get('/cart', [TiketController::class, 'cart'])->name('cart');
//     // Route::get('/cartc', [TiketController::class, 'cartc'])->name('cart');
//     Route::get('/cart/tambah/{kode}', [TiketController::class, 'do_tambah_cart'])->where("id", "[0-9]+");
//     Route::post('/cart/tambah/{kode}', [TiketController::class, 'do_tambah_cart'])->where("id", "[0-9]+");

//     Route::post('/cart/tambah/camp/{kode}', [TiketController::class, 'do_tambah_cart_camp'])->where("id", "[0-9]+");

//     Route::get('/cart/tambah/camp/{kode}', [TiketController::class, 'do_tambah_cart_camp'])->where("id", "[0-9]+");
//     Route::post('/cart/tambah/tiket/{id}', [TiketController::class, 'do_tambah_cart_tiket'])->where("id", "[0-9]+");
//     Route::get('/cart/tambah/tiket/{id}', [TiketController::class, 'do_tambah_cart_tiket'])->where("id", "[0-9]+");

//     Route::get('/cart/hapus/{kode}', [TiketController::class, 'do_hapus_cart'])->where("id", "[0-9]+");
//     Route::get('/cart/hapus/camping/{kode}', [TiketController::class, 'do_hapus_cart_camping'])->where("id", "[0-9]+");

//     Route::get('/transaksi/tambah', [TiketController::class, 'do_tambah_transaksi']);
//     Route::post('/transaksi/tambah', [TiketController::class, 'do_tambah_transaksi']);
//     Route::delete('/transaksi/batal/{kode}', [TiketController::class, 'do_batal_transaksi'])->name('transaksi.batal');

//     Route::get('/cart/kuliner', [TiketController::class, 'cart_kuliner'])->name('cart.kuliner');
//     Route::post('/cart/tambah/kuliner/{kode}', [TiketController::class, 'do_tambah_kuliner'])->where("id", "[0-9]+");
//     Route::get('/cart/tambah/kuliner/{kode}', [TiketController::class, 'do_tambah_kuliner'])->where("id", "[0-9]+");
//     Route::get('/cart/hapus/kuliner/{kode}', [TiketController::class, 'do_hapus_cart_kuliner'])->where("id", "[0-9]+");
//     Route::get('/transaksi/tambah/kuliner', [TiketController::class, 'do_tambah_transaksi_kuliner'])->name('tambah.kuliner');
//     Route::post('/transaksi/tambah/kuliner', [TiketController::class, 'do_tambah_transaksi_kuliner']);

//     Route::get('/cart/camping', [TiketController::class, 'cart_camping'])->name('cart.camping');
//     Route::post('/pilihcamping/{id}', [FrontendController::class, 'pilihcamping'])->where("id", "[0-9]+");
//     Route::get('/pilihcamping/2/{id}', [FrontendController::class, 'pilihcamping2'])->where("id", "[0-9]+");
//     Route::post('/pilihcamping/2/{id}', [FrontendController::class, 'pilihcamping2'])->where("id", "[0-9]+");
//     Route::get('/transaksi/tambah/camping', [TiketController::class, 'do_tambah_transaksi_camping'])->name('tambah.camping');
//     Route::post('/transaksi/tambah/camping', [TiketController::class, 'do_tambah_transaksi_camping']);

//     Route::get('/cart/booking', [FrontendController::class, 'cart_booking'])->name('cart.booking');
//     Route::post('/penginapanpesan/{kode}', [FrontendController::class, 'cart_tambah_booking'])->where("id", "[0-9]+");
//     Route::get('/transaksi/tambah/booking', [TiketController::class, 'do_tambah_transaksi_booking'])->name('tambah.booking');
//     Route::post('/transaksi/tambah/booking', [TiketController::class, 'do_tambah_transaksi_booking']);

//     Route::post('/transaksi/event', [TiketController::class, 'do_tambah_transaksi_event'])->name('ikut.event');
// });


// Route::group([
//     'middleware' => ['auth', 'admin'],
//     'prefix' => 'admin',

// ], function () {
//     //  => CRUD Admin
//     // Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
//     // Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.edit');
//     // Route::resource('admin', 'AdminController');

//     Route::resource('/admin', AdminController::class);
//     Route::resource('/pelanggan', PelangganController::class);
//     Route::resource('/tempat', TempatController::class);
//     Route::resource('/pesananc', PesananController::class);
//     Route::resource('/setting', SettingController::class);

//     Route::get('/adana', [DanaController::class, 'acair'])->name('admin.dana');
//     Route::get('/tempat/check_slug', [TempatController::class, 'checkSlug'])->name('tempat.checkSlug');

//     Route::get('/status/update/{id}', [AdminController::class, 'toggleStatus'])->name('update.status.admin');
//     Route::get('/status/update2/{id}', [PelangganController::class, 'toggleStatus'])->name('update.status.pelanggan');
//     Route::get('/status/update3/{id}', [TempatController::class, 'toggleStatus'])->name('update.status.tempat');
//     Route::get('/konfitmasi/dana/{id}', [DanaController::class, 'konfirmasi'])->name('konfirmasi.dana');
//     Route::get('/konfitmasi/danatolak/{id}', [DanaController::class, 'tolak'])->name('penolakan.dana');

//     Route::get('crop-about1',  [App\Http\Controllers\CropImageController::class, 'about1']);
//     Route::post('crop-about1', [App\Http\Controllers\CropImageController::class, 'cropabout1'])->name('croppie.about1');
//     Route::get('crop-about2',  [App\Http\Controllers\CropImageController::class, 'about2']);
//     Route::post('crop-about2', [App\Http\Controllers\CropImageController::class, 'cropabout2'])->name('croppie.about2');
//     // Route::resource('admin', 'AdminController');
// });


// Route::group([
//     'middleware' => ['auth', 'wisata'],
//     'prefix' => 'awisata',

// ], function () {
//     Route::resource('/tiket', TiketController::class);
//     Route::resource('/wisata', WisataController::class);
//     Route::resource('/camping', CampingController::class);
//     Route::resource('/wahana', WahanaController::class);
//     Route::resource('/tempatATW', ATWController::class);

//     Route::get('/rekapw', [RekapWController::class, 'rekapwisata'])->name('rekapw.index');
//     Route::post('/rekapw', [RekapWController::class, 'sortw']);
//     Route::get('/rekapw/print/{date}', [RekapWController::class, 'printwisata'])->name('print.rekapw');

//     Route::get('/jadwalcamp', [JadwalCampController::class, 'index'])->name('jadwalcamp.index');

//     Route::get('/tempatf', [ATWController::class, 'kuliner'])->name('tempatf.index');
//     Route::post('/backcamp/{id}', [CampingController::class, 'backcamp'])->name('backcamp');
//     Route::get('/order', [TiketController::class, 'order'])->name('order.index');
//     Route::get('/checkw', [TiketController::class, 'checkw'])->name('checkw.index');
//     Route::post('/checkw', [TiketController::class, 'checkw']);
//     Route::resource('/dana', DanaController::class);
//     Route::post('/dana/cair', [DanaController::class, 'cair'])->name('dana.cair');
//     Route::get('/update/kedatangan/{id}', [TiketController::class, 'updatekedatangan'])->name('update.kedatangan');
//     Route::get('/status/update4/{id}', [WahanaController::class, 'toggleStatus'])->name('update.status.wahana');
//     Route::get('/status/update5/{id}', [CampingController::class, 'toggleStatus'])->name('update.status.camp');
//     Route::get('/status/update7/{id}', [ATWController::class, 'toggleStatus'])->name('update.status.atwkuliner');
// });

// Route::group([
//     'middleware' => ['auth', 'desa'],
//     'prefix' => 'adesa',

// ], function () {
//     Route::resource('/desa', DesaController::class);

//     Route::get('/admind', [AdminController::class, 'indexd'])->name('admind.index');
//     Route::get('/admind/create', [AdminController::class, 'created'])->name('admind.create');
//     Route::get('/admind/{id}/edit', [AdminController::class, 'editd'])->name('admin.editd');
//     Route::patch('/admind/update/{id}/', [AdminController::class, 'updated'])->name('admin.updated');

//     Route::get('/tempatf', [ATWController::class, 'desa'])->name('tempatf.kelola');
//     Route::get('/tempatd', [TempatController::class, 'indexd'])->name('tempat.indexd');
//     Route::patch('/tempatd/{id}', [TempatController::class, 'updated'])->name('tempat.updated');
//     Route::get('/tempatd/create', [TempatController::class, 'created'])->name('tempat.created');
//     Route::get('/tempatd/{id}/edit', [TempatController::class, 'editd'])->name('tempat.editd');

//     Route::post('/admin/stored', [AdminController::class, 'stored'])->name('admin.stored');
//     Route::post('/tempat/stored', [TempatController::class, 'stored'])->name('tempat.stored');

//     // Route::patch('/update/data/tempatd/{id}', [ATFController::class, 'updatedesa'])->name('update.data.desa');
//     Route::get('/update/tempat/desa/{id}', [DesaController::class, 'toggleStatus'])->name('update.status.desa');
//     Route::get('/status/updated/{id}', [TempatController::class, 'toggleStatus'])->name('update.status.tempatd');

//     Route::get('/rekapd', [RekapWController::class, 'rekapdesa'])->name('rekapd.index');
//     Route::post('/rekapd', [RekapWController::class, 'sortd']);
//     Route::get('/rekapd/print/{date}', [RekapWController::class, 'printdesa'])->name('print.rekapd');
// });

// Route::group([
//     'middleware' => ['auth', 'kuliner'],
//     'prefix' => 'akuliner',

// ], function () {

//     Route::get('/rekapk', [RekapWController::class, 'rekapkuliner'])->name('rekapk.index');
//     Route::post('/rekapk', [RekapWController::class, 'sortk']);
//     Route::get('/rekapk/print/{date}', [RekapWController::class, 'printkuliner'])->name('print.rekapk');

//     Route::get('/tempatkuliner', [ATFController::class, 'kuliner'])->name('atf.kuliner');
//     Route::get('/todaykuliner', [TodayController::class, 'todaykuliner'])->name('todaykuliner.index');
//     Route::get('/todaykuliner/selesai/{id}', [TodayController::class, 'updatekulinerselesai'])->name('update.selesai.pesanank');
//     Route::get('/todaykuliner/print/{today}', [TodayController::class, 'printkulinertoday'])->name('print.pesanank');
//     Route::resource('/kuliner', KulinerController::class);
//     Route::get('/status/update9/{id}', [KulinerController::class, 'toggleStatus'])->name('update.status.kuliner');

//     Route::get('/orderk', [TiketController::class, 'orderk'])->name('orderk.index');
//     Route::get('/checkk', [TiketController::class, 'checkk'])->name('checkk.index');
//     Route::post('/checkk', [TiketController::class, 'checkk']);
//     Route::get('/update/kedatangank/{id}', [TiketController::class, 'updatekedatangank'])->name('update.kedatangank');
//     Route::resource('/danak', DanakController::class);
//     Route::post('/danak/cair', [DanakController::class, 'kuliner_cair'])->name('danak.cair');
//     // Route::get('/status/update7/{id}', [ATFController::class, 'toggleStatus'])->name('update.status.atfkuliner');
//     Route::get('/update/tempat/atfkuliner/{id}', [ATFController::class, 'toggleStatus'])->name('update.status.tempat.kuliner');
//     // Route::post('/update/data/tempat{id}', [ATFController::class, 'updatekuliner'])->name('update.data.tempat.kuliner');
//     Route::patch('/update/data/tempat{id}', [ATFController::class, 'updatekuliner'])->name('update.data.tempat.kuliner');

//     // Route::resource('/kuliner', KulinerController::class);
// });


// Route::group([
//     'middleware' => ['auth', 'penginapan'],
//     'prefix' => 'penginapan',

// ], function () {



//     Route::get('/rekapp', [RekapWController::class, 'rekappenginapan'])->name('rekapp.index');
//     Route::post('/rekapp', [RekapWController::class, 'sortp']);
//     Route::get('/rekapp/print/{date}', [RekapWController::class, 'printpenginapan'])->name('print.rekapp');
//     Route::patch('/update/datap/tempat{id}', [ATFController::class, 'updatepenginapan'])->name('update.data.tempat.penginapan');

//     Route::get('/jadwalkamar', [JadwalKamarController::class, 'index'])->name('jadwalkamar.index');
//     Route::get('/tempatpenginapan', [ATFController::class, 'penginapan'])->name('atf.penginapan');


//     Route::resource('/kamar', KamarController::class);
//     Route::get('/status/update8/{id}', [KamarController::class, 'toggleStatus'])->name('update.status.kamar');
//     Route::get('/booking', [TiketController::class, 'booking'])->name('booking.index');
//     Route::get('/checkp', [TiketController::class, 'checkp'])->name('checkp.index');

//     Route::post('/checkp', [TiketController::class, 'checkp']);
//     Route::get('/update/kedatanganp/{id}', [TiketController::class, 'updatekedatanganp'])->name('update.kedatanganp');
//     Route::get('/update/kedatanganp2/{id}', [TiketController::class, 'updatekedatanganp2'])->name('update.kedatanganp2');
//     Route::resource('/danap', DanapController::class);
//     Route::post('/danap/cair', [DanapController::class, 'penginapan_cair'])->name('danap.cair');
//     Route::get('/tempatpenginapan', [ATFController::class, 'penginapan'])->name('atf.penginapan');
//     Route::get('/update/tempat/atfpenginapan/{id}', [ATFController::class, 'toggleStatus'])->name('update.status.tempat.penginapan');
// });

// Route::group([
//     'middleware' => ['auth', 'event & sewa tempat'],
//     'prefix' => 'event & sewa tempat',

// ], function () {
// });

Route::prefix('api')->group(function () {
    Route::get('/kuliner', [API::class, 'kuliner']);
    Route::get('/wahana', [API::class, 'wahana']);
    Route::get('/desa', [API::class, 'desa']);
    Route::get('/user', [API::class, 'user']);
    Route::get('/login', [API::class, 'login']);
    Route::post('/login', [API::class, 'login']);
});

// Route::get('/kategorievent', [App\Http\Controllers\EventController::class, 'index']);
// Route::post('/kategorievent/create', [App\Http\Controllers\EventController::class, 'create_kategorievent']);
// Route::post('/kategorievent/{id}/edit', [App\Http\Controllers\EventController::class, 'edit_kategorievent']);

// Route::get('/kategorievent/{id}/edit', 'EventController@edit');
// Route::post('/kategorievent/{id}/update', 'EventController@update');
// Route::get('/kategorievent/{id}/delete', 'EventController@delete');
