<!-- Start Header -->

<header class="header container">
  

  <div class="header__info">
    <div class="header__info__phone">
      Hotline:
      <a href="tel:0236 3630 689">0236 3630 689</a>
    </div>
    <div class="header__info__opentime">Giờ mở cửa: 8:00-22:00</div>
    <div class="topbar__language">
      <button class="topbar__language--vn active">VN</button>
      <button class="topbar__language--en">EN</button>
    </div>
  </div>

  <div class="header__container">
    <a class="header__logo" href="/">
      <img src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/views/home/img/METIZ_LOGO_WEB.png" alt="logo" />
    </a>
    <div class="header__nav">
      <ul class="nav header__nav--left">
        <li>
          {{-- <a href="#modal-movie-showtimes" movie-day-selected="2022-03-18">Lịch chiếu</a> --}}
          <!-- Button trigger modal -->
          <a type="button" data-toggle="modal" data-target="#showtime" data-whatever="@mdo" style="color: white">Lịch chiếu</a>
        </li>
        <li class="header__dropdown">
          <p>Phim</p>
          <div class="header__dropdown-menu">
            <a href="http://127.0.0.1:8000/showing">Phim đang chiếu</a>
            <a href="http://127.0.0.1:8000/comingsoon">Phim sắp chiếu</a>
          </div>
        </li>
        <li><a href="/new">Khuyến mãi</a></li>
        <li><a href="/member">Quyền Lợi</a></li>
      </ul>
      @if (!isset($email))
      <ul class="nav header__nav--right">
        <li><a href="/customerLogin">Đăng nhập</a></li>
        <li><a href="/customerRegister">Đăng kí</a></li>
      </ul>
      @endif
      @if (isset($email))
      <ul class="nav header__nav--right">
        <li><a href="/customerLogout">Đăng xuất</a></li>
      </ul>
      @endif
    </div>
  </div>
</header>
<!-- End Header -->