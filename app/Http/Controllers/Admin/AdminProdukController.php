<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function ubah($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.edit', compact('produk'));
        return $produk;
    }

    public function simpan(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori = $request->kategori;
        if($request->has('image')){
            $filename = rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/produk', $filename);
            $produk->gambar = $filename;
            $produk->save();
            return redirect()->route('admin.produk');
        }
    }

    public function edit(Request $request)
    {
        $produk = Produk::find($request->id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori = $request->kategori;
        if($request->has('image')){
            $filename = rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/produk', $filename);
            $produk->gambar = $filename;
            $produk->save();
            return redirect()->route('admin.produk');
        }
    }

    public function hapus($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->route('admin.produk');
    }
}
