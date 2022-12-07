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
                    @if ($item->status == 'pending')
                        <span class="badge badge-warning">Menunggu</span>
                    @elseif($item->status == 'accepted')
                        <span class="badge badge-success">Diterima</span>
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
    
@endsection