<?php

namespace App\Http\Controllers;

use App\Models\CinemaRoom;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
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
            $seats = Seat::orderBy('id', 'ASC')->get();
            return view('admin/seat/index')->with(compact('seats'));
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

        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();

        // $phong_chieu = CinemaRoom::all();
        return view('admin/seat/insert')->with(compact('cinemaRooms'));
        // return view('admin/ghengoi/insert')->with('phong_chieu',$phong_chieu);
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
                'vi_tri_day' => 'required',
                'vi_tri_cot' => 'required|integer',
                'trang_thai' => 'required',
                'phong_chieu_id' => 'required',
            ],
            [
                'vi_tri_day.required' => 'Vi tri day khong duoc de trong',
                'vi_tri_cot.required' => 'Vi tri cot khong duoc de trong',
                'trang_thai.required' => 'Trang thai khong duoc de trong',
                'phong_chieu_id.required' => 'Phong chieu khong duoc de trong',
            ]
        );

        $seat = new Seat();
        $seat->vi_tri_day = $data['vi_tri_day'];
        $seat->vi_tri_cot  = $data['vi_tri_cot'];
        $seat->trang_thai  = $data['trang_thai'];
        $seat->phong_chieu_id  = $data['phong_chieu_id'];

        $seat->save();
        return redirect()->action([SeatController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinemaRooms = CinemaRoom::orderBy('id', 'ASC')->get();
        $seat = Seat::find($id);
        return view('admin/seat/update')->with(compact('cinemaRooms', 'seat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ghengoi  $ghengoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'vi_tri_day' => 'required',
                'vi_tri_cot' => 'required|integer',
                'trang_thai' => 'required',
                'phong_chieu_id' => 'required',
            ],
            [
                'vi_tri_day.required' => 'Vi tri day khong duoc de trong',
                'vi_tri_cot.required' => 'Vi tri cot khong duoc de trong',
                'trang_thai.required' => 'Trang thai khong duoc de trong',
                'phong_chieu_id.required' => 'Phong chieu khong duoc de trong',
            ]
        );

        $seat = Seat::find($id);
        $seat->vi_tri_day = $data['vi_tri_day'];
        $seat->vi_tri_cot  = $data['vi_tri_cot'];
        $seat->vi_tri_cot  = $data['trang_thai'];
        $seat->phong_chieu_id  = $data['phong_chieu_id'];

        $seat->save();
        return redirect()->action([SeatController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ghengoi  $ghengoi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seat::find($id)->delete();
        return redirect()->action([SeatController::class, 'index']);
    }
}
