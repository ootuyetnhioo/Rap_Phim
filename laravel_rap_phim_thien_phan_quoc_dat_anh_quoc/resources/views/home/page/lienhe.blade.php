@extends('welcome')
@section('content')
@include('home.header')
<div class="bg-white">
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h1 class="font-weight-bold">LIÊN HỆ VỚI CHÚNG TÔI</h1>
                <div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div>
                        <h3 class="text-center text-uppercase" style="font-size: 15px !important;">DỊCH VỤ KHÁCH HÀNG</h3>
                        <hr class="col-md-12" style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid black;">
                        <p>Hotline: <span style="color: #f07469;"> 0236 3630 689</span></p>
                        <p>Email: <span style="color: #f07469;"> contact@metiz.vn</span></p>
                    </div>
                    <div style="width: 52%;">
                        <h3 class="text-center text-uppercase" style="font-size: 15px !important;">LIÊN HỆ QUẢNG CÁO & HỢP TÁC</h3>
                        <hr class="col-md-12" style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid black;">
                        <p style="font-size: 15px !important;">Hotline: <span style="color: #f07469;"> 0236 3630 689</span></p>
                        <p style="font-size: 15px !important;">Email: <span style="color: #f07469;"> contact@metiz.vn</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <form action="" class="form-group col-md-12">
                        <ul class="form-list" style="list-style: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <li>
                                        <div class="input-box">
                                            <label for="" style="font-size: 15px !important;">Họ tên</label>
                                            <input type="text" class="input-text form-control" placeholder="Nhập Họ Tên Ở Đây">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="" style="font-size: 15px !important;">Email</label>
                                            <input type="text" class="input-text form-control" placeholder="Nhập Email Ở Đây">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="" style="font-size: 15px !important;">Số Điện Thoại</label>
                                            <input type="text" class="input-text form-control" placeholder="Nhập Số Điện Thoại Ở Đây">
                                        </div>
                                    </li>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <li>
                                            <div class="input-box">
                                                <label for="" style="font-size: 15px !important;">Nội Dung Cần Liên Hệ</label>
                                                <textarea class="form-control" name="" id="" cols="10" rows="8"></textarea>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <button class="btn btn-primary form-control"><span>Gửi Đi</span></button>
                    </form>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('home.footer')
@endsection