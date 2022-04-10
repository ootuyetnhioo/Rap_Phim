<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'ASC')->get();
        return view('admin/news/index')->with(compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $film = Film::orderBy('id', 'ASC')->get();
        return view('admin/news/insert')->with(compact('film'));
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
                'ten_khuyen_mai' => 'required|',
                'hinh_anh' => 'required|image|mimes:jng,png,jpeg,gif,svg,jpg|max:2048|dimensions:min_with=100,min_height=100',
                'noi_dung' => 'required|',
                'dieu_kien_dieu_khoan' => 'required|',
                'ngay_bat_dau' => 'required|',
                'ngay_ket_thuc' => 'required|',
                'giam_gia' => 'required|',
                'trang_thai' => 'required',
                'phim_id' => 'required',
            ],
            [
                'ten_khuyen_mai.required' => 'Tên khuyến mãi không được bỏ trống',
                'hinh_anh.required' => 'Hình ảnh không được bỏ trống',
                'noi_dung.required' => 'Nội dung khuyến mãi không được bỏ trống',
                'dieu_kien_dieu_khoan.required' => 'Điều kiện điều khoản không được bỏ trống',
                'ngay_bat_dau.required' => 'Ngày bắt đầu khuyến mãi không được bỏ trống',
                'ngay_ket_thuc.required' => 'Ngày kết thúc không được bỏ trống',
                'giam_gia.required' => 'Giảm giá không được bở trống',
                'trang_thai.required' => 'Trạng Thái không được bỏ trống',
                'phim_id.required' => 'Phim không được bỏ trống',
            ]
        );

        $new = new News();
        $new->ten_khuyen_mai = $data['ten_khuyen_mai'];

        $get_image = $data['hinh_anh'];
        $path = 'images/news/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $new->hinh_anh = $new_image;
        $new->noi_dung = $data['noi_dung'];
        $new->dieu_kien_dieu_khoan = $data['dieu_kien_dieu_khoan'];
        $new->ngay_bat_dau = $data['ngay_bat_dau'];
        $new->ngay_ket_thuc = $data['ngay_ket_thuc'];
        $new->giam_gia = $data['giam_gia'];
        $new->trang_thai = $data['trang_thai'];
        $new->phim_id  = $data['phim_id'];

        $new->save();
        return redirect()->action([NewsController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::orderBy('id', 'ASC')->get();
        $news = News::find($id);
        return view('admin/news/update')->with(compact('news', 'film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'ten_khuyen_mai' => 'required|',
                'hinh_anh' => 'required|image|mimes:jng,png,jpeg,gif,svg|max:2048|dimensions:min_with=100,min_height=100',
                'noi_dung' => 'required|',
                'dieu_kien_dieu_khoan' => 'required|',
                'ngay_bat_dau' => 'required|',
                'ngay_ket_thuc' => 'required|',
                'giam_gia' => 'required|',
                'trang_thai' => 'required',
                'phim_id' => 'required',
            ],
            [
                'ten_khuyen_mai.required' => 'Tên khuyến mãi không được bỏ trống',
                'hinh_anh.required' => 'Hình ảnh không được bỏ trống',
                'noi_dung.required' => 'Nội dung khuyến mãi không được bỏ trống',
                'dieu_kien_dieu_khoan.required' => 'Điều kiện điều khoản không được bỏ trống',
                'ngay_bat_dau.required' => 'Ngày bắt đầu khuyến mãi không được bỏ trống',
                'ngay_ket_thuc.required' => 'Ngày kết thúc không được bỏ trống',
                'giam_gia.required' => 'Giảm giá không được bở trống',
                'trang_thai.required' => 'Trạng Thái không được bỏ trống',
                'phim_id.required' => 'Phim không được bỏ trống',
            ]
        );

        $new = News::find($id);
        $new->ten_khuyen_mai = $data['ten_khuyen_mai'];

        $get_image = $data['hinh_anh'];
        if ($get_image) {
            $path = 'images/news/' . $new->hinh_anh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'images/news/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $new->hinh_anh = $new_image;
        }

        $new->noi_dung = $data['noi_dung'];
        $new->dieu_kien_dieu_khoan = $data['dieu_kien_dieu_khoan'];
        $new->ngay_bat_dau = $data['ngay_bat_dau'];
        $new->ngay_ket_thuc = $data['ngay_ket_thuc'];
        $new->giam_gia = $data['giam_gia'];
        $new->trang_thai = $data['trang_thai'];
        $new->phim_id  = $data['phim_id'];

        $new->update();
        return redirect()->action([NewsController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $path = 'images/news/' . $news->hinh_anh;
        if (file_exists($path)) {
            unlink($path);
        }

        News::find($id)->delete();
        return redirect()->action([NewsController::class, 'index']);
    }
}
