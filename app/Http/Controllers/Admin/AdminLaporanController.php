<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLaporanController extends Controller
{
    public function pesanan()
    {
        $pesanan = Pesanan::where('status', '!=', 'pending')->get();

        return view('admin.laporan.pesanan', compact('pesanan'));
    }

    public function retur()
    {
        $retur = Retur::all();

        return view('admin.laporan.retur', compact('retur'));
    }
}
