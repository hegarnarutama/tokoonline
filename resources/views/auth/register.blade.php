@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Daftar</h3>
                        </div>
                    </div>
                    <form action="{{ route('register') }}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required="" value="{{ old('name') }}">
                            <label class="form-control-placeholder" for="name">Nama</label>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="" value="{{ old('email') }}">
                            <label class="form-control-placeholder" for="username">Email</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required="">
                            <label class="form-control-placeholder" for="password">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required="">
                            <label class="form-control-placeholder" for="password_confirmation">Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
                        </div>
                    </form>
                    <p class="text-center">Sudah ada akun? <a href="{{ route('login') }}">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

