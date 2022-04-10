<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Film;
use App\Models\Showtime;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CustomerLoginSuccessController extends Controller
{

    public function loginSuccessMovie(Request $request)
    {
        $loginSuccess = 'yes';
        $film = Film::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        $news = News::orderby('id', 'DESC')->get();
        $userId = $request->session()->get('userId');
        $email = $request->session()->get('email');
        $password = $request->session()->get('password');
        $customerId = $request->session()->get('customerId');
        return view('home/page/movie')->with(compact('film', 'loginSuccess', 'showtimes', 'cinemaRooms', 'news', 'userId', 'email', 'password', 'customerId'));
    }

    public function loginSuccessMovieDetail($id, Request $request)
    {
        $loginSuccess = 'yes';
        $film = Film::find($id);
        $films = Film::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        $news = News::orderby('id', 'DESC')->get();
        $userId = $request->session()->get('userId');
        $email = $request->session()->get('email');
        $password = $request->session()->get('password');
        $customerId = $request->session()->get('customerId');
        return view('home/page/moviedetails')->with(compact('film', 'films', 'loginSuccess', 'showtimes', 'cinemaRooms', 'news', 'userId', 'email', 'password', 'customerId'));
    }
}
