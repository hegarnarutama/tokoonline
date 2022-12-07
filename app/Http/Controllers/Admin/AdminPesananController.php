<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('status', '!=', 'pending')->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        $detail = PesananDetail::where('pesanan_id', $id)->get();
        return view('admin.pesanan.detail', compact('detail', 'pesanan'));
    }

    public function resi(Request $request)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->status = 'dikirim';
        $pesanan->resi = $request->resi;
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }
}
