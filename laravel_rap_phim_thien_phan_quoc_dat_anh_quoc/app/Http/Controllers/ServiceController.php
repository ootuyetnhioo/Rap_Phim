<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\hoa_don;
use App\Models\KindOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
            $services = Service::orderBy('id', 'ASC')->get();
            return view('admin/service/index')->with(compact('services'));
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
        $kindOfServices = KindOfService::orderBy('id', 'ASC')->get();
        return view('admin/service/insert')->with('kindOfServices', $kindOfServices);
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
                'ten_dich_vu' => 'required',
                'gia_dich_vu' => 'required|integer',
                'trang_thai' => 'required',
                'loai_dich_vu_id' => 'required',
            ],
            [
                'ten_dich_vu.required' => 'Ten dich vu khong duoc bo trong',
                'gia_dich_vu.required' => 'Gia dich vu khong duoc bo trong',
                'gia_dich_vu.integer' => 'Gia dich vu phai la so nguyen',
                'trang_thai.required' => 'Trang thai khong duoc bo trong',
                'loai_dich_vu_id.required' => 'Loai dich vu khong duoc bo trong',
            ]
        );

        $service = new Service();
        $service->ten_dich_vu = $data['ten_dich_vu'];
        $service->gia_dich_vu = $data['gia_dich_vu'];
        $service->trang_thai = $data['trang_thai'];
        $service->loai_dich_vu_id = $data['loai_dich_vu_id'];

        $service->save();
        return redirect()->action([ServiceController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kindOfServices = KindOfService::orderBy('id', 'ASC')->get();
        $service = Service::find($id);
        return view('admin/service/update')->with(compact('service', 'kindOfServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'ten_dich_vu' => 'required',
                'gia_dich_vu' => 'required|integer',
                'trang_thai' => 'required',
                'loai_dich_vu_id' => 'required',
            ],
            [
                'ten_dich_vu.required' => 'Ten dich vu khong duoc bo trong',
                'gia_dich_vu.required' => 'Gia dich vu khong duoc bo trong',
                'gia_dich_vu.integer' => 'Gia dich vu phai la so nguyen',
                'trang_thai.required' => 'Trang thai khong duoc bo trong',
                'loai_dich_vu_id.required' => 'Loai dich vu khong duoc bo trong',
            ]
        );

        $service = Service::find($id);
        $service->ten_dich_vu = $data['ten_dich_vu'];
        $service->gia_dich_vu = $data['gia_dich_vu'];
        $service->trang_thai = $data['trang_thai'];
        $service->loai_dich_vu_id = $data['loai_dich_vu_id'];

        $service->save();
        return redirect()->action([ServiceController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect()->action([ServiceController::class, 'index']);
    }
}
