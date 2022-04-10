<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\TicketBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderContoller extends Controller
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
            $orders = Order::orderBy('id', 'ASC')->get();
            $ticketBooks = TicketBook::orderBy('id', 'ASC')->get();
            $showtimes = Showtime::orderBy('id', 'ASC')->get();
            $seats = Seat::orderBy('id', 'ASC')->get();
            $employees = Employee::orderBy('id', 'ASC')->get();
            return view('admin/order/index')->with(compact('orders', 'ticketBooks', 'showtimes', 'seats', 'employees'));
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
        $services = Service::orderBy('id', 'ASC')->get();
        $employees = Employee::orderBy('id', 'ASC')->get();
        return view('admin/order/insert')->with(compact('employees', 'services'));
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
                'so_luong_ve' => 'required|integer',
                'so_luong_dich_vu' => 'required|integer',
                'tong_tien' => 'required|integer',
                'nhan_vien_id' => 'required',
                'dich_vu_id' => 'required',
            ],
            [
                'so_luong_ve.required' => 'So luong ve khong duoc bo trong',
                'so_luong_ve.integer' => 'So luong ve phai la so nguyen',
                'so_luong_dich_vu.required' => 'So luong dich vu khong duoc bo rong',
                'so_luong_dich_vu.integer' => 'So luong dich vu phai la so nguyen',
                'tong_tien.required' => 'Tong tien khong duoc bo trong',
                'tong_tien.integer' => 'Tong tien phai la so nguyen',
                'nhan_vien_id.required' => 'Nhan vien khong duong bo trong',
                'dich_vu_id.required' => 'Dich vu khong duoc bo trong',
            ]
        );

        $order = new Order();
        $order->ngay_ban = date('d-m-Y H:i:s');
        $order->so_luong_ve = $data['so_luong_ve'];
        $order->so_luong_dich_vu = $data['so_luong_dich_vu'];
        $order->tong_tien = $data['tong_tien'];
        $order->nhan_vien_id = $data['nhan_vien_id'];
        $order->dich_vu_id = $data['dich_vu_id'];

        $order->save();
        return redirect()->action([OrderContoller::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $employees = Employee::orderBy('id', 'ASC')->get();
        $services = Service::orderBy('id', 'ASC')->get();
        return view('admin/order/update')->with(compact('order', 'employees', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'ngay_ban' => 'required',
                'so_luong_ve' => 'required|integer',
                'so_luong_dich_vu' => 'required|integer',
                'tong_tien' => 'required|integer',
                'nhan_vien_id' => 'required',
                'dich_vu_id' => 'required',
            ],
            [
                'ngay_ban.required' => 'Ngay ban khong duoc bo trong',
                'so_luong_ve.required' => 'So luong ve khong duoc bo trong',
                'so_luong_ve.integer' => 'So luong ve phai la so nguyen',
                'so_luong_dich_vu.required' => 'So luong dich vu khong duoc bo rong',
                'so_luong_dich_vu.integer' => 'So luong dich vu phai la so nguyen',
                'tong_tien.required' => 'Tong tien khong duoc bo trong',
                'tong_tien.integer' => 'Tong tien phai la so nguyen',
                'nhan_vien_id.required' => 'Nhan vien khong duong bo trong',
                'dich_vu_id.required' => 'Dich vu khong duoc bo trong',
            ]
        );

        $order = Order::find($id);
        $order->ngay_ban = $data['ngay_ban'];
        $order->so_luong_ve = $data['so_luong_ve'];
        $order->so_luong_dich_vu = $data['so_luong_dich_vu'];
        $order->tong_tien = $data['tong_tien'];
        $order->nhan_vien_id = $data['nhan_vien_id'];
        $order->dich_vu_id = $data['dich_vu_id'];

        $order->save();
        return redirect()->action([OrderContoller::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->action([OrderContoller::class, 'index']);
    }
}
