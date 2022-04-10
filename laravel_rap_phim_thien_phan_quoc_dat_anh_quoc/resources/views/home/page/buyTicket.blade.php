@extends('welcome')
@section('content')
@include('home.header')
<style>
  .seat {
    background: #848484; 
  }
  .active {
    background-color: orange;
  }
</style>
<div id="buy-ticket-div" style="background: #f0efe8; text-align:center">
    <h2>{{ $film->ten }}</h2>
    <h2>{{ date('d-m-Y', strtotime($showtime->gio_bat_dau)) }}</h2>
    <h3>{{ date('H:i:s', strtotime($showtime->gio_bat_dau)) }}-{{ date('H:i:s', strtotime($showtime->gio_ket_thuc)) }}</h3>
    <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$film['hinh_anh']) }}" alt="khong co hinh anh" border="3" height="100" width="100"/></a>
    <h3>Phòng chiếu: {{ $showtime->phong_chieu_id }}</h3>
      <form action="http://127.0.0.1:8000/buyTicketProgress/{{ $showtime->id }}" method="post">
        @csrf
        <input type="hidden" name="phongchieu" value="{{ $showtime->phong_chieu_id }}" />
        <div class="d-flex justify-content-center">
          @foreach ($seats as $seat)
            @foreach ($seatBookeds as $seatBooked)
              @if($seat->id == $seatBooked)
              <div class="" style="margin-left: 20px">
                <label for="seat{{ $seat->id }}" style="font-size: 15px">ghe {{ $seat->vi_tri_day }}.{{ $seat->vi_tri_cot }}</label><br>
                <input type="checkbox" onclick="" class="" name="seatAlreadySelect{{ $seat->id }}" id="" value="{{ $seat->id }}" disabled style="width: 50px; height: 50px">
                <input type="hidden" name="price{{ $seat->id }}" value="{{ '20000' }}">
                <p style="font-size: 15px">{{ $film->gia_tien - $film->gia_tien*$allPromotionDiscount/100 }}đ</p>
              </div>
              @endif
            @endforeach
            <br>
            @foreach ($seatNotBookeds as $seatNotBooked)
              @if ($seat->id == $seatNotBooked)
              <div class="" style="margin-left: 20px">
                <label for="seat{{ $seat->id }}" style="font-size: 15px">ghe {{ $seat->vi_tri_day }}.{{ $seat->vi_tri_cot }}</label><br>
                <input class="seat" onclick="buttonClick(this)"type="text" class="{{ $seat->id }}" name="seat{{ $seat->id }}" id="{{ $seat->id }}" value="null" style="width: 50px; height: 50px;font-size: 15px;color: transparent;cursor: pointer;">
                {{-- <input class="seat" onclick="buttonClick(this)" type="button" class="" name="option{{ $seat->id }}" value="no" style="width: 50px; height: 50px;font-size: 15px;"> --}}
                <input type="hidden" name="price{{ $seat->id }}" value="{{ $film->gia_tien - $film->gia_tien*$allPromotionDiscount/100 }}">
                <p style="font-size: 15px">{{ $film->gia_tien - $film->gia_tien*$allPromotionDiscount/100 }}đ</p>
                
              </div>
              @endif
            @endforeach
          @endforeach
        </div>
        <br>  
        <p style="font-size:15px;">Tổng giảm giá là: {{ $allPromotionDiscount }}%</p>
        
        <button type="submit" style="font-size: 20px">Đặt vé</button>
      </form>
</div>
    {{-- Start lich chieu modal div --}}
    <div class="movie-show">
        <div class="row">
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
                  padding-left: 15px;">Chọn lịch chiếu</h3>
                @foreach ($films as $row)
                <div class="container">
                  <h4 style="font-size: 16px; font-weight: bold; margin-top: 20px; color: black;">{{ $row->ten }}</h4>
                  <div class="d-flex">
                    <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$row['hinh_anh']) }}" style="width:100px; height:100px; object-fit:cover" alt="">
                    <table border="1" style="margin-left: 20px;">
                      <tr style="text-align:center">
                        @foreach ($showtimes as $showtimeRow)
                        @if ($row->id == $showtimeRow->phim_id)
                          <th style="width:115px; height: 38px; line-height: 38px; font-size: 18px;"><button style="background-color: white; border: 0;" data-toggle="modal" data-target="#buyTicket{{ $showtimeRow->id }}">{{ date("H:i",strtotime($showtimeRow->gio_bat_dau)) }}-{{ date("H:i",strtotime($showtimeRow->gio_ket_thuc)) }}</button></th>      
                        @endif
                        @endforeach
                      </tr>
                      <tr style="height: 50px; text-align:center">
                        @foreach ($showtimes as $showtimeRow)
                          @if ($row->id == $showtimeRow->phim_id)
                            @foreach ($cinemaRooms as $item)
                              @if ($showtimeRow->phong_chieu_id == $item->id)
                                <td style="height: 19px; line-height: 19px; font-size: 14px; font-family: 'SairaSemiCondensed-Regular';"><button style="background-color: white; border: 0;" data-toggle="modal" data-target="#buyTicket{{ $showtimeRow->id }}">Phòng chiếu số: <br>0{{ $item->id }}</button></td>
                              
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
        </div>
      </div>
    </div>
          {{-- End lich chieu modal div --}}
{{-- Start mua ve theo suat chieu --}}
@foreach ($showtimes as $showtime)
<div class="modal fade" id="buyTicket{{ $showtime->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đặt vé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>{{ date('d-m-Y', strtotime($showtime->gio_bat_dau)); }}</h2>
        <h3>{{ date('H:i:s', strtotime($showtime->gio_bat_dau)); }}-{{ date('H:i:s', strtotime($showtime->gio_ket_thuc)); }}</h3>
        @foreach ($films as $row)
        @if ($row->id == $showtime->phim_id)
        <div>
          <h3>{{ $row->ten }}</h3>
          <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$row['hinh_anh']) }}" style="width:100px; height:100px; object-fit:cover" alt="">
        </div>
        @endif
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" style="width: 80px; height: 40px; font-size: 15px" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" style="width: 80px; height: 40px;" class="btn btn-primary"><a href="/buyTicketPage/{{ $showtime->id }}" class="btn btn-primary" style="font-size: 15px"> Đặt vé</a></button>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- End mua ve theo suat chieu --}}
<script src="jquery-3.6.0.min.js"></script>
<script>
function buttonClick(element){
  element.classList.toggle('active');  
  if(element.value == 'null') {
    element.value = element.id;
  } else {
    element.value = 'null';
  }
  console.log(element.value);
  /* if(element.getAttribute('value') == 'no') {
    element.setAttribute('value','yes');
  }else {
    element.setAttribute('value','no');
  } */

}
</script>
@include('home.footer')
@endsection