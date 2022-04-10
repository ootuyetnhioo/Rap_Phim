<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class employeescontroller extends Controller
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
        if (Auth::user()->rolename == 'admin') {
            $employees = employees::all();
            return view('admin/employees/employeesView')->with('employees', $employees);
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
        return view('admin/employees/createView');
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
                'mat_khau' => 'required|min:8',
                'so_cmnd' => 'required|integer',
                'so_dien_thoai' => 'required|integer',
                'email' => 'required',
                'dia_chi' => 'required',
                'ngay_vao_lam' => 'required',
                'gioi_tinh' => 'required',
                'dang_lam' => 'required',
                'da_xoa' => 'required'
            ],
            [
                'ho_ten.required' => 'Ho ten khong duoc de trong',
                'mat_khau.required' => 'mat khau khong duoc de trong',
                'mat_khau.min' => 'mat khau phai co it nhat 8 ky tu',
                'so_cmnd.required' => 'So cmnd khong duoc de trong',
                'so_cmnd.integer' => 'So cmnd phai la so nguyen',
                'so_dien_thoai.required' => 'So dien thoai khong duoc de trong',
                'so_dien_thoai.integer' => 'So dien thoai phai la so nguyen',
                'email.required' => 'Email khong duoc de trong',
                'dia_chi.required' => 'Dia chi khong duoc de trong',
                'ngay_vao_lam.required' => 'Ngay vao lam khong duoc de trong',
                'gioi_tinh.required' => 'Gioi tinh khong duoc de trong',
                'da_xoa.required' => 'Da xoa khong duoc de trong'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $destination_path = '/images/employees';
            $image = $request->file('hinh_anh');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $path = $request->file('hinh_anh')->storeAs($destination_path, $image_name);
        }

        $users = new User();
        $users->name = $data['ho_ten'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['mat_khau']);
        $users->rolename = 'sale';
        $users->created_at = date('Y-m-d H:i:s');
        $users->updated_at = date('Y-m-d H:i:s');
        $users->save();

        $employees = new employees;
        $employees->user_id = User::where('email', '=', $data['email'])->value('id');
        $employees->ho_ten = $data['ho_ten'];
        $employees->so_cmnd = $data['so_cmnd'];
        $employees->so_dien_thoai = $data['so_dien_thoai'];
        $employees->email = $data['email'];
        $employees->dia_chi = $data['dia_chi'];
        $employees->ngay_vao_lam = $data['ngay_vao_lam'];
        $employees->gioi_tinh = $data['gioi_tinh'];
        $employees->dang_lam = $data['dang_lam'];
        $employees->da_xoa = $data['da_xoa'];
        $employees->hinh_anh = $image_name;
        $employees->save();


        return redirect()->route('indexemployees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        $employees = employees::find($Id);
        $userId = $employees->user_id;
        $user = User::find($userId);
        return view('admin/employees/updateView', ['employees' => $employees, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update($Id, Request $request)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'mat_khau' => 'required|min:8',
                'so_cmnd' => 'required|integer',
                'so_dien_thoai' => 'required|integer',
                'email' => 'required',
                'dia_chi' => 'required',
                'ngay_vao_lam' => 'required',
                'gioi_tinh' => 'required',
                'dang_lam' => 'required',
                'da_xoa' => 'required'
            ],
            [
                'ho_ten.required' => 'Ho ten khong duoc de trong',
                'mat_khau.required' => 'mat khau khong duoc de trong',
                'mat_khau.min' => 'mat khau phai co it nhat 8 ky tu',
                'so_cmnd.required' => 'So cmnd khong duoc de trong',
                'so_cmnd.integer' => 'So cmnd phai la so nguyen',
                'so_dien_thoai.required' => 'So dien thoai khong duoc de trong',
                'so_dien_thoai.integer' => 'So dien thoai phai la so nguyen',
                'email.required' => 'Email khong duoc de trong',
                'dia_chi.required' => 'Dia chi khong duoc de trong',
                'ngay_vao_lam.required' => 'Ngay vao lam khong duoc de trong',
                'gioi_tinh.required' => 'Gioi tinh khong duoc de trong',
                'da_xoa.required' => 'Da xoa khong duoc de trong'
            ]
        );
        $userIdEmployee = employees::where('id', '=', (int)$Id)->first()->value('user_id');
        $userPassword = User::where('id', '=', $userIdEmployee)->first()->value('password');
        $ho_ten = $data['ho_ten'];
        $email = $data['email'];
        if ($data['mat_khau'] == $userPassword) {
            $mat_khau = $userPassword;
        } else {
            $mat_khau = Hash::make($data['mat_khau']);
        }

        $so_cmnd = $data['so_cmnd'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $dia_chi = $data['dia_chi'];
        $ngay_vao_lam = $data['ngay_vao_lam'];
        $gioi_tinh = $data['gioi_tinh'];
        $dang_lam = $data['dang_lam'];
        $da_xoa = $data['da_xoa'];
        $db = employees::where('id', '=', $Id)->first(); // lệnh này giống lệnh fetch() trong php thuần dùng để lấy 1 hàng ra
        $file = $db->hinh_anh; // chỏ tới cột Images của hàng trên
        $file1 = $file; //
        if (File::exists(storage_path('app\images\employees\\' . $file1))) {
            File::delete(storage_path('app\images\employees\\' . $file1));
        }
        $files = $request->file('hinh_anh');
        $extension = $files->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $destination_path = '/images/employees';
        $path = $request->file('hinh_anh')->storeAs($destination_path, $filename);
        $db->hinh_anh = $filename;


        employees::where('id', '=', $Id)->update(['ho_ten' => $ho_ten, 'so_cmnd' => $so_cmnd, 'so_dien_thoai' => $so_dien_thoai, 'email' => $email, 'dia_chi'
        => $dia_chi, 'ngay_vao_lam' => $ngay_vao_lam, 'gioi_tinh' => $gioi_tinh, 'dang_lam' => $dang_lam, 'hinh_anh' => $filename, 'da_xoa' => $da_xoa]);
        $employeeUser = employees::where('id', '=', (int)$Id)->first();
        User::where('id', '=', $employeeUser['user_id'])->update(['name' => $ho_ten, 'email' => $email, 'password' => $mat_khau, 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->route('indexemployees');
    }
    public function destroy($Id)
    {
        $db = employees::where('Id', '=', (int)$Id)->first();
        $currentImageName = employees::where('id', $Id)->first()->hinh_anh;
        if (File::exists(storage_path('app\images\employees\\' . $currentImageName))) {
            File::delete(storage_path('app\images\employees\\' . $currentImageName));
        }
        employees::where('Id', '=', (int)$Id)->delete();
        User::where('Id', '=', (int)$db->user_id)->delete();
        return redirect()->route('indexemployees');
    }
}
