<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerRegisterController extends Controller
{
    public function register()
    {
        Auth::logout();
        return view('customer/register');
    }

    public function registerProgress(Request $request)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'so_cmnd' => 'required|integer',
                'so_dien_thoai' => 'required|integer',
                'email' => 'required',
                'mat_khau' => 'required|min:8',
                'dia_chi' => 'required',
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
                'mat_khau.required' => 'mat khau khong duoc de trong',
                'mat_khau.min' => 'mat khau phai co it nhat 8 ky tu',
                'dia_chi.required' => 'Dia chi khong duoc de trong',
                'ngay_sinh.required' => 'ngay sinh khong duoc de trong',
                'gioi_tinh.required' => 'gioi tinh khong duoc de trong'
            ]
        );
        $users = new User();
        $users->name = $data['ho_ten'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['mat_khau']);
        $users->rolename = 'customer';
        $users->created_at = date('Y-m-d H:i:s');
        $users->updated_at = date('Y-m-d H:i:s');
        $users->save();

        $customers = new customerModel;
        $customers->ho_ten = $data['ho_ten'];
        $customers->so_cmnd = $data['so_cmnd'];
        $customers->so_dien_thoai = $data['so_dien_thoai'];
        $customers->email = $data['email'];
        $customers->dia_chi = $data['dia_chi'];
        $customers->ngay_dang_ky = date('Y-m-d');
        $customers->ngay_sinh = $data['ngay_sinh'];
        $customers->gioi_tinh = $data['gioi_tinh'];
        $customers->user_id = User::where('email', '=', $data['email'])->value('id');
        $customers->save();

        return redirect('/');
    }
}
