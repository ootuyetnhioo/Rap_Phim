<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use App\Models\Film;
use App\Models\Order;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\TicketBook;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CustomerLogoutSuccessController extends Controller
{
    public function logoutSuccessMovie()
    {
        session()->flush();
        return redirect('/');
    }
}
