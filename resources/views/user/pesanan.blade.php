@extends('layouts.main')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Pesanan</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Pesanan</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row mb-3">
            <div class="col-6">
                <h2>Pesanan</h2>
            </div>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pesanan</th>
                        <th>Total</th>
                        <th>Resi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($pesanan))  
                    @php
                        $no = 1;
                    @endphp                      
                    @foreach ($pesanan as $item)
                    <tr>
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ "PES" . sprintf("%04s", $item->pesanan->id) }}</td>
                        @php
                            $total = 0;
                            $total += ($item->keranjang->jumlah ?? 0) * ($item->keranjang->produk->harga ?? 0);
                        @endphp
                        <td class="align-middle">Rp{{ number_format($total, 0, 0, '.') }}</td>
                        <td class="align-middle">{{ $item->pesanan->resi }}</td>
                        <td class="align-middle">
                            @if ($item->pesanan->status == 'settlement')
                            Sedang Diproses
                            @else 
                            {{ $item->pesanan->status }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($item->pesanan->status == 'dikirim')
                            <a href="pesanan/{{ $item->pesanan->id }}/terima" class="btn btn-success">Terima</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection