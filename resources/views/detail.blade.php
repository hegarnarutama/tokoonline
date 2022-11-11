@extends('layouts.main')

@section('content')
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ asset('produk/'.$produk->gambar) }}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ asset('produk/'.$produk->gambar) }}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ asset('produk/'.$produk->gambar) }}" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span> 
                    </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                        <span class="sr-only">Next</span> 
                    </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{ asset('produk/'.$produk->gambar) }}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{ asset('produk/'.$produk->gambar) }}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{ asset('produk/'.$produk->gambar) }}" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $produk->nama }}</h2>
                        <h5> Rp.{{ $produk->harga }}</h5>
                        <p class="available-stock"><span> Stok Tersedia {{ $produk->stok }}</span><p>
                        <h4>Deskripsi:</h4>
                        <p>{{ $produk->deskripsi }}</p>
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Jumlah</label>
                                    <input class="form-control" value="1" min="1" max="20" type="number">
                                </div>
                            </li>
                        </ul>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="{{ route('cart.tambah', ['id' => $produk->id]) }}">Tambah Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection