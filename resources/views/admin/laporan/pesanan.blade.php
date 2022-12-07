@extends('layouts.admin')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pesanan</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemesanan</th>
                <th scope="col">No HP</th>
                <th scope="col">Kurir</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($pesanan))
            @php
                $no = 1;
            @endphp
            @foreach ($pesanan as $item)
            <tr>
                <th scope="row">{{ $no++; }}</th>
                <td>{{ $item->detail[0]->keranjang->user->name }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->kurir }}</td>
                @php
                    $total = App\Models\Transaksi::where('order_id', $item->order_id)->first();
                @endphp
                <td>{{ $total->total ?? null }}</td>
                <td>
                    @if ($item->status == 'settlement')
                        <span class="badge badge-warning">Belum Diproses</span>
                    @endif
                    @if ($item->status == 'dikirim')
                        <span class="badge badge-primary">Dikirim</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection