<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        $retur = Retur::where('user_id', auth()->user()->id)
                ->get();
        return view('user.retur.index', compact('retur'));
    }

    public function tambah()
    {
        return view('user.retur.tambah');
    }

    public function simpan(Request $request)
    {
        $retur = new Retur();
        $retur->user_id = auth()->user()->id;
        $retur->no_transaksi = $request->kode;
        $retur->komplain = $request->komplain;
        if($request->hasFile('bukti')){
            $namefile = rand() . $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->move(public_path() . "/retur", $namefile);
            $retur->gambar = $namefile;
            $retur->save();
        }

        return redirect()->route('retur');
    }
}
