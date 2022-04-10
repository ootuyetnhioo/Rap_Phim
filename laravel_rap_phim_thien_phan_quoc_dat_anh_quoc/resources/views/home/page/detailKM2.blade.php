@extends('welcome')
@section('content')
@include('home.header')
<div class="bg-white">
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/U22_MEDIA-02.jpg" alt="khong co hinh anh" height="350px" width="350px">
            </div>
            <div class="col-md-8">
                <div style="padding-bottom: 30px;"><span class="text-uppercase font-weight-bold" style="color: #ff5400;">KHUYẾN MÃI GIÁ VÉ U22</span></div>
                <div>
                    <p style="font-family: SairaSemiCondensed-Regular;">Áp dụng giá vé 2D chỉ 45.000đ và 3D chỉ với 50.000đ cho thành viên Metiz Cinema từ 22 tuổi trở xuống, đối với mọi suất chiếu tại Metiz Cinema.</p>
                    <p style="font-family: SairaSemiCondensed-Regular;">Các tín đồ của phim rạp sẽ không lo bỏ lỡ bất kỳ bộ phim nào vì chương trình được ưu đãi tất cả các ngày trong tuần từ thứ Hai đến thứ Sáu. Từ nay, chỉ cần có tấm thẻ bài thành viên Metiz Cinema và CMND sẽ được xem phim thỏa thích rồi nhé!</p>
                    <p class="font-weight-bold">Điều kiện & điều khoản:</p>
                    <ul style="list-style: auto;">
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Chương trình chỉ áp dụng cho thành viên Metiz Cinema, dưới 22 tuổi trở xuống. Vui lòng xuất trình thẻ thành viên & chứng minh nhân dân trước khi mua vé để được giá ưu đãi & tích lũy điểm thưởng.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Áp dụng cho hình thức mua vé trực tiếp tại quầy.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Giá vé áp dụng cho ghế thường, ghế VIP.</p></li>
                        <li><p style="font-family: SairaSemiCondensed-Regular;">Giá vé không áp dụng vào các ngày lễ, Tết, suất chiếu đặc biệt, suất chiếu sớm.</p></li>
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