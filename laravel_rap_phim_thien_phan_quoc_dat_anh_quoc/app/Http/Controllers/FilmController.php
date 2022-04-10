<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\kindOfMovie;
use App\Models\News;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'sale') {
            $films = Film::orderBy('id', 'DESC')->get();
            $kindOfMovies = kindOfMovie::all();
            return view('admin/film/index', ['films' => $films, 'kindOfMovies' => $kindOfMovies]);
        } else {
            Auth::logout();
            return redirect('/login');
        }
    }

    public function create()
    {
        $kindOfMovies = kindOfMovie::all();
        return view('admin/film/insert')->with('kindOfMovies', $kindOfMovies);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten' => 'required',
                'thoi_luong' => 'required|integer',
                'gioi_han_tuoi' => 'required|integer',
                'ngay_cong_chieu' => 'required',
                'ngon_ngu' => 'required',
                'dien_vien' => 'required',
                'quoc_gia' => 'required',
                'nha_san_xuat' => 'required',
                'tom_tat' => 'required',
                'trang_thai' => 'required',
                'da_xoa' => 'required',
                'loai_phim_id' => 'required',
                'gia_tien' => 'required',
                'trailer' => 'required',

            ],
            [
                'ten.required' => 'Ten khong duoc de trong',
                'thoi_luong.required' => 'Thoi luong khong duoc de trong',
                'thoi_luong.integer' => 'Thoi luong phai la so nguyen',
                'gioi_han_tuoi.required' => 'Gioi han tuoi khong duoc de trong',
                'gioi_han_tuoi.integer' => 'Gioi han tuoi phai la so nguyen',
                'ngay_cong_chieu.required' => 'Ngay cong chieu khong duoc de trong',
                'ngon_ngu.required' => 'Ngon ngu khong duoc de trong',
                'dien_vien.required' => 'Dien vien khong duoc de trong',
                'quoc_gia.required' => 'Quoc gia khong duoc de trong',
                'nha_san_xuat.required' => 'Nha san xuat khong duoc de trong',
                'tom_tat.required' => 'Tom tat khong duoc de trong',
                'trang_thai.required' => 'Trang thai khong duoc de trong',
                'da_xoa.required' => 'Da xoa khong duoc de trong',
                'loai_phim_id.required' => 'Loai phim id khong duoc de trong',
                'gia_tien.required' => 'Gia tien khong duoc de trong',
                'trailer.required' => 'trailer khong duoc de trong',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $destination_path = '/images/films';
            $image = $request->file('hinh_anh');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $path = $request->file('hinh_anh')->storeAs($destination_path, $image_name);
        }
        $film = new Film();
        $film->ten = $data['ten'];
        $film->thoi_luong = $data['thoi_luong'];
        $film->gioi_han_tuoi = $data['gioi_han_tuoi'];
        $film->ngay_cong_chieu = $data['ngay_cong_chieu'];
        $film->ngon_ngu = $data['ngon_ngu'];
        $film->dien_vien = $data['dien_vien'];
        $film->quoc_gia = $data['quoc_gia'];
        $film->nha_san_xuat = $data['nha_san_xuat'];
        $film->tom_tat = $data['tom_tat'];
        $film->trang_thai = $data['trang_thai'];
        $film->da_xoa = $data['da_xoa'];
        $film->hinh_anh = $image_name;
        $film->loai_phim_id = $data['loai_phim_id'];
        $film->gia_tien = $data['gia_tien'];
        $film->trailer = $data['trailer'];
        $film->save();

        return redirect('/admin/film/index');
    }

    public function updateStatus($id)
    {
        if (Film::where('id', $id)->value('trang_thai') == 0) {
            Film::where('id', $id)->update(['trang_thai' => 1]);
        } else {
            Film::where('id', $id)->update(['trang_thai' => 0]);
        }

        return redirect('/admin/film/index');
    }

    public function edit($id)
    {
        $film = Film::find($id);
        $kindOfMovies = kindOfMovie::all();
        return view('admin/film/updateDisplay', ['film' => $film, 'kindOfMovies' => $kindOfMovies]);
    }

    /* thieu update hinh anh */
    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'ten' => 'required',
                'thoi_luong' => 'required|integer',
                'gioi_han_tuoi' => 'required|integer',
                'ngay_cong_chieu' => 'required',
                'ngon_ngu' => 'required',
                'dien_vien' => 'required',
                'quoc_gia' => 'required',
                'nha_san_xuat' => 'required',
                'tom_tat' => 'required',
                'trang_thai' => 'required',
                'da_xoa' => 'required',
                'loai_phim_id' => 'required'

            ],
            [
                'ten.required' => 'Ten khong duoc de trong',
                'thoi_luong.required' => 'Thoi luong khong duoc de trong',
                'thoi_luong.integer' => 'Thoi luong phai la so nguyen',
                'gioi_han_tuoi.required' => 'Gioi han tuoi khong duoc de trong',
                'gioi_han_tuoi.integer' => 'Gioi han tuoi phai la so nguyen',
                'ngay_cong_chieu.required' => 'Ngay cong chieu khong duoc de trong',
                'ngon_ngu.required' => 'Ngon ngu khong duoc de trong',
                'dien_vien.required' => 'Dien vien khong duoc de trong',
                'quoc_gia.required' => 'Quoc gia khong duoc de trong',
                'nha_san_xuat.required' => 'Nha san xuat khong duoc de trong',
                'tom_tat.required' => 'Tom tat khong duoc de trong',
                'trang_thai.required' => 'Trang thai khong duoc de trong',
                'da_xoa.required' => 'Da xoa khong duoc de trong',
                'loai_phim_id.required' => 'Loai phim id khong duoc de trong'
            ]
        );
        $ten = $data['ten'];
        $thoi_luong = $data['thoi_luong'];
        $gioi_han_tuoi = $data['gioi_han_tuoi'];
        $ngay_cong_chieu = $data['ngay_cong_chieu'];
        $ngon_ngu = $data['ngon_ngu'];
        $dien_vien = $data['dien_vien'];
        $quoc_gia = $data['quoc_gia'];
        $nha_san_xuat = $data['nha_san_xuat'];
        $tom_tat = $data['tom_tat'];
        $trang_thai = $data['trang_thai'];
        $da_xoa = $data['da_xoa'];
        $loai_phim_id = $data['loai_phim_id'];
        $currentImageName = Film::find($id)->hinh_anh;
        if (File::exists(storage_path('app\images\films\\' . $currentImageName))) {
            File::delete(storage_path('app\images\films\\' . $currentImageName));
        }
        $files = $request->file('hinh_anh');
        $extension = $files->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $destination_path = '/images/films';
        $path = $request->file('hinh_anh')->storeAs($destination_path, $filename);
        $hinh_anh = $filename;
        Film::where('id', '=', $id)->update([
            'ten' => $ten, 'thoi_luong' => $thoi_luong,
            'gioi_han_tuoi' => $gioi_han_tuoi, 'ngay_cong_chieu' => $ngay_cong_chieu, 'ngon_ngu' => $ngon_ngu,
            'dien_vien' => $dien_vien, 'quoc_gia' => $quoc_gia, 'nha_san_xuat' => $nha_san_xuat, 'tom_tat' => $tom_tat, 'trang_thai' => $trang_thai, 'da_xoa' => $da_xoa, 'hinh_anh' => $hinh_anh, 'loai_phim_id' => $loai_phim_id
        ]);

        return redirect('/admin/film/index');
    }

    public function notDestroy($id)
    {
        Film::where('id', $id)->update(['da_xoa' => 0]);
        return redirect('/admin/film/index');
    }

    public function destroy($id)
    {
        Film::where('id', $id)->update(['da_xoa' => 1]);
        return redirect('/admin/film/index');
    }
}
