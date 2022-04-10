<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CinemaRoomController extends Controller
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
            $cinemaRooms = CinemaRoom::all();
            return view('admin/cinemaRoom/index')->with('cinemaRooms', $cinemaRooms);
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
        if (Auth::user()->rolename == 'admin') {
            return view('admin/cinemaRoom/insert');
        } else {
            Auth::logout();
            return redirect('/login');
        }
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
                'so_luong_day' => 'required|integer',
                'so_luong_cot' => 'required|integer',
            ],
            [
                'so_luong_day.required' => 'So luong day khong duoc de trong',
                'so_luong_day.integer' => 'So luong cot phai la so nguyen',
                'so_luong_cot.required' => 'So luong cot khong duoc de trong',
                'so_luong_cot.integer' => 'So luong cot phai la so nguyen',
            ]
        );

        $cinemaRoom = new CinemaRoom();
        $cinemaRoom->so_luong_day = $data['so_luong_day'];
        $cinemaRoom->so_luong_cot = $data['so_luong_cot'];
        $cinemaRoom->save();
        return redirect('/admin/cinemaRoom/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CinemaRoom  $cinemaRoom
     * @return \Illuminate\Http\Response
     */
    public function show(CinemaRoom $cinemaRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CinemaRoom  $cinemaRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CinemaRoom $cinemaRoom)
    {
        $cinemaRoom = CinemaRoom::find($id);
        return view('admin/cinemaRoom/updateDisplay')->with('cinemaRoom', $cinemaRoom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CinemaRoom  $cinemaRoom
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'so_luong_day' => 'required|integer',
                'so_luong_cot' => 'required|integer',
            ],
            [
                'so_luong_day.required' => 'So luong day khong duoc de trong',
                'so_luong_day.integer' => 'So luong cot phai la so nguyen',
                'so_luong_cot.required' => 'So luong cot khong duoc de trong',
                'so_luong_cot.integer' => 'So luong cot phai la so nguyen',
            ]
        );

        $so_luong_day = $data['so_luong_day'];
        $so_luong_cot = $data['so_luong_cot'];
        CinemaRoom::where('id', '=', (int)$id)->update([
            'so_luong_day' => $so_luong_day, 'so_luong_cot' => $so_luong_cot
        ]);

        return redirect('admin/cinemaRoom/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CinemaRoom  $cinemaRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CinemaRoom::where('id', '=', (int)$id)->delete();

        return redirect('/admin/cinemaRoom/index');
    }
}
