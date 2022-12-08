<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\Api\RajaOngkirController;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('status', 'pending')->get();
        return view('user.cart', compact('keranjang'));
    }

    public function data()
    {
        $provinsi = RajaOngkirController::provinsi();
        return view('user.pengiriman', compact('provinsi'));
    }

    public function simpan(Request $request)
    {
        $user = array(
            'nama' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => $request->hp ?? '083451627'
        );
        $prov = explode("|", $request->provinsi);
        $kota = explode("|", $request->kota);
        $dt = array(
            'provinsi' => $prov[1],
            'kota' => $kota[1],
            'alamat' => $request->alamat,
            'kurir' => $request->kurir,
            'ongkir' => $request->ongkir,
            'hp' => $request->hp,
            'nama' => $request->nama,
        );
        $user = json_encode($user);
        $data = json_encode($dt);

        $token = MidtransController::config($request->total, $user);

        return redirect()->back()->with(['token' => $token, 'data' => $data]);
    }

    public function hapus($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return redirect()->route('cart');
    }

    public function bayar($token)
    {
        return view('user.bayar', compact('token'));
    }

    public function bayarSimpan(Request $request)
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
                    ->where('status', 'pending')
                    ->get();
        $json = json_decode($request->json);
        $transaksi = new Transaksi();
        $transaksi->order_id = $json->order_id;
        $transaksi->total = $json->gross_amount;
        $transaksi->status_transaksi = $json->transaction_status;
        $transaksi->save();
        
        $data = json_decode($request->data);
        $alamat = array(
            'provinsi' => $data->provinsi,
            'kota' => $data->kota,
            'alamat' => $data->alamat,
        );
        $pesanan = new Pesanan();
        $pesanan->nama = $data->nama;
        $pesanan->alamat = json_encode($alamat);
        $pesanan->no_hp = $data->hp;
        $pesanan->kurir = $data->kurir;
        $pesanan->ongkir = $data->ongkir;
        $pesanan->status = $json->transaction_status;
        $pesanan->order_id = $json->order_id;
        $pesanan->save();
        
        foreach($keranjang as $item){
            $item->status = 'checkout';
            $item->save();

            $detail = new PesananDetail();
            $detail->pesanan_id = $pesanan->id;
            $detail->keranjang_id = $item->id;
            $detail->save();
        }
        return redirect()->route('nota', ['id' => $pesanan->order_id]);
    }

    public function nota($id)
    {
        $pesanan = Pesanan::where('order_id', $id)->first();

        return view('user.nota', compact('pesanan'));
        return $pesanan;
    }

    public function tambah(Request $request)
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
                    ->where('produk_id', $request->produk_id)
                    ->where('status', 'pending')
                    ->first();
        if($keranjang){
            $keranjang->jumlah = $keranjang->jumlah + $request->jumlah;
            $keranjang->save();
        } else {
            $keranjang = new Keranjang();
            $keranjang->user_id = auth()->user()->id;
            $keranjang->produk_id = $request->produk_id;
            $keranjang->jumlah = $request->jumlah;
            $keranjang->save();
        }

        return redirect()->route('cart');
    }
}
