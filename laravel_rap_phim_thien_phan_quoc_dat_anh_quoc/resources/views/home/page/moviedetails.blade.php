@extends('welcome')
@section('content')
@include('home.header')
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$film['hinh_anh']) }}" alt="khong co hinh anh" style="width: 280px; height: 280px object-fit:cover">
            </div>
            <div class="col-md-8">
                <div><span class="text-uppercase font-weight-bold">{{$film->ten}}</span></div>
                <div>
                    <ul class="list-unstyled">
                        <li>Nhà Sản Xuất:{{$film->nha_san_xuat}}</li>
                        <li>Diễn Viên:{{$film->dien_vien}}</li>
                        <li>Thể Loại:{{$film->loaiphim->ten}}</li>
                        <li>Khởi Chiếu:{{$film->ngay_cong_chieu}}</li>
                        <li>Thời Lượng:{{$film->thoi_luong}}</li>
                        <li>Ngôn Ngữ:{{$film->ngon_ngu}}</li>
                        <li>Rated:{{$film->gioi_han_tuoi}}</li>
                        <li>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showtimeForFilm" style="font-size: 18px;">
                            Đặt vé
                          </button>
                          {{-- @foreach ($showtimes as $showtime)
                            @if ($film->id == $showtime->phim_id )
                            <a href="/buyTicketPage/{{ $showtime->id }}" type="button" class="btn btn-primary" style="font-size: 18px;">Đặt vé</a>
                            @endif
                          @endforeach --}}
                            {{-- <div class="modal fade" id="showtimeForFilm" tabindex="-1" aria-labelledby="showtimeForFilm" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-secondary" id="exampleModalLabel">Xác Nhận Đặt Vé</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Đặt vé thành công
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> --}}
                            <div class="modal fade" id="showtimeForFilm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" style="max-width: 1310px;">
                                <div class="modal-content" style="max-width: 1310px;">
                                  <div class="modal-header" style="border-bottom: 0">
                                    <h5 class="modal-title text-secondary" id="exampleModalLabel" style="background: #fff;
                                    color: #ff5400;
                                    padding: 25px 15px;
                                    border-bottom: 1px solid #ff5400;
                                    width: 100%;
                                    height: auto;
                                    line-height: 20px;
                                    font-size: 24px;
                                    ">Lịch chiếu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" style="font-size: 28px">&times;</span>
                                    </button>
                                    {{-- Start day of week div --}}
                                    
                                    {{-- End day of week div --}}
                                  </div>
                                  <div class="modal-body">
                                    <h3 style="font-size: 24px;
                                    margin-top: 20px;
                                    margin-bottom: 10px;
                                    color: black;
                                    padding-left: 15px;">Chọn lịch chiếu
                                    </h3>
                                  
                                  {{-- @foreach ($film as $row) --}}
                                  <div class="container">
                                    <h4 style="font-size: 16px; font-weight: bold; margin-top: 20px; color: black;">{{ $film->ten }}</h4>
                                    <div class="d-flex">
                                      <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$film['hinh_anh']) }}" style="width:100px; height:100px; object-fit:cover" alt="">
                                      <table border="1" style="margin-left: 20px;">
                                        <tr style="text-align:center">
                                          @foreach ($showtimes as $showtime)
                                          @if ($film->id == $showtime->phim_id)
                                            <th style="width:115px; height: 38px; line-height: 38px; font-size: 18px;"><button style="background-color: white; border: 0;" data-toggle="modal" data-target="#buyTicket{{ $showtime->id }}">{{ date("H:i",strtotime($showtime->gio_bat_dau)) }}-{{ date("H:i",strtotime($showtime->gio_ket_thuc)) }}</button></th>      
                                          @endif
                                          @endforeach
                                        </tr>
                                        <tr style="height: 50px; text-align:center">
                                          @foreach ($showtimes as $showtime)
                                            @if ($film->id == $showtime->phim_id)
                                              @foreach ($cinemaRooms as $cinemaRoom)
                                                @if ($showtime->phong_chieu_id == $cinemaRoom->id)
                                                  <td style="height: 19px; line-height: 19px; font-size: 14px; font-family: 'SairaSemiCondensed-Regular';"><button style="background-color: white; border: 0;" data-toggle="modal" data-target="#buyTicket{{ $showtime->id }}">Phòng chiếu số: <br>0{{ $cinemaRoom->id }}</button></td>
                                                
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
                            </div>
                        </li>
                    </ul>
                </div>
                {{-- Start showtime modal --}}
                <div class="modal fade" id="showtime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 1310px;">
                      <div class="modal-content" style="max-width: 1310px;">
                        <div class="modal-header" style="border-bottom: 0">
                          <h5 class="modal-title text-secondary" id="exampleModalLabel" style="background: #fff;
                          color: #ff5400;
                          padding: 25px 15px;
                          border-bottom: 1px solid #ff5400;
                          width: 100%;
                          height: auto;
                          line-height: 20px;
                          font-size: 24px;
                          font-family: "SairaSemiCondensed-Medium";">Lịch chiếu</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 28px">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h3 style="font-size: 24px;
                          margin-top: 20px;
                          margin-bottom: 10px;
                          color: black;
                          padding-left: 15px;">Chọn lịch chiếu</h3>
                        @foreach ($films as $row)
                        <div class="container">
                          <h4 style="font-size: 16px; font-weight: bold; margin-top: 20px; color: black;">{{ $row->ten }}</h4>
                          <div class="d-flex">
                            <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$row['hinh_anh']) }}" style="width:100px; height:100px; object-fit:cover" alt="">
                            <table border="1" style="margin-left: 20px;">
                              <tr style="text-align:center">
                                @foreach ($showtimes as $showtime)
                                @if ($row->id == $showtime->phim_id)
                                  <th style="width:115px; height: 38px; line-height: 38px; font-size: 18px;">{{ date("H:i",strtotime($showtime->gio_bat_dau)) }}-{{ date("H:i",strtotime($showtime->gio_ket_thuc)) }}</th>
                                  @endif
                                @endforeach
                              </tr>
                              <tr style="height: 50px; text-align:center">
                                @foreach ($showtimes as $showtime)
                                  @if ($row->id == $showtime->phim_id)
                                    @foreach ($cinemaRooms as $cinemaRoom)
                                      @if ($showtime->phong_chieu_id == $cinemaRoom->id)
                                        <td style="height: 19px; line-height: 19px; font-size: 14px; font-family: 'SairaSemiCondensed-Regular';">Phòng chiếu số: <br>0{{ $cinemaRoom->id }}</td>
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
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>
                </div>
                {{-- End showtime modal --}}
            </div>
        </div>

        <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#chitiet">Chi Tiết</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#trailer">Trailer</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="chitiet" class="container tab-pane active"><br>
                <p>{{$film->tom_tat}}</p>
                </div>
                <div id="trailer" class="container tab-pane fade justify-content-center"><br>
                <iframe width="560" height="315" src="{{$film->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('home.footer')
@endsection