@extends('welcome')
@section('content')
@include('home.header')
<section class="container">
        <!-- Start Slider -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li
              data-target="#myCarousel"
              data-slide-to="0"
              class="item1 active"
            ></li>
            <li data-target="#myCarousel" data-slide-to="1" class="item2"></li>
            <li data-target="#myCarousel" data-slide-to="2" class="item3"></li>
          </ul>

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider1.jpg" alt="slide" />
            </div>
            <div class="carousel-item">
              <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider2.jpg" alt="slide" />
            </div>
            <div class="carousel-item">
              <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/slider4.jpg" alt="slide" />
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
      <div class="container-fluid product">
        <div class="container">
          <div class="movie-selection">
            <ul class="product__nav">
              <li class="active">Phim đang chiếu</li>
              <li class="last">Phim sắp chiếu</li>
            </ul>
          </div>
          <div class="movie-show">
            <div class="row">
            @foreach($film as $row)
              <div class="col-lg-3 col-md-6 col-sm-12 movie-item">
                @if (!isset($loginSuccess))
                <a href="/chitiet/{{$row->id}}"><img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$row['hinh_anh']) }}" alt="khong co hinh anh" border="3" height="100" width="100"/></a>
                @endif
                @if (isset($loginSuccess))
                <a href="/customerLoginSuccessDetail/{{$row->id}}"><img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$row['hinh_anh']) }}" alt="khong co hinh anh" border="3" height="100" width="100"/></a>
                @endif
                <div class="movie-content">
                  @if(!isset($loginSuccess))
                  <h3 class="movie-heading"><a href="/chitiet/{{$row->id}}" class="text-white">{{$row->ten}}</a></h3>
                  @endif
                  @if (!isset($loginSuccess))
                  <h3 class="movie-heading"><a href="/customerLoginSuccessDetail/{{$row->id}}" class="text-white">{{$row->ten}}</a></h3>
                  @endif
                  <p class="movie-time">Khởi chiếu:{{date("d/m/Y",strtotime($row->ngay_cong_chieu))}}</p>
                  <!-- <a href="" class="btn">Trailer</a> -->

                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$row->id}}" data-whatever="@mdo">Trailer</button>

                  <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-secondary" id="exampleModalLabel">{{$row->ten}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe width="560" height="315" src="{{$row->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn" data-toggle="modal" data-target="#lichchieu1" data-whatever="@mdo">Đặt vé</button>

                  <div class="modal fade" id="lichchieu1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-secondary" id="exampleModalLabel">Lich Chieu</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              @endforeach
            </div>
          </div>
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
            <div class="new-img col-lg-3 col-sm-6 col-xs-12">
              <img
                src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/NOEL_METIZ_2019_GIANG_SINH_AM_AP_WEB-01.jpg"
                alt=""
              />
              <a href="" class="bg_hover word-wrap">
                <p>Măm combo, nhận ngay quà tặng ấm áp tại Metiz Cinema</p>
                <h4 class="detail-btn">Chi tiết</h4>
              </a>
            </div>
            <div class="new-img col-lg-3 col-sm-6 col-xs-12">
              <img
                src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/HALLOWEEN_2019_WEB-01.jpg"
                alt=""
              />
              <a href="" class="bg_hover word-wrap">
                <p>
                  Xem phim Metiz nhận kẹo còn không bị ghẹo dịp lễ halloween
                </p>
                <h4 class="detail-btn">Chi tiết</h4>
              </a>
            </div>
          </div>

          <div class="row">
            <div class="new-img col-lg-3 col-sm-6">
              <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/20.10.2019_WEB-01.jpg" alt="" />
              <a href="" class="bg_hover word-wrap">
                <p>Xem phim Metiz nhận quà ngọt ngào dịp lễ 20-10</p>
                <h4 class="detail-btn">Chi tiết</h4>
              </a>
            </div>
            <div class="new-img col-lg-3 col-sm-6">
              <img
                src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/METIZ_TRUNG_THU_2019_WEB-01.jpg"
                alt=""
              />
              <a href="" class="bg_hover word-wrap">
                <p>Xem phim Metiz rước lồng đèn xinh</p>
                <h4 class="detail-btn">Chi tiết</h4>
              </a>
            </div>
            <div class="new-img col-lg-3 col-sm-6">
              <img
                src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img//KM_SUPER__MONDAY_MEDIA-02.jpg"
                alt=""
              />
              <a href="" class="bg_hover word-wrap">
                <p>Super monday (thứ hai siêu hạng)</p>
                <h4 class="detail-btn">Chi tiết</h4>
              </a>
            </div>
            <div class="new-img col-lg-3 col-sm-6">
              <img id="more" src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/new-img/more_hover.png" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div id="ads-facebook">
        <div class="container"></div>
      </div>
      <!-- End body new -->
@include('home.footer')
@endsection