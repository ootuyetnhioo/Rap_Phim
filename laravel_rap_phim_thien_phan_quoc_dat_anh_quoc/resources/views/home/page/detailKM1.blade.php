@extends('welcome')
@section('content')
@include('home.header')
<div class="bg-white">
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/COMBO_U22_MEDIA-02.jpg" alt="khong co hinh anh" height="350px" width="350px">
            </div>
            <div class="col-md-8">
                <div style="padding-bottom: 30px;"><span class="text-uppercase font-weight-bold" style="color: #ff5400;">KHUYẾN MÃI COMBO BẮP NƯỚC U22</span></div>
                <div>
                    <p style="font-family: SairaSemiCondensed-Regular;">Khuyến mãi bắp nước dành riêng cho những tín đồ điện ảnh dưới 22 tuổi tại Metiz Cinema, giờ đây bạn có thể mua bắp nước cho buổi xem phim thêm phần rôm rả với giá vô cùng ưu đãi. </p>
                    <p style="font-family: SairaSemiCondensed-Regular;">Có 2 combo để bạn lựa chọn: Combo 1 44K (1 bắp nhỏ và 1 nước vừa) và Combo 2 64K (1 bắp vừa và 2 nước vừa).</p>
                    <p style="font-family: SairaSemiCondensed-Regular;">Chương trình áp dụng từ Thứ 2 đến Thứ 6 hằng tuần.</p>
                    <p class="font-weight-bold">Điều kiện & điều khoản:</p>
                    <ul style="list-style: auto;">
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Chương trình chỉ áp dụng cho thành viên Metiz Cinema. Vui lòng xuất trình thẻ thành viên & Chứng minh nhân dân trước khi mua vé để được giá ưu đãi & tích lũy điểm thưởng.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Áp dụng cho hình thức mua trực tiếp tại quầy.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Giá không áp dụng vào các ngày lễ, Tết, suất chiếu đặc biệt, suất chiếu sớm.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Không áp dụng chung với chương trình khuyến mãi khác của Metiz Cinema.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Trong mọi trường hợp, mọi quyết định của Metiz Cinema là quyết định cuối cùng.</p></li>
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