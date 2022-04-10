@extends('welcome')
@section('content')
@include('home.header')
<div class="bg-white">
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('/images/news/'.$news['hinh_anh'])}}" alt="khong co hinh anh" height="350px" width="350px">
            </div>
            <div class="col-md-8">
                <div style="padding-bottom: 30px;"><span class="text-uppercase font-weight-bold" style="color: #ff5400;">{{$news->ten_khuyen_mai}}</span></div>
                <div>
                    <p style="font-family: SairaSemiCondensed-Regular;"><?php echo $news->noi_dung; ?></p>
                    <p class="font-weight-bold">Điều kiện & điều khoản:</p>
                    <ul style="list-style: none;">
                        <li><p style="font-family: SairaSemiCondensed-Regular;"><?php echo $news->dieu_kien_dieu_khoan ;?></p></li>
                    </ul>
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