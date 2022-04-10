<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
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
            $customers = CustomerModel::all();
            return view('admin/customers/customersView')->with('customers', $customers);
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
        return view('admin/customers/createcusView');
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
                'ho_ten' => 'required',
                'so_cmnd' => 'required|integer',
                'so_dien_thoai' => 'required|integer',
                'email' => 'required',
                'dia_chi' => 'required',
                'ngay_dang_ky' => 'required',
                'ngay_sinh' => 'required',
                'gioi_tinh' => 'required'

            ],
            [
                'ho_ten.required' => 'ho ten khong duoc de trong',
                'so_cmnd.required' => 'So cmnd khong duoc de trong',
                'so_cmnd.integer' => 'so cmnd phai la so nguyen',
                'so_dien_thoai.required' => 'So dien thoai khong duoc de trong',
                'so_dien_thoai.integer' => 'So dien thoai phai la so nguyen',
                'email.required' => 'Email khong duoc de trong',
                'dia_chi.required' => 'Dia chi khong duoc de trong',
                'ngay_sinh.required' => 'ngay sinh khong duoc de trong',
                'gioi_tinh.required' => 'gioi tinh khong duoc de trong'
            ]
        );
        $customers = new customerModel;
        $customers->ho_ten = $data['ho_ten'];
        $customers->so_cmnd = $data['so_cmnd'];
        $customers->so_dien_thoai = $data['so_dien_thoai'];
        $customers->email = $data['email'];
        $customers->dia_chi = $data['dia_chi'];
        $customers->ngay_dang_ky = date('Y-m-d');
        $customers->ngay_sinh = $data['ngay_sinh'];
        $customers->gioi_tinh = $data['gioi_tinh'];
        $customers->save();
        return redirect()->route('indexcustomers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerModel  $customerModel
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerModel $customerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerModel  $customerModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = customerModel::where('Id', '=', $id)->first();
        return view('admin/customers/updateView')->with('customers', $customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerModel  $customerModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'so_cmnd' => 'required|integer',
                'so_dien_thoai' => 'required|integer',
                'email' => 'required',
                'dia_chi' => 'required',
                'ngay_dang_ky' => 'required',
                'ngay_sinh' => 'required',
                'gioi_tinh' => 'required'

            ],
            [
                'ho_ten.required' => 'ho ten khong duoc de trong',
                'so_cmnd.required' => 'So cmnd khong duoc de trong',
                'so_cmnd.integer' => 'so cmnd phai la so nguyen',
                'so_dien_thoai.required' => 'So dien thoai khong duoc de trong',
                'so_dien_thoai.integer' => 'So dien thoai phai la so nguyen',
                'email.required' => 'Email khong duoc de trong',
                'dia_chi.required' => 'Dia chi khong duoc de trong',
                'ngay_sinh.required' => 'ngay sinh khong duoc de trong',
                'gioi_tinh.required' => 'gioi tinh khong duoc de trong'
            ]
        );
        $ho_ten = $data['ho_ten'];
        $so_cmnd = $data['so_cmnd'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $email = $data['email'];
        $dia_chi = $data['dia_chi'];
        $ngay_dang_ky  = $data['ngay_dang_ky'];
        $ngay_sinh = $data['ngay_sinh'];
        $gioi_tinh = $data['gioi_tinh'];

        customerModel::where('id', '=', $id)->update(['ho_ten' => $ho_ten, 'so_cmnd' => $so_cmnd, 'so_dien_thoai' => $so_dien_thoai, 'email' => $email, 'dia_chi' => $dia_chi, 'ngay_dang_ky' => $ngay_dang_ky, 'ngay_sinh' => $ngay_sinh, 'gioi_tinh' => $gioi_tinh,]);
        return redirect()->route('indexcustomers');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerModel  $customerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customerModel::where('Id', '=', $id)->delete();
        return redirect()->route('indexcustomers');
    }
}
