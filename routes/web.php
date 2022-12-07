<?php

use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Admin\AdminReturController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminPesananController;

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

Route::get('/', function () {
    $produk = Produk::all();
    return view('home', compact('produk'));
})->name('home');


Route::get('/detail/{id}', function ($id) {
    $produk = Produk::find($id);
    return view('detail', compact('produk'));
})->name('detail');

Route::middleware('auth')->group(function(){
    Route::get('nota/{id}', [KeranjangController::class, 'nota'])->name('nota');
    Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');
    Route::post('cart/tambah', [KeranjangController::class, 'tambah'])->name('cart.tambah');
    Route::get('cart/hapus/{id}', [KeranjangController::class, 'hapus'])->name('cart.hapus');
    Route::get('cart/simpan', [KeranjangController::class, 'data'])->name('cart.simpan');
    Route::post('checkout/simpan', [KeranjangController::class, 'simpan'])->name('checkout.simpan');
    Route::get('kota', [RajaOngkirController::class, 'kota'])->name('kota');
    Route::get('ongkir', [RajaOngkirController::class, 'ongkir'])->name('ongkir');
    Route::get('bayar/{token}', [KeranjangController::class, 'bayar'])->name('bayar');
    Route::post('bayar/simpan', [KeranjangController::class, 'bayarSimpan'])->name('bayar.simpan');
    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('pesanan/{id}/terima', [PesananController::class, 'terima'])->name('pesanan.terima');
    Route::get('pengembalian', [ReturController::class, 'index'])->name('retur');
    Route::get('pengembalian/tambah', [ReturController::class, 'tambah'])->name('retur.tambah');
    Route::post('pengembalian/simpan', [ReturController::class, 'simpan'])->name('retur.simpan');
});

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('produk')->group(function(){
        Route::get('/', [AdminProdukController::class, 'index'])->name('admin.produk');
        Route::get('/tambah', function(){
            return view('admin.produk.tambah');
        })->name('admin.produk.tambah');
        Route::get('ubah/{id}', [AdminProdukController::class, 'ubah'])->name('admin.produk.ubah');
        Route::post('edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::post('/simpan', [AdminProdukController::class, 'simpan'])->name('admin.produk.simpan');
        Route::get('hapus/{id}', [AdminProdukController::class, 'hapus'])->name('admin.produk.hapus');
    });

    Route::prefix('pesanan')->group(function(){
        Route::get('/', [AdminPesananController::class, 'index'])->name('admin.pesanan');
        Route::get('detail/{id}', [AdminPesananController::class, 'detail'])->name('admin.pesanan.detail');
        Route::post('resi', [AdminPesananController::class, 'resi'])->name('admin.resi');
    });

    Route::prefix('retur')->group(function(){
        Route::get('/', [AdminReturController::class, 'index'])->name('admin.retur');
        Route::get('terima/{id}', [AdminReturController::class, 'terima'])->name('admin.retur.terima');
        Route::get('tolak/{id}', [AdminReturController::class, 'tolak'])->name('admin.retur.tolak');
    });
    Route::prefix('laporan')->group(function(){
        Route::get('pesanan', [AdminLaporanController::class, 'pesanan'])->name('admin.laporan.pesanan');
        Route::get('retur', [AdminLaporanController::class, 'retur'])->name('admin.laporan.retur');
    });
});

Auth::routes();