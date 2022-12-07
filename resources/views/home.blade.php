@extends('layouts.main')


@section('content')
        <!-- Start Slider -->
        <div id="slides-shop" class="cover-slides">
            <ul class="slides-container">
                <li class="text-center">
                    <img src="images/WhatsApp Image 2022-10-28 at 21.26.50.jpeg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Selamat Datang di <br> SEKAR SARI</strong></h1>
                                <p class="m-b-40">Kamu tau apa yang membuat Kebanggaan kami?  <br> Yaitu Kepuasan Anda.</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="images/WhatsApp Image 2022-10-28 at 21.27.10.jpeg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Selamat Datang di <br> SEKAR SARI</strong></h1>
                                <p class="m-b-40">Kamu tau apa yang membuat Kebanggaan kami?  <br> Yaitu Kepuasan Anda.</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="images/banner-03.jpg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Selamat Datang di <br> SEKAR SARI</strong></h1>
                                <p class="m-b-40">Kamu tau apa yang membuat Kebanggaan kami?  <br> Yaitu Kepuasan Anda.</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="slides-navigation">
                <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- End Slider -->
        <!-- Start Products  -->
        <div class="products-box" id="produk">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>MAKANAN DAN MINUMAN</h1>
                        </div>
                    </div>
                </div>
                <div class="row special-list">
                    @foreach ($produk as $item)
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{ asset('produk/'.$item->gambar) }}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <a class="cart" href="{{ route('detail', ['id' => $item->id]) }}"><i class="fas fa-eye"></i> Detail</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{ $item->nama }}</h4>
                                <h5> Rp. {{ $item->harga }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Products  -->    
        <div class="box-add-products" id="tentang-kami">
            <div class="container">
                <!-- Start About Page  -->
                <div class="about-box-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-frame"> <img class="img-fluid" src="images/Sekar Sari (1).jpg" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="noo-sh-title-top">Sekar Sari</span></h2>
                                <p>"Sekar Sari merupakan salah satu UMKM yang bergerak dibidang industri pangan yang memproduksi makanan kering dan minuman kering. Sekar Sari didirikan oleh ibu Sukasih pada bulan maret tahun 2018 yang berlokasi di sleman.</p>
                                <p>Sekar Sari mempunyai Visi menjadi produsen makanan dan minuman terkemuka di indonesia dan Misi meningkatkan kualitas dan kuantitas produksi makanan dan minuman, menyediakan jajanan dengan varian yang unik dan menarik, memberikan pelayanan yang baik bagi para konsumen.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About Page -->
            </div>
        </div>
@endsection