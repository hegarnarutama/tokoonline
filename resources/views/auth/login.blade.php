@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Masuk</h3>
                        </div>
                    </div>
                    <form action="{{ route('login') }}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" name="email" class="form-control" required="">
                            <label class="form-control-placeholder" for="username">Email</label>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="password" class="form-control" required="">
                            <label class="form-control-placeholder" for="password">Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
                        </div>
                    </form>
                    <p class="text-center">Belum ada akun? <a href="{{ route('register') }}">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
