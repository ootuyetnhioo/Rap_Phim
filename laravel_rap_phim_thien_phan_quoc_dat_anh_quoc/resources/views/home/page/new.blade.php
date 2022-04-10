@extends('welcome')
@section('content')
    @include('home.header')
    <div class="main bg-white">
        <div class="container">
            <div class="row">
                <div class="justify-content-center col-md-12">
                    <div class="jumbotron bg-white">
                        <h1 class="text-center">KHUYẾN MÃI & ƯU ĐÃI</h1>
                    </div>
                    <div class="row col-md-12">
                        @foreach ($news as $row)
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <a href="/new/detail/{{ $row->id }}"><img class="card-img-top thumbnail"
                                            src="{{ asset('/images/news/' . $row['hinh_anh']) }}" alt=""
                                            width="190px; height=190px; object-fit: cover;"></a>
                                    <div class="card-body text-center">
                                        <h5 class="card-text">
                                            {{ date('d-m-Y', strtotime($row->ngay_bat_dau)) }}-{{ date('d-m-Y', strtotime($row->ngay_ket_thuc)) }}
                                        </h5>
                                        <a href="/new/detail/{{ $row->id }}"
                                            style="color: #0e1d2f; text-decoration: none;">
                                            <h5 class="card-text text-uppercase font-weight-bold">KHUYẾN MÃI COMBO BẮP NƯỚC
                                                U22</h5>
                                        </a>
                                        <h5 class="card-text text-uppercase"></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('home.footer')
@endsection
