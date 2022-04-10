<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use App\Models\Film;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'sale') {
            $showtimes = Showtime::all();
            return view('/admin/showtime/index')->with('showtimes', $showtimes);
        } else {
            Auth::logout();
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $films = Film::all();
        $cinemaRooms = CinemaRoom::all();
        return view('admin/showtime/insert', ['films' => $films, 'cinemaRooms' => $cinemaRooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'gio_bat_dau' => 'required',
                'gio_ket_thuc' => 'required',
                'ngay_chieu' => 'required',
                'phim_id' => 'required',
                'phong_chieu_id' => 'required',
            ],
            [
                'gio_bat_dau.required' => 'Gio bat dau khong duoc bo trong',
                'gio_ket_thuc.required' => 'Gio ket thuc khong duoc bo trong',
                'ngay_chieu.required' => 'Ngay chieu khong duoc bo trong',
                'phim_id.required' => 'Phim khong duoc bo trong',
                'phong_chieu_id.required' => 'Phong chieu khong duoc bo rong',
            ]
        );

        $showtime = new Showtime();
        $showtime->gio_bat_dau = $data['gio_bat_dau'];
        $showtime->gio_ket_thuc = $data['gio_ket_thuc'];
        $showtime->ngay_chieu = $data['ngay_chieu'];
        $showtime->phim_id = $data['phim_id'];
        $showtime->phong_chieu_id = $data['phong_chieu_id'];

        $showtime->save();
        return redirect('admin/showtime/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $films = Film::all();
        $cinemaRooms = CinemaRoom::all();
        $showtime = Showtime::find($id);
        return view('admin/showtime/updateDisplay', ['films' => $films, 'cinemaRooms' => $cinemaRooms, 'showtime' => $showtime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Showtime $showtime)
    {
        $data = $request->validate(
            [
                'gio_bat_dau' => 'required',
                'gio_ket_thuc' => 'required',
                'ngay_chieu' => 'required',
                'phim_id' => 'required',
                'phong_chieu_id' => 'required',
            ],
            [
                'gio_bat_dau.required' => 'Gio bat dau khong duoc bo trong',
                'gio_ket_thuc.required' => 'Gio ket thuc khong duoc bo trong',
                'ngay_chieu.required' => 'Ngay chieu khong duoc bo trong',
                'phim_id.required' => 'Phim khong duoc bo trong',
                'phong_chieu_id.required' => 'Phong chieu khong duoc bo rong',
            ]
        );

        $gio_bat_dau = $data['gio_bat_dau'];
        $gio_ket_thuc = $data['gio_ket_thuc'];
        $ngay_chieu = $data['ngay_chieu'];
        $phim_id = $data['phim_id'];
        $phong_chieu_id = $data['phong_chieu_id'];

        Showtime::where('id', '=', (int)$id)->update(['gio_bat_dau' => $gio_bat_dau, 'gio_ket_thuc' => $gio_ket_thuc, 'ngay_chieu' => $ngay_chieu, 'phim_id' => $phim_id, 'phong_chieu_id' => $phong_chieu_id]);

        return redirect('admin/showtime/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Showtime $showtime)
    {
        Showtime::where('Id', '=', (int)$id)->delete();

        return redirect('admin/showtime/index');
    }
}
