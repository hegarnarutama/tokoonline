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
        <form action="{{ route('retur.simpan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <label for="kode" class="form-label">Kode Pesanan</label>
                    <input type="text" name="kode" class="form-control" id="kode">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="komplain" class="form-label">Tidak Sesuai</label>
                    <select class="form-control" name="komplain">
                        <option selected disabled>-Pilih-</option>
                        <option value="Produk Tidak Sesuai">Produk Tidak Sesuai</option>
                        <option value="Produk Rusak">Produk Rusak</option>
                        <option value="Produk Kadaluarsa">Produk Kadaluarsa</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="bukti" class="form-label">Bukti Retur</label>
                    <input type="file" name="bukti" class="form-control" id="bukti" accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
    </div>
</div>
    
@endsection