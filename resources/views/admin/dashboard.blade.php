@extends('layouts.admin')

@section('content')

<div class="content mt-3">


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{ App\Models\User::where('role', 'user')->count() }}</span>
                </h4>
                <p class="text-light">Pengguna</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{ App\Models\Produk::count() }}</span>
                </h4>
                <p class="text-light">Produk</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{ App\Models\Pesanan::where('status', '!=', 'pending')->count() }}</span>
                </h4>
                <p class="text-light">Pesanan</p>

            </div>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart3"></canvas>
                </div>
        </div>
    </div>
    </div><!--/.col-->

    <div class="col-xl-3 col-lg-6">
        <div>
</div> <!-- .content -->

@endsection