@extends('layouts.main')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Retur</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Retur</li>
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
                <h2>Pengembalian Pesanan</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('retur.tambah') }}" class="btn btn-primary">Tambah[+}</a>
            </div>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pesanan</th>
                        <th>Komplain</th>
                        <th>Bukti</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($retur))  
                    @php
                        $no = 1;
                    @endphp                      
                    @foreach ($retur as $item)
                    <tr>
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ $item->no_transaksi }}</td>
                        <td class="align-middle">{{ $item->komplain }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('retur/'.$item->gambar) }}" alt="bukti-pengembalian" class="img-fluid" style="width: 200px">
                        </td>
                        <td class="align-middle">
                            @if ($item->status == 'pending')
                                <span class="badge badge-warning">Menunggu</span>
                            @elseif($item->status == 'accepted')
                            <div class="d-block">
                                <div class="badge badge-success">Diterima</div>
                                <div>
                                    <a href="https://wa.me/6285128288255" class="btn btn-success">WA 085157688255</a>
                                </div>
                            </div>
                            @elseif($item->status == 'denied')
                                <span class="badge badge-danger">Ditolak</span>
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