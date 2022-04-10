<?php

namespace App\Http\Controllers;

use App\Models\kindOfMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KindOfMovieController extends Controller
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
            $kindOfMovies = kindOfMovie::all();
            return view('admin/kindOfMovie/index')->with('kindOfMovies', $kindOfMovies);
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
        return view('admin/kindOfMovie/insert');
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
                'ten' => 'required',
            ],
            [
                'ten.required' => 'Ten khong duoc bo trong',
            ]
        );

        $kindOfMovie = new kindOfMovie();
        $kindOfMovie->ten = $data['ten'];
        $kindOfMovie->save();
        return redirect('/admin/kindOfMovie/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kindOfMovie  $kindOfMovie
     * @return \Illuminate\Http\Response
     */
    public function show(kindOfMovie $kindOfMovie)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kindOfMovie  $kindOfMovie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kindOfMovie = kindOfMovie::find($id);
        return view('admin/kindOfMovie/updateDisplay')->with('kindOfMovie', $kindOfMovie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kindOfMovie  $kindOfMovie
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'ten' => 'required',
            ],
            [
                'ten.required' => 'Ten khong duoc bo trong',
            ]
        );

        $ten = $data['ten'];
        kindOfMovie::where('id', '=', (int)$id)->update([
            'ten' => $ten
        ]);

        return redirect('/admin/kindOfMovie/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kindOfMovie  $kindOfMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kindOfMovie::where('id', '=', (int)$id)->delete();

        return redirect('admin/kindOfMovie/index');
    }
}
