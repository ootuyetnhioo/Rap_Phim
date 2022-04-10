@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>ten</th>
            <th>thoi luong</th>
            <th>gioi han tuoi</th>
            <th>ngay cong chieu</th>
            <th>ngon ngu</th>
            <th>dien vien</th>
            <th>quoc gia</th>
            <th>nha san xuat</th>
            <th>tom tat</th>
            <th>trang thai</th>
            <th>the loai phim</th>
            <th>hinh anh</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($films as $film)
                @if ($film->da_xoa == 0)
        <tr>
            <td>{{ $film['id'] }}</td>
            <td>{{ $film['ten'] }}</td>
            <td>{{ $film['thoi_luong'] }}</td>
            <td>{{ $film['gioi_han_tuoi'] }}</td>
            <td>{{ $film['ngay_cong_chieu'] }}</td>
            <td>{{ $film['ngon_ngu'] }}</td>
            <td>{{ $film['dien_vien'] }}</td>
            <td>{{ $film['quoc_gia'] }}</td>
            <td>{{ $film['nha_san_xuat'] }}</td>
            <td>{{ $film['tom_tat'] }}</td>
            @if ($film['trang_thai'] == 1)
                <td>{{ 'dang chieu' }}</td>
            @else
                <td>{{ 'sap chieu' }}</td>
            @endif
            @foreach ($kindOfMovies as $kindOfMovie)
                @if ($film['loai_phim_id'] == $kindOfMovie['id'])
                    <td>{{ $kindOfMovie['ten'] }}</td>
                @endif
            @endforeach
            <td><img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/' . $film['hinh_anh']) }}"
                    border="3" height="100" width="100"></td>
            <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/film/updateStatus/{{ $film['id'] }}">Change
                    status</a></td>
            <td><a class="btn btn-primary"
                    href="http://127.0.0.1:8000/admin/film/updateDisplay/{{ $film['id'] }}">Update</a></td>
            <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/film/destroy/{{ $film['id'] }}">Delete</a>
            </td>
        </tr>
        @endif
    @empty
        <tr>
            <td colspan="4">No data!</td>
        </tr>
        @endforelse
        </tr>
    </table>
    <a href="http://127.0.0.1:8000/admin/film/create">Add New</a>
@endsection
