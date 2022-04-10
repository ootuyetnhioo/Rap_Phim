@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('rolename') }}</label>

                                <div class="col-md-6">
                                    <input id="rolename" type="text" class="form-control @error('rolename') is-invalid @enderror" name="rolename" value="{{ old('rolename') }}" required autocomplete="name" autofocus>

                                    @error('name')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>
                            

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <form action="{{ route('customerRegisterProgress') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="bg-light rounded p-4 p-sm-0 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i></h3>
                                </a>
                                <h3>Đăng ký</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input id="ho_ten" type="text" class="form-control" name="ho_ten"
                                    value="{{ old('ho_ten') }}" required autocomplete="name" autofocus>
                                <label for="floatingText">Họ và tên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="mat_khau" type="password" class="form-control" name="mat_khau" required
                                    autocomplete="new-password">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="mat_khau_xac_nhan" type="password" class="form-control"
                                    name="mat_khau_xac_nhan" required autocomplete="new-password">
                                <label for="floatingPassword">Xác nhận mật khẩu</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="so_cmnd" type="number" class="form-control" name="so_cmnd" required>
                                <label for="floatingPassword">Số chứng minh nhân dân hay căn cước công dân</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="so_dien_thoai" type="number" class="form-control" name="so_dien_thoai"
                                    required>
                                <label for="floatingPassword">Số điẹn thoại</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="dia_chi" type="text" class="form-control" name="dia_chi" required>
                                <label for="floatingPassword">Địa chỉ</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="ngay_sinh" type="date" class="form-control" name="ngay_sinh" required>
                                <label for="floatingPassword">Ngày sinh</label>
                            </div>
                            <div class="form-floating mb-4">
                                <select name="gioi_tinh" id="gioi_tinh" class="form-control" name="gioi_tinh" required>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                                <label for="floatingPassword">Giới tính</label>
                            </div>
                            <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div> -->
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng ký</button>
                            <p class="text-center mb-0">Đã có tài khoản? <a href="/customerLogin">Đăng nhập</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sign Up End -->
    </div>
    </form>
    </div>
@endsection
