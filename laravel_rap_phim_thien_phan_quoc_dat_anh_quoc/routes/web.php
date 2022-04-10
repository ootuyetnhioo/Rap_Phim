<?php

use App\Http\Controllers\BuyTicketController;
use App\Http\Controllers\CinemaRoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\OrderContoller;
use App\Http\Controllers\KindOfMovieController;
use App\Http\Controllers\KindOfServiceController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketBookController;
use App\Http\Controllers\Customerscontroller;
use App\Http\Controllers\employeescontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerLoginSuccessController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CustomerLogoutSuccessController;
use App\Models\Films;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [indexController::class, 'film']);
Route::get('/chitiet/{id}', [indexController::class, 'filmdetails']);

Route::get('/buyTicketPage/{id}', [BuyTicketController::class, 'buyTicketPage']);
Route::post('/buyTicketProgress/{id}', [BuyTicketController::class, 'buyTicketProgress']);
// Route::post('/buyTicketProgress/{id}', [BuyTicketController::class, 'buyTicketProgress']);

Route::get('/showing', [indexController::class, 'showing']);
Route::get('/comingsoon', [indexController::class, 'comingsoon']);
Route::get('/member', [indexController::class, 'member']);
Route::get('/member1', function () {
    return view('home/page/detailKM1');
});
Route::get('/member2', function () {
    return view('home/page/detailKM2');
});

Route::get('/gioithieu',function(){
    return view('home/page/gioithieu');
});

Route::get('/tuyendung',function(){
    return view('home/page/tuyendung');
});

Route::get('/lienhe',function(){
    return view('home/page/lienhe');
});

Route::get('/dieukhoanchung',function(){
    return view('home/page/dieukhoanchung');
});

Route::get('/dieukhoangiaodich',function(){
    return view('home/page/dieukhoangiaodich');
});

Route::get('/new', [indexController::class, 'new']);
Route::get('/new/detail/{id}', [indexController::class, 'detail']);

Route::get('/buyTicketPage/{id}', [BuyTicketController::class, 'buyTicketPage']);

Route::get('/customerRegister', [CustomerRegisterController::class, 'register']);
Route::post('/customerRegister', [CustomerRegisterController::class, 'registerProgress'])->name('customerRegisterProgress');
Route::get('/customerLogin', [CustomerLoginController::class, 'login']);
Route::post('/customerLoginProgress', [CustomerLoginController::class, 'loginProgress'])->name('customerLoginProgress');

Route::get('/customerLoginSuccess', [CustomerLoginSuccessController::class, 'loginSuccessMovie']);
Route::get('/customerLoginSuccessDetail/{id}', [CustomerLoginSuccessController::class, 'loginSuccessMovieDetail']);
Route::get('/customerLogout', [CustomerLogoutSuccessController::class, 'logoutSuccessMovie']);

