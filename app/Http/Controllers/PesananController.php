<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = PesananDetail::with(['keranjang' => function($q) {
            $q->where('user_id', auth()->user()->id);
        }])->get();

        return view('user.pesanan', compact('pesanan'));
    }   

    public function terima($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'diterima';
        $pesanan->save();
        return redirect()->back();
    }
}
