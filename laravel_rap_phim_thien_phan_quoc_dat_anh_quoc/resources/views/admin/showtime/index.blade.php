@extends('admin.layout.master')
@section('content')
    
    <table class="table">
        <tr>
            <th>id</th>
            <th>gio bat dau</th>
            <th>gio ket thuc</th>
            <th>ngay chieu</th>
            <th>phim</th>
            <th>phong chieu</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($showtimes as $showtime)
                @if ($showtime->phim->da_xoa == 0)          
                <tr>
                    <td>{{ $showtime['id'] }}</td>
                    <td>{{ $showtime['gio_bat_dau'] }}</td>
                    <td>{{ $showtime['gio_ket_thuc'] }}</td>
                    <td>{{ $showtime['ngay_chieu'] }}</td>
                    <td>{{ $showtime->phim->ten }}</td>
                    <td>{{ $showtime['phong_chieu_id'] }}</td>                  
                    <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/showtime/updateDisplay/{{ $showtime['id'] }}">Update</a></td>
                    <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/showtime/destroy/{{ $showtime['id'] }}">Delete</a></td>
                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4">No data!</td>
                </tr>

            @endforelse
        </tr>
    </table>
    <a href="http://127.0.0.1:8000/admin/showtime/create">Add New</a>
@endsection