@extends('layouts.admin')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Produk</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right py-2">
            <a href="{{ route('admin.produk.tambah') }}" class="btn btn-primary">Tambah (+)</a>
        </div>
    </div>
</div>
<div class="container pt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($produk as $item)
            <tr>
                <th scope="row">{{ $no; }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori }}</td>
                <td>Rp{{ number_format($item->harga, 0, 0, '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ substr($item->deskripsi, 0, 5) }}...</td>
                <td>
                    <img src="{{ asset('produk/'.$item->gambar) }}" alt="" style="width: 80px;">
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('detail', ['id' => $item->id]) }}" role="button">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-success ml-2" href="{{ route('admin.produk.ubah', ['id' => $item->id]) }}" role="button">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-danger ml-2" href="{{ route('admin.produk.hapus', ['id' => $item->id]) }}" role="button">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection