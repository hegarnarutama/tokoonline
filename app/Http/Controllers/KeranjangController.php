<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\MidtransController;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::all();
        return view('user.cart', compact('keranjang'));
    }

    public function simpan(Request $request)
    {
        $user = array(
            'nama' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => '0812355511'
        );
        
        $user = json_encode($user);

        $token = MidtransController::config($request->total, $user);

        return redirect()->route('bayar', compact('token'));
    }

    public function bayar($token)
    {
        return view('user.bayar', compact('token'));
    }

    public function tambah($id)
    {
        $keranjang = new Keranjang();
        $keranjang->user_id = auth()->user()->id;
        $keranjang->produk_id = $id;
        $keranjang->jumlah = 1;
        $keranjang->save();

        return redirect()->route('home');
    }
}
