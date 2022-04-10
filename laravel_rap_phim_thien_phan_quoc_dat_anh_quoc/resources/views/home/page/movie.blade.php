@extends('welcome')
@section('content')
    @include('home.header')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <style>
        li.list-group-item {
            border-radius: 30px !important;
            background-color: transparent !important;
            border-color: white !important;
            border-top-width: 2px !important;
        }

        li.list-group-item.active {
            background-color: #ff5400 !important;
        }

        li.list-group-item a {
            text-decoration: none;
            background-color: transparent;
            color: white;
        }

        li.list-group-item a:hover {
            border: 0;
        }

        li.list-group-item:hover {
            background-color: #ff5400 !important;
        }

    </style>
    @if (isset($userId) && isset($email) && isset($password))
        {{ $userId }}
        <br>
        {{ $email }}
        <br>
        {{ $password }}
        <br>
        {{ $customerId }}
    @endif

    <section class="container">
        <!-- Start Slider -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="item1 active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class="item2"></li>
                <li data-target="#myCarousel" data-slide-to="2" class="item3"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider1.jpg"
                        alt="slide" />
                </div>
                <div class="carousel-item">
                    <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider2.jpg"
                        alt="slide" />
                </div>
                <div class="carousel-item">
                    <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider4.jpg"
                        alt="slide" />
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <!-- End Slider -->
    </section>

    <!-- Start Movie Section  -->
    {{-- Start lich chieu modal div --}}
    <div class="modal fade" id="showtime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1310px;">
            <div class="modal-content" style="max-width: 1310px;">
                <div class="modal-header" style="border-bottom: 0">
                    <h5 class="modal-title text-secondary" id="exampleModalLabel"
                        style="background: #fff;
                                                                                                                                                                                                                                                                                                                                                                                                                                      color: #ff5400;
                                                                                                                                                                                                                                                                                                                                                                                                                                      padding: 25px 15px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      border-bottom: 1px solid #ff5400;
                                                                                                                                                                                                                                                                                                                                                                                                                                      width: 100%;
                                                                                                                                                                                                                                                                                                                                                                                                                                      height: auto;
                                                                                                                                                                                                                                                                                                                                                                                                                                      line-height: 20px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      font-size: 24px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      ">
                        Lịch
                        chiếu
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 28px">&times;</span>
                    </button>
                    {{-- Start day of week div --}}

                    {{-- End day of week div --}}
                </div>
                <div class="modal-body">
                    <h3
                        style="font-size: 24px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      margin-top: 20px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      margin-bottom: 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                      color: black;
                                                                                                                                                                                                                                                                                                                                                                                                                                      padding-left: 15px;">
                        Chọn
                        lịch
                        chiếu
                    </h3>

                    @foreach ($film as $row)
                        <div class="container">
                            <h4 style="font-size: 16px; font-weight: bold; margin-top: 20px; color: black;">
                                {{ $row->ten }}</h4>
                            <div class="d-flex">
                                <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                    style="width:100px; height:100px; object-fit:cover" alt="">
                                <table border="1" style="margin-left: 20px;">
                                    <tr style="text-align:center">
                                        @foreach ($showtimes as $showtime)
                                            @if ($row->id == $showtime->phim_id)
                                                <th style="width:115px; height: 38px; line-height: 38px; font-size: 18px;">
                                                    <button style="background-color: white; border: 0;" data-toggle="modal"
                                                        data-target="#buyTicket{{ $showtime->id }}">{{ date('H:i', strtotime($showtime->gio_bat_dau)) }}-{{ date('H:i', strtotime($showtime->gio_ket_thuc)) }}</button>
                                                </th>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr style="height: 50px; text-align:center">
                                        @foreach ($showtimes as $showtime)
                                            @if ($row->id == $showtime->phim_id)
                                                @foreach ($cinemaRooms as $cinemaRoom)
                                                    @if ($showtime->phong_chieu_id == $cinemaRoom->id)
                                                        <td
                                                            style="height: 19px; line-height: 19px; font-size: 14px; font-family: 'SairaSemiCondensed-Regular';">
                                                            <button style="background-color: white; border: 0;"
                                                                data-toggle="modal"
                                                                data-target="#buyTicket{{ $showtime->id }}">Phòng chiếu
                                                                số: <br>0{{ $cinemaRoom->id }}</button>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
    </div>
    {{-- End lich chieu modal div --}}

    <div class="container-fluid product">
        <div class="container">
            <div class="movie-selection">
                <ul class="product__nav nav nav-tabs {{-- list-group --}}" style="flex-direction: row;">
                    <li id="buttonphimdangchieu" class="list-group-item active" onclick="activePhimDangChieu(this)"><a
                            class="nav-link">Phim đang
                            chiếu</a></li>
                    <li id="buttonphimsapchieu" class="list-group-item" onclick="activePhimSapChieu(this)"><a
                            class="nav-link">Phim sắp
                            chiếu</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="movie-show tab-pane active" id="phimdangchieu">
                    <div class="row owl-carousel owl-theme">
                        @foreach ($film as $row)
                            @if ($row->trang_thai == 1)
                                <div class="movie-item item">
                                    @if (!isset($email))
                                        <a href="/chitiet/{{ $row->id }}"><img style="height: 170px"
                                                src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                alt="khong co hinh anh" border="3" /></a>
                                    @endif
                                    @if (isset($email))
                                        <a href="/customerLoginSuccessDetail/{{ $row->id }}"><img
                                                style="height: 170px"
                                                src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                alt="khong co hinh anh" border="3" /></a>
                                    @endif
                                    <div class="movie-content">
                                        @if (!isset($email))
                                            <h3 class="movie-heading"><a href="/chitiet/{{ $row->id }}"
                                                    class="text-white">{{ $row->ten }}</a></h3>
                                        @endif
                                        @if (isset($email))
                                            <h3 class="movie-heading"><a
                                                    href="/customerLoginSuccessDetail/{{ $row->id }}"
                                                    class="text-white">{{ $row->ten }}</a></h3>
                                        @endif
                                        <p class="movie-time">Khởi
                                            chiếu:{{ date('d/m/Y', strtotime($row->ngay_cong_chieu)) }}</p>
                                        <button type="button" class="btn btn-light" data-toggle="modal"
                                            data-target="#exampleModal{{ $row->id }}"
                                            data-whatever="@mdo">Trailer</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#showtimeForFilm{{ $row->id }}">Đặt vé
                                        </button>
                                    </div>

                                    {{-- End lich chieu theo phim --}}
                                    {{-- Start hien suat chieu cua 1 phim --}}

                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="movie-show tab-pane" id="phimsapchieu">
                    <div class="row owl-carousel owl-theme">

                        @foreach ($film as $row)
                            @if ($row->trang_thai == 0)
                                <div class="movie-item item">
                                    @if (!isset($email))
                                        <a href="/chitiet/{{ $row->id }}"><img style="height: 170px"
                                                src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                alt="khong co hinh anh" border="3" /></a>
                                    @endif
                                    @if (isset($email))
                                        <a href="/customerLoginSuccessDetail/{{ $row->id }}"><img
                                                style="height: 170px"
                                                src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                alt="khong co hinh anh" border="3" /></a>
                                    @endif
                                    <div class="movie-content">
                                        @if (!isset($email))
                                            <h3 class="movie-heading"><a href="/chitiet/{{ $row->id }}"
                                                    class="text-white">{{ $row->ten }}</a></h3>
                                        @endif
                                        @if (isset($email))
                                            <h3 class="movie-heading"><a
                                                    href="/customerLoginSuccessDetail/{{ $row->id }}"
                                                    class="text-white">{{ $row->ten }}</a></h3>
                                        @endif
                                        <p class="movie-time">Khởi
                                            chiếu:{{ date('d/m/Y', strtotime($row->ngay_cong_chieu)) }}</p>
                                        <button type="button" class="btn btn-light" data-toggle="modal"
                                            data-target="#exampleModal{{ $row->id }}"
                                            data-whatever="@mdo">Trailer</button>
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#showtimeForFilm{{ $row->id }}">Đặt vé
                                        </button> --}}

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

        @foreach ($film as $row)
            {{-- Start trailer cua phin dang chieu va phim sap chieu --}}
            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-secondary" id="exampleModalLabel">
                                {{ $row->ten }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="{{ $row->trailer }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End trailer cua phin dang chieu va phim sap chieu --}}
            {{-- Start cac suat  chieu cua 1 phim thuoc phim dang chieu va phim sap chieu --}}
            <div class="modal fade" id="showtimeForFilm{{ $row->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 1310px;">
                    <div class="modal-content" style="max-width: 1310px;">
                        <div class="modal-header" style="border-bottom: 0">
                            <h5 class="modal-title text-secondary" id="exampleModalLabel"
                                style="background: #fff;
                                                                                                                                                                                                                                                                                                                                                                                                                          color: #ff5400;
                                                                                                                                                                                                                                                                                                                                                                                                                          padding: 25px 15px;
                                                                                                                                                                                                                                                                                                                                                                                                                          border-bottom: 1px solid #ff5400;
                                                                                                                                                                                                                                                                                                                                                                                                                          width: 100%;
                                                                                                                                                                                                                                                                                                                                                                                                                          height: auto;
                                                                                                                                                                                                                                                                                                                                                                                                                          line-height: 20px;
                                                                                                                                                                                                                                                                                                                                                                                                                          font-size: 24px;
                                                                                                                                                                                                                                                                                                                                                                                                                          ">
                                Lịch
                                chiếu
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 28px">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <h3
                                style="font-size: 24px;
                                                                                                                                                                                                                                                                                                                                                                                                                          margin-top: 20px;
                                                                                                                                                                                                                                                                                                                                                                                                                          margin-bottom: 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                          color: black;
                                                                                                                                                                                                                                                                                                                                                                                                                          padding-left: 15px;">
                                Chọn
                                lịch
                                chiếu
                            </h3>


                            <div class="container">
                                <h4 style="font-size: 16px; font-weight: bold; margin-top: 20px; color: black;">
                                    {{ $row->ten }}</h4>
                                <div class="d-flex">
                                    <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                        style="width:100px; height:100px; object-fit:cover" alt="">
                                    <table border="1" style="margin-left: 20px;">
                                        <tr style="text-align:center">
                                            @foreach ($showtimes as $showtime)
                                                @if ($row->id == $showtime->phim_id)
                                                    <th
                                                        style="width:115px; height: 38px; line-height: 38px; font-size: 18px;">
                                                        <button style="background-color: white; border: 0;"
                                                            data-toggle="modal"
                                                            data-target="#buyTicket{{ $showtime->id }}">{{ date('H:i', strtotime($showtime->gio_bat_dau)) }}-{{ date('H:i', strtotime($showtime->gio_ket_thuc)) }}</button>
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr style="height: 50px; text-align:center">
                                            @foreach ($showtimes as $showtime)
                                                @if ($row->id == $showtime->phim_id)
                                                    @foreach ($cinemaRooms as $cinemaRoom)
                                                        @if ($showtime->phong_chieu_id == $cinemaRoom->id)
                                                            <td
                                                                style="height: 19px; line-height: 19px; font-size: 14px; font-family: 'SairaSemiCondensed-Regular';">
                                                                <button style="background-color: white; border: 0;"
                                                                    data-toggle="modal"
                                                                    data-target="#buyTicket{{ $showtime->id }}">Phòng
                                                                    chiếu số:
                                                                    <br>0{{ $cinemaRoom->id }}</button>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            {{-- @endforeach --}}
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
            {{-- End cac suat  chieu cua 1 phim thuoc phim dang chieu va phim sap chieu --}}
            {{-- Start mua ve theo suat chieu thuoc phim dang chieu va sap chieu --}}
            @foreach ($showtimes as $showtime)
                <div class="modal fade" id="buyTicket{{ $showtime->id }}" tabindex="-1" style="z-index: 9999;"
                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đặt vé</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h2>{{ date('d-m-Y', strtotime($showtime->gio_bat_dau)) }}
                                </h2>
                                <h3>{{ date('H:i', strtotime($showtime->gio_bat_dau)) }}-{{ date('H:i', strtotime($showtime->gio_ket_thuc)) }}
                                </h3>
                                @foreach ($film as $row)
                                    @if ($row->id == $showtime->phim_id)
                                        <div>
                                            <h3>{{ $row->ten }}</h3>
                                            <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $row['hinh_anh']) }}"
                                                style="width:100px; height:100px; object-fit:cover" alt="">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="width: 80px; height: 40px; font-size: 15px;border-radius:0;"
                                    class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <a href="/buyTicketPage/{{ $showtime->id }}" class="btn btn-primary"
                                    style="width: 80px; height: 40px;font-size: 15px;border-radius:0;line-height:28px">
                                    Đặt vé</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- End mua ve theo suat chieu thuoc phim dang chieu va sap chieu --}}
            {{-- code tiep --}}
        @endforeach
        {{-- End lich chieu --}}
    </div>
    </div>
    <!-- End Movie Section  -->

    <!-- Start body new -->
    <div id="new">
        <div class="container">
            <h1 class="text-center">Khuyến mãi & ưu đãi</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div id="box">
                        <h2 id="title-box">Khuyến mãi hấp dẫn</h2>
                        <p>
                            Khám phá ngay hàng trăm lợi ích dành cho bạn trong chuyên mục
                            Khuyến mãi & Ưu đãi hấp dẫn của Metiz Cinema.
                        </p>
                    </div>
                </div>
                @foreach ($news as $key => $row)
                    @if ($key < 5)
                        <div class="new-img col-lg-3 col-sm-6 col-xs-12">
                            <img src="{{ asset('/images/news/' . $row['hinh_anh']) }}" alt="" />
                            <a href="/new/detail/{{ $row->id }}" class="bg_hover word-wrap">
                                <p>{{ $row->ten_khuyen_mai }}</p>
                                <h4 class="detail-btn">Chi tiết</h4>
                            </a>
                        </div>
                    @endif
                @endforeach
                <div class="new-img col-lg-3 col-sm-6">
                    <a href="/new"><img id="more"
                            src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/more_hover.png"
                            alt="" /></a>
                </div>
            </div>

        </div>
    </div>

    <div id="ads-facebook">
        <div class="container"></div>
    </div>
    <!-- End body new -->
    @include('home.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@endsection

@include('home.script')