Route::prefix('/admin')->group(function () {
    /* dashboard=thong ke */
    Route::prefix('/dashboard')->group(function () {
        Route::get('/index', [DashboardController::class, 'index']);
        Route::get('/create', [DashboardController::class, 'create']);
        Route::post('/create', [DashboardController::class, 'store'])->name('adminFilmCreate');
        Route::get('/updateDisplay/{id}', [DashboardController::class, 'edit']);
        Route::post('/update/{id}', [DashboardController::class, 'update']);
        Route::get('/destroy/{id}', [DashboardController::class, 'destroy']);
    });
    /* employees=nhan vien */
    route::get('employees', [employeesController::class, 'index'])->name('indexemployees');
    route::get('employees/create', [employeesController::class, 'create']);
    route::post('employees/create', [employeesController::class, 'store'])->name('adminEmployeeCreate');
    route::get('employees/updateDisplay/{Id}', [employeesController::class, 'edit']);
    route::post('employees/update/{Id}', [employeesController::class, 'update']);
    route::get('employees/delete/{Id}', [employeesController::class, 'destroy']);
    /* customers:khách hang */
    route::get('customers', [Customerscontroller::class, 'index'])->name('indexcustomers');
    route::get('customers/create', [Customerscontroller::class, 'create']);
    route::post('customers/create', [Customerscontroller::class, 'store']);
    route::get('customers/update/{Id}', [Customerscontroller::class, 'edit']);
    route::post('customers/update/{Id}', [Customerscontroller::class, 'update']);
    route::get('customers/delete/{Id}', [Customerscontroller::class, 'destroy']);
    /* film */
    Route::prefix('/film')->group(function () {
        Route::get('/index', [FilmController::class, 'index']);
        Route::get('/create', [FilmController::class, 'create']);
        Route::post('/create', [FilmController::class, 'store'])->name('adminFilmCreate');
        Route::get('/updateStatus/{id}', [FilmController::class, 'updateStatus']);
        Route::get('/updateDisplay/{id}', [FilmController::class, 'edit']);
        Route::post('/update/{id}', [FilmController::class, 'update']);
        Route::get('/destroy/{id}', [FilmController::class, 'destroy']);
    });
    /* showtime */
    Route::prefix('/showtime')->group(function () {
        Route::get('/index', [ShowtimeController::class, 'index']);
        Route::get('/create', [ShowtimeController::class, 'create']);
        Route::post('/create', [ShowtimeController::class, 'store'])->name('adminShowtimeCreate');
        Route::get('updateDisplay/{id}', [ShowtimeController::class, 'edit']);
        Route::post('/update/{id}', [ShowtimeController::class, 'update']);
        Route::get('/destroy/{id}', [ShowtimeController::class, 'destroy']);
    });
    /* kind of movie */
    Route::prefix('/kindOfMovie')->group(function () {
        Route::get('/index', [KindOfMovieController::class, 'index']);
        Route::get('/create', [KindOfMovieController::class, 'create']);
        Route::post('create', [KindOfMovieController::class, 'store'])->name('adminKindOfMovieCreate');
        Route::get('/updateDisplay/{id}', [KindOfMovieController::class, 'edit']);
        Route::post('/update/{id}', [KindOfMovieController::class, 'update']);
        Route::get('/destroy/{id}', [KindOfMovieController::class, 'destroy']);
    });
    /* cinema room */
    Route::prefix('/cinemaRoom')->group(function () {
        Route::get('/index', [CinemaRoomController::class, 'index']);
        Route::get('/create', [CinemaRoomController::class, 'create']);
        Route::post('/create', [CinemaRoomController::class, 'store'])->name('adminCinemaRoomCreate');
        Route::get('/updateDisplay/{id}', [CinemaRoomController::class, 'edit']);
        Route::post('update/{id}', [CinemaRoomController::class, 'update']);
        Route::get('/destroy/{id}', [CinemaRoomController::class, 'destroy']);
    });
    Route::prefix('/kindOfService')->group(function () {
        Route::get('/index', [KindOfServiceController::class, 'index']);
        Route::get('/create', [KindOfServiceController::class, 'create']);
        Route::post('/create', [KindOfServiceController::class, 'store'])->name('adminKindOfServiceCreate');
        Route::get('/updateDisplay/{id}', [KindOfServiceController::class, 'edit']);
        Route::post('update/{id}', [KindOfServiceController::class, 'update']);
        Route::get('/destroy/{id}', [KindOfServiceController::class, 'destroy']);
    });

    Route::prefix('/seat')->group(function () {
        Route::get('/index', [SeatController::class, 'index']);
        Route::get('/create', [SeatController::class, 'create']);
        Route::post('/store', [SeatController::class, 'store']);
        Route::get('/edit/{id}', [SeatController::class, 'edit']);
        Route::put('/update/{id}', [SeatController::class, 'update']);
        Route::delete('/destroy/{id}', [SeatController::class, 'destroy']);
    });

    Route::prefix('/service')->group(function () {
        Route::get('/index', [ServiceController::class, 'index']);
        Route::get('/create', [ServiceController::class, 'create']);
        Route::post('/store', [ServiceController::class, 'store']);
        Route::get('/edit/{id}', [ServiceController::class, 'edit']);
        Route::put('/update/{id}', [ServiceController::class, 'update']);
        Route::delete('/destroy/{id}', [ServiceController::class, 'destroy']);
    });

    Route::prefix('/order')->group(function () {
        Route::get('/index', [OrderContoller::class, 'index']);
        Route::get('/create', [OrderContoller::class, 'create']);
        Route::post('/store', [OrderContoller::class, 'store']);
        Route::get('/edit/{id}', [OrderContoller::class, 'edit']);
        Route::put('/update/{id}', [OrderContoller::class, 'update']);
        Route::delete('/destroy/{id}', [OrderContoller::class, 'destroy']);
    });

    Route::prefix('/ticketBook')->group(function () {
        Route::get('/index', [TicketBookController::class, 'index']);
        Route::get('/create', [TicketBookController::class, 'create']);
        Route::post('/store', [TicketBookController::class, 'store']);
        Route::get('/edit/{id}', [TicketBookController::class, 'edit']);
        Route::put('/update/{id}', [TicketBookController::class, 'update']);
        Route::delete('/destroy/{id}', [TicketBookController::class, 'destroy']);
    });

    Route::prefix('/news')->group(function () {
        Route::get('/index', [NewsController::class, 'index']);
        Route::get('/create', [NewsController::class, 'create']);
        Route::post('/store', [NewsController::class, 'store']);
        Route::get('/edit/{id}', [NewsController::class, 'edit']);
        Route::put('/update/{id}', [NewsController::class, 'update']);
        Route::delete('/destroy/{id}', [NewsController::class, 'destroy']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
