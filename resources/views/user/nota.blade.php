@extends('layouts.main')

@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div>
                                Nota Pembayaran
                            </div>
                        </div>
                        <div>
                            <div>
                                No Invoice : {{ $pesanan->order_id }}
                            </div>
                            <div>
                                Tanggal : {{ Carbon\Carbon::parse($pesanan->created_at)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $subtotal = 0;
                            @endphp
                            @foreach ($pesanan->detail as $item)
                            <tr>
                              <th scope="row">{{ $no++; }}</th>
                              <td>{{ $item->keranjang->produk->nama }}</td>
                              <td>{{ $item->keranjang->jumlah }}</td>
                              <td>{{ $item->keranjang->produk->harga }}</td>
                              <td>{{ $item->keranjang->produk->harga * $item->keranjang->jumlah }}</td>
                            </tr>
                            @php
                                $subtotal = $item->keranjang->produk->harga * $item->keranjang->jumlah;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right">
                                    <div>
                                        Subtotal : {{ $subtotal }}
                                    </div>
                                    <div>
                                        Ongkir : {{ $pesanan->ongkir }}
                                    </div>
                                    <div>
                                        Total : {{ $pesanan->ongkir + $subtotal }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

@endsection