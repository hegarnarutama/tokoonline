<?php

use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\AdminProdukController;

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

Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');

Route::get('/detail/{id}', function ($id) {
    $produk = Produk::find($id);
    return view('detail', compact('produk'));
})->name('detail');

Route::middleware('auth')->group(function(){
    Route::get('cart/tambah/{id}', [KeranjangController::class, 'tambah'])->name('cart.tambah');
    Route::get('cart/simpan', [KeranjangController::class, 'simpan'])->name('cart.simpan');
    Route::get('bayar/{token}', [KeranjangController::class, 'bayar'])->name('bayar');
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
});

Auth::routes();