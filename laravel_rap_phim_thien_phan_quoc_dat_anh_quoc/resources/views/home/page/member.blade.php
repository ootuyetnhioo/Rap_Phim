@extends('welcome')
@section('content')
@include('home.header')
<div class="main bg-white">
<div class="container">
    <div class="row">
    <div class="justify-content-center col-md-12">
            <div class="jumbotron bg-white">
                <h1 class="text-center">QUYỀN LỢI THÀNH VIÊN</h1>
            </div>
            <div class="row col-md-12">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <a href="/member1"><img class="card-img-top thumbnail" src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/COMBO_U22_MEDIA-02.jpg" alt="" height="290px" width="190px"></a>
                        <div class="card-body text-center">
                            <h5 class="card-text">09/02/2018 - 31/12/2021</h5>
                            <a href="/member1" style="color: #0e1d2f; text-decoration: none;"><h5 class="card-text text-uppercase font-weight-bold">KHUYẾN MÃI COMBO BẮP NƯỚC U22</h5></a>
                            <h5 class="card-text text-uppercase"></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <a href="/member2"><img class="card-img-top thumbnail" src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/U22_MEDIA-02.jpg" alt="" height="290px" width="190px"></a>
                        <div class="card-body text-center">
                            <h5 class="card-text">09/02/2018 - 31/12/2021</h5>
                            <a href="/member2" style="color: #0e1d2f; text-decoration: none;"><h5 class="card-text text-uppercase font-weight-bold">KHUYẾN MÃI GIÁ VÉ U22</h5></a>
                            <h5 class="card-text text-uppercase"></h5>
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