@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('Login') }}</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                        @error('email')
        <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
    @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                        @error('password')
        <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
    @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Login') }}
                                                        </button>

                                                        @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>
    @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

        <form method="POST" action="{{ route('customerLoginProgress') }}">
            @csrf
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="bg-light rounded p-4 p-sm-0 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <a href="index.html" class="">
                                    <!-- <h3 class="text-primary"><img class="img-thumbnail" src="http://127.0.0.1/laravel_rap_phim_thien_phan_authen_new_new_new/resources/views/home/img/METIZ_LOGO_WEB.png" alt=""></h3> -->
                                </a>
                                <h3>Đăng nhập</h3>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" required class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="mat_khau" required class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ</label>
                                </div>
                                <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng nhập</button>
                            <p class="text-center mb-0">Không có tài khoản ? <a href="/customerRegister">Đăng kí</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sign In End -->
    </div>
    </form>
    </div>
@endsection
