@extends('layouts.main')

@section('css')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endsection

@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form action="{{ route('checkout.simpan') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="col-6">
                        <label for="hp" class="form-label">No HP</label>
                        <input type="text" name="hp" class="form-control" id="hp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" name="provinsi">
                            <option selected disabled>-Pilih-</option>
                            @foreach ($provinsi as $item)
                            <option value="{{ $item->province_id.'|'.$item->province }}">{{ $item->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="kota" class="form-label">Kota</label>
                        <select class="form-control" name="kota">
                            <option selected disabled>-Pilih-</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="kurir" class="form-label">Kurir</label>
                        <select class="form-control" name="kurir">
                            <option selected disabled>-Pilih-</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="ongkir">Biaya Ongkos Kirim</label>
                        <input type="text" name="ongkir" class="form-control" id="ongkir" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pesanan">Biaya Pesanan</label>
                    @php
                        $cart = App\Models\Keranjang::where('user_id', auth()->user()->id)->where('status', 'pending')->with('produk')->whereHas('produk')->get();
                        $pesanan = 0;
                        foreach ($cart as $item) {
                            $pesanan += $item->produk->harga * $item->jumlah;
                        }
                    @endphp
                    <input type="text" name="pesanan" class="form-control" id="pesanan" value="{{ $pesanan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="total">Total Pesanan</label>
                    <input type="text" name="total" class="form-control" id="total" value="{{ $pesanan }}"readonly>
                </div>
                <button type="submit" class="btn btn-primary w-100">Bayar</button>
            </form>
        </div>
    </div>
    <!-- End Cart -->

    @if (Session::has('token'))
    <form action="{{ route('bayar.simpan') }}" method="post" id="form-bayar">
        @csrf
        <input type="hidden" name="data" value="{{ Session::get('data') }}">
        <input type="hidden" name="json" id="json">
    </form>
        <script>
            $(document).ready(() => {
                window.snap.pay('{{ Session::get("token") }}', {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        // alert("payment success!"); console.log(result);
                        submitForm(result)
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        // alert("wating your payment!"); console.log(result);
                        submitForm(result)
                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        // alert("payment failed!"); console.log(result);
                        submitForm(result)
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
    
                function submitForm(result){
                    $('#json').val(JSON.stringify(result));
                    // console.log(JSON.stringify(result));
                    $('#form-bayar').submit();
                }
            })
        </script>
    @endif
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('select[name=provinsi]').change(() => {
            var province = $('select[name=provinsi]').val();
            console.log(province);
            var provinsi = province.split("|");
            var prov = provinsi[0];
            $.ajax({
                url: '{{ route("kota") }}',
                type: 'get',
                data: {
                    provinsi: prov
                },
                success: function(data){
                    $.each(data, function(key, value){
                        $('select[name=kota]').append(`<option value="`+value.city_id+`|`+value.city_name+`">`+value.city_name+`</option>`);
                    })
                }
            })
        })
        $('select[name=kurir]').change(() => {
            var kota = $('select[name=kota]').val();
            var kurir = $('select[name=kurir]').val();
            if(kota != ''){
                $.ajax({
                    url: '{{ route("ongkir") }}',
                    type: 'get',
                    data: {
                        tujuan: kota,
                        kurir: kurir,
                        berat: 1000
                    },
                    success: function(data){
                        $('input[name=ongkir]').val(data);
                        var ongkir = Number(data);
                        var pesanan = Number($('input[name=pesanan]').val());
                        var total = ongkir + pesanan;
                        $('input[name=total]').val(total);
                    }
                })
            }
        })
    })
</script>
@endsection