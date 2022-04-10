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

class BuyTicketController extends Controller
{
    public function buyTicketPage($id)
    {
        $showtime = Showtime::find($id);
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        $cinemaRoomsInShowtimeId = CinemaRoom::where('id', '=', $showtime->phong_chieu_id)->pluck('id');
        $movieId = $showtime->phim_id;
        $film = Film::find($movieId);
        $films = Film::all();
        $startDateInShowtime = date('Y-m-d', strtotime($showtime->gio_bat_dau));
        $endDateInShowtime = date('Y-m-d', strtotime($showtime->gio_ket_thuc));
        $promotionFilmDiscounts = News::where('phim_id', '=', $film->id)->where('ngay_bat_dau', '<=', $startDateInShowtime)->where('ngay_ket_thuc', '>=', $endDateInShowtime)->pluck('giam_gia');
        $allPromotionDiscount = 0;
        foreach ($promotionFilmDiscounts as $discount) {
            $allPromotionDiscount += $discount;
        }
        $seats = Seat::orderBy('id', 'ASC')->get();
        $seatIds = Seat::where('phong_chieu_id', '=', $cinemaRoomsInShowtimeId)->pluck('id');
        $ticketBookeds = TicketBook::where('suat_chieu_id', '=', $showtime->id)->pluck('ghe_id');
        $ticketBookedsArray = $ticketBookeds->toArray();
        $ticketBookedCount = TicketBook::where('suat_chieu_id', '=', $showtime->id)->count();
        $seatBookeds = [];
        $seatNotBookeds = [];
        foreach ($seatIds as $seatId) {
            if (in_array($seatId, $ticketBookedsArray) == false) {
                array_push($seatNotBookeds, (int)$seatId);
            }
        }

        foreach ($ticketBookeds as $ticketBooked) {
            array_push($seatBookeds, $ticketBooked);
        }
        return view('home.page.buyTicket')->with(compact('film', 'showtime', 'showtimes', 'cinemaRooms', 'cinemaRoomsInShowtimeId', 'film', 'films', 'seats', 'seatBookeds', 'ticketBookeds', 'seatNotBookeds', 'seatIds', 'promotionFilmDiscounts', 'allPromotionDiscount'));
    }

    public function buyTicketProgress($id, Request $request)
    {
        $film = Film::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $showtime = Showtime::where('id', '=', $id)->first();
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        $cinemaRoomId = $request->input('phongchieu');
        $seats = Seat::orderBy('id', 'ASC')->get();;
        $seatIds = Seat::where('phong_chieu_id', '=', $cinemaRoomId)->pluck('id');
        $seatInARooms = [];
        $ticketSelled = 0;
        $totalMoney = 0;
        $i = 0;
        $ticketBookeds = TicketBook::where('suat_chieu_id', '=', $showtime->id)->pluck('ghe_id');
        $ticketBookedsArray = $ticketBookeds->toArray();
        $seatBookeds = [];
        $seatNotBookeds = [];
        foreach ($seatIds as $seatId) {
            if (in_array($seatId, $ticketBookedsArray) == false) {
                array_push($seatNotBookeds, $seatId);
            }
        }
        /* $test = $request->input('seat' . '2563'); */
        foreach ($seats as $seat) {
            if ($seat->id == $request->input('seat' . $seat->id)) {
                $ticketSelled++;
            }
            if ($seat->id == $request->input('seat' . $seat->id)) {
                $ticketBook = new TicketBook();
                $ticketBook->ngay_ban = date('Y-m-d');
                $ticketBook->gia_tien = $request->input('price' . $seat->id);
                $ticketBook->suat_chieu_id = $showtime->id;
                $ticketBook->ghe_id = $seat->id;
                $ticketBook->nhan_vien_id = 2;
                $totalMoney = $totalMoney +  $request->input('price' . $seat->id);
                $ticketBook->save();
                $seatInARoom = Seat::where('phong_chieu_id', '=', $cinemaRoomId)->where('id', '=', $ticketBook->ghe_id)->get();
                $seatInARooms = Arr::add($seatInARooms, $i, $seat->vi_tri_day . "." . $seat->vi_tri_cot,);
                $i++;
            }
        }
        $order = new Order();
        $order->ngay_ban = date('Y-m-d');
        $order->so_luong_ve = $ticketSelled;
        $order->so_luong_dich_vu = 0;
        $order->tong_tien = $totalMoney;
        $order->nhan_vien_id = 2;
        $order->dich_vu_id = 1;
        if ($request->session()->has('customerId')) {
            $order->khach_hang_id = $request->session()->get('customerId');
        }
        $order->save();
        $current_order = Order::orderBy('id', 'DESC')->first();
        TicketBook::where('hoa_don_id', '=', null)->update([
            'hoa_don_id' => $current_order->id,
        ]);

        return view('home.page.buyTicketSuccess')->with(compact('id', 'showtime', 'film', 'showtimes', 'cinemaRooms', 'cinemaRoomId', 'ticketSelled', 'seatInARooms', 'totalMoney', 'seatNotBookeds'));
    }
    public function getVe(Request $request)
    {
    }
}
