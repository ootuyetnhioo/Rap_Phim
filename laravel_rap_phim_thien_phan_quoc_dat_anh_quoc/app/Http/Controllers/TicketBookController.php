<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Employee;
use App\Models\Showtime;
use App\Models\TicketBook;
use App\Models\TicketSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketBookController extends Controller
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
            $ticketBooks = TicketBook::orderBy('id', 'ASC')->get();
            return view('admin/ticketBook/index')->with(compact('ticketBooks'));
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
        $ticketBooks = TicketBook::orderBy('id', 'ASC')->get();
        $seats = Seat::orderBy('id', 'ASC')->where('trang_thai', 1)->get();
        $employees = Employee::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $ticketSells = TicketSell::orderBy('id', 'ASC')->get();
        return view('admin/ticketBook/insert')->with(compact('ticketBooks', 'seats', 'employees', 'showtimes', 'ticketSells'));
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
                'gia_ve' => 'required|integer',
                'tong_tien' => 'required|integer',
                'suat_chieu_id' => 'required',
                'ghe_id' => 'required',
                /* |unique:ghe_ngoi */
                'nhan_vien_id' => 'required',
            ],
            [
                'gia_ve.required' => 'Gia ve khong duoc bo trong',
                'gia_ve.integer' => 'Gia ve phai la so nguyen',
                'tong_tien.required' => 'Tong tien khong duoc bo trong',
                'tong_tien.integer' => 'Tong tien phai la so nguyen',
                'suat_chieu_id.required' => 'Suat chieu khong duoc bo rong',
                'ghe_id.required' => 'Ghe khong duoc bo trong',
                /* 'ghe_id.unique'=>'Ghe da co nguoi dat', */
                'nhan_vien_id.required' => 'Nhan vien khong duoc bo trong',
            ]
        );

        $ticketBook = new TicketBook();
        $ticketBook->ngay_ban = date('d-m-Y H:i:s');
        $ticketBook->gia_ve = $data['gia_ve'];
        $ticketBook->tong_tien = $data['tong_tien'];
        $ticketBook->suat_chieu_id = $data['suat_chieu_id'];
        $ticketBook->ghe_id = $data['ghe_id'];
        Seat::where('id', $ticketBook->ghe_id)->update(['trang_thai' => 0]);
        $ticketBook->nhan_vien_id = $data['nhan_vien_id'];
        // $ticketBook->save();
        return redirect()->action([TicketBookController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketBook  $ticketBook
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vedat  $vedat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketBook = TicketBook::find($id);
        $seats = Seat::orderBy('id', 'ASC')->get();
        $employees = Employee::orderBy('id', 'ASC')->get();
        $showtimes = Showtime::orderBy('id', 'ASC')->get();
        $ticketSells = TicketSell::orderBy('id', 'ASC')->get();
        return view('admin/ticketBook/update')->with(compact('ticketBook', 'seats', 'employees', 'showtimes', 'ticketSells'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vedat  $vedat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'ngay_ban' => 'required',
                'gia_ve' => 'required|integer',
                'tong_tien' => 'required|integer',
                'suat_chieu_id' => 'required',
                'ghe_id' => 'required|unique:ghe_ngoi',
                've_ban_id' => 'required',
                'nhan_vien_id' => 'required',
            ],
            [
                'ngay_ban.required' => 'Ngay ban khong duoc bo trong',
                'gia_ve.required' => 'Gia ve khong duoc bo trong',
                'gia_ve.integer' => 'Gia ve phai la so nguyen',
                'tong_tien.required' => 'Tong tien khong duoc bo trong',
                'tong_tien.integer' => 'Tong tien phai la so nguyen',
                'suat_chieu_id.required' => 'Suat chieu khong duoc bo rong',
                'ghe_id.required' => 'Ghe khong duoc bo trong',
                'ghe_id.unique' => 'Ghe da co nguoi dat',
                've_ban_id.required' => 'Ve ban khong duoc bo trong',
                'nhan_vien_id.required' => 'Nhan vien khong duoc bo trong',
            ]
        );

        $ticketBook = TicketBook::find($id);
        $ticketBook->ngay_ban = $data['ngay_ban'];
        $ticketBook->gia_ve = $data['gia_ve'];
        $ticketBook->tong_tien = $data['tong_tien'];
        $ticketBook->suat_chieu_id = $data['suat_chieu_id'];
        $ticketBook->ghe_id = $data['ghe_id'];
        $ticketBook->ve_ban_id = $data['ve_ban_id'];
        $ticketBook->nhan_vien_id = $data['nhan_vien_id'];
        $ticketBook->save();
        return redirect()->action([TicketBookController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vedat  $vedat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TicketBook::find($id)->delete();
        return redirect()->action([TicketBookController::class, 'index']);
    }
}
