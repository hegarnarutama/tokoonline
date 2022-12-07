@extends('layouts.admin')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Retur</h1>
            </div>
        </div>
    </div>
</div>

<div class="p-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pesanan</th>
                <th>Komplain</th>
                <th>Bukti</th>
                <th>Status</th>
                <th>Aksi</th>
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
                        <span class="badge badge-success">Diterima</span>
                    @elseif($item->status == 'denied')
                        <span class="badge badge-danger">Ditolak</span>
                    @endif
                </td>
                <td class="align-middle">
                    @if ($item->status == 'pending')
                        <a href="{{ route('admin.retur.terima', ['id' => $item->id]) }}" class="btn btn-success">Terima</a>
                        <a href="{{ route('admin.retur.tolak', ['id' => $item->id]) }}" class="btn btn-danger">Tolak</a>
                    @else 
                        <button class="btn btn-success" disabled>Terima</button>
                        <button class="btn btn-danger" disabled>Tolak</button>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
    
@endsection