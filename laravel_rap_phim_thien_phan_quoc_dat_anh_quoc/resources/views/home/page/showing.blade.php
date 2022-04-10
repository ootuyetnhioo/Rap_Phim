@extends('welcome')
@section('content')
    @include('home.header')
    <div class="main bg-white">
        <div class="container">
            <div class="row">
                <div class="justify-content-center col-md-12">
                    <div class="jumbotron bg-white">
                        <h2 class="text-uppercase font-weight-bold">phim đang chiếu</h2>
                    </div>
                    <div class="row col-md-12">
                        @foreach ($film as $row)
                            @if ($row->trang_thai == 1)
                                <div class="col-md-3">
                                    <div class="card" style="width: 18rem;">
                                        <a href="/chitiet/{{ $row->id }}"><img
                                                style="width:190px;height=290px; object-fit: cover;" class="card-img-top"
                                                src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                alt="{{ $row->ten }}" height="290px" width="190px"></a>
                                        <div class="card-body text-center">
                                            <a href="/chitiet/{{ $row->id }}">
                                                <h3 class="card-title">{{ $row->ten }}</h3>
                                            </a>
                                            <h5 class="card-text text-uppercase font-weight-bold"></h5>
                                            <h5 class="card-text text-uppercase">thể loại: {{ $row->loaiphim->ten }}</h5>
                                            <h5 class="card-text text-uppercase">{{ $row->thoi_luong }}|
                                                {{ $row->gioi_han_tuoi }}</h5>
                                            <h5 class="card-text text-uppercase">khởi chiếu:
                                                {{ date('d/m/Y', strtotime($row->ngay_cong_chieu)) }}</h5>
                                            <a href="#" class="btn btn-primary">Đặt Vé</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('home.footer')
@endsection
