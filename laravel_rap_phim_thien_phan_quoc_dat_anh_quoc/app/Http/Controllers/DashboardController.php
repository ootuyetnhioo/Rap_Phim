<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\kindOfMovie;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'sale') {
            $films = Film::all();
            $kindOfMovies = kindOfMovie::all();
            $orders = Order::all();
            return view('admin/dashboard/index', ['films' => $films, 'kindOfMovies' => $kindOfMovies, 'orders' => $orders]);
        } else {
            Auth::logout();
            return redirect('/login');
        }
    }
}
