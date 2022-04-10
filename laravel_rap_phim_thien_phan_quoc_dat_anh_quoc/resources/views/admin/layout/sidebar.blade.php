<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/resources/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="http://127.0.0.1:8000/admin/dashboard/index" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
              <div class="dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-th me-2"></i>User
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a href="http://127.0.0.1:8000/admin/employees" class="nav-item nav-link dropdown-item"><i class="fa fa-chart-bar me-2"></i>Nhan Vien</a></li>
                  <li><a href="http://127.0.0.1:8000/admin/customers" class="nav-item nav-link dropdown-item"><i class="fa fa-table me-2"></i>Khach Hang</a></li>
                </ul>
              </div>
            <a href="http://127.0.0.1:8000/admin/cinemaRoom/index" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Phong Chieu</a>
            <a href="http://127.0.0.1:8000/admin/film/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Phim</a>
            <a href="http://127.0.0.1:8000/admin/kindOfMovie/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>The Loai Phim</a>
            <a href="http://127.0.0.1:8000/admin/kindOfService/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Loai Dich Vu</a>
            <a href="http://127.0.0.1:8000/admin/order/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Hoa Don</a>
            <a href="http://127.0.0.1:8000/admin/seat/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Ghe Ngoi</a>
            <a href="http://127.0.0.1:8000/admin/service/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Dich Vu</a>
            <a href="http://127.0.0.1:8000/admin/showtime/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Suat Chieu</a>
            <a href="http://127.0.0.1:8000/admin/news/index" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Khuyến Mãi</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                    </a> -->

                    <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    <!-- </div> -->
                </div>
            </div> --}}
        </div>
    </nav>
</div>