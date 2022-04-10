<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use App\Models\Film;
use App\Models\News;
use App\Models\Showtime;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function film()
    {
        $news = News::orderby('id', 'DESC')->get();
        $film = Film::orderBy('id', 'DESC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        return view('home/page/movie')->with(compact('film', 'showtimes', 'cinemaRooms', 'news'));
    }

    public function filmdetails($id)
    {
        // $film = Film::orderBy('id','ASC')->where('id',$id)->get();
        $film = Film::find($id);
        $films = Film::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        return view('home/page/moviedetails')->with(compact('film', 'films', 'showtimes', 'cinemaRooms'));
    }

    public function showing()
    {
        $film = Film::orderBy('id', 'DESC')->get();
        return view('home/page/showing')->with(compact('film'));
    }

    public function comingsoon()
    {
        $film = Film::orderBy('id', 'DESC')->get();
        return view('home/page/comingsoon')->with(compact('film'));
    }

    public function member()
    {
        return view('home/page/member');
    }

    public function new()
    {
        $news = News::orderBy('id', 'DESC')->get();
        return view('home/page/new')->with(compact('news'));
    }

    public function detail($id)
    {
        $news = News::find($id);
        return view('home/page/detail')->with(compact('news'));
    }

    public function showtime()
    {
    }
}
