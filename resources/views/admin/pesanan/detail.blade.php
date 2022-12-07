@extends('layouts.admin')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pesanan Detail {{ $pesanan->id }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($detail))
            @php
                $no = 1;
            @endphp
            @foreach ($detail as $item)
            @if (isset($item->keranjang->produk))
            <tr>
                <th scope="row">{{ $no++; }}</th>
                <td>{{ $item->keranjang->produk->nama }}</td>
                <td>{{ $item->keranjang->jumlah }}</td>
                <td>
                    @if ($item->status == 'settlement')
                        <span class="badge badge-warning">Belum Diproses</span>
                    @endif
                </td>
            </tr>
            @else
            <tr>
                <td>Produk Tidak Tersedia</td>
            </tr>
            @endif
            @endforeach
            @endif

        </tbody>
    </table>
    @if ($pesanan->status != 'dikirim')
    <form action="{{ route('admin.resi') }}" method="post" class="mt-16">
        <h3 class="mb-3">Resi Kiriman</h3>
        @csrf
        <input type="hidden" name="id" value="{{ $pesanan->id }}">
        <input type="text" name="resi" class="form-control mb-3">
        <button type="submit" class="btn btn-info">Simpan</button>
    </form>
    @endif
</div>

@endsection