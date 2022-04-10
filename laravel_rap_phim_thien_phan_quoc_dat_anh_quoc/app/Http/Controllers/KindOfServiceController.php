<?php

namespace App\Http\Controllers;

use App\Models\KindOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KindOfServiceController extends Controller
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
            $kindOfServices = kindOfService::all();
            return view('admin/kindOfService/index')->with('kindOfServices', $kindOfServices);
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
        return view('admin/kindOfService/insert');
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

            ],
            [
                'ten_dich_vu.required' => 'Ten dich vu khong duoc de trong',
            ]
        );
        $kindOfService = new KindOfService();
        $kindOfService->ten_dich_vu = $data['ten_dich_vu'];

        $kindOfService->save();
        return redirect('admin/kindOfService/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KindOfService  $kindOfService
     * @return \Illuminate\Http\Response
     */
    public function show(KindOfService $kindOfService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KindOfService  $kindOfService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kindOfService = KindOfService::find($id);
        return view('admin/kindOfService/updateDisplay')->with('kindOfService', $kindOfService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KindOfService  $kindOfService
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, KindOfService $kindOfService)
    {
        $data = $request->validate(
            [
                'ten_dich_vu' => 'required',

            ],
            [
                'ten_dich_vu.required' => 'Ten dich vu khong duoc de trong',
            ]
        );
        $ten_dich_vu = $data['ten_dich_vu'];
        KindOfService::where('id', '=', (int)$id)->update(['ten_dich_vu' => $ten_dich_vu]);

        return redirect('admin/kindOfService/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KindOfService  $kindOfService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, KindOfService $kindOfService)
    {
        KindOfService::where('Id', '=', (int)$id)->delete();

        return redirect('/admin/kindOfService/index');
    }
}
