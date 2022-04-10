@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>user id</th>
            <th>ho ten</th>
            <th>so cmnd</th>
            <th>so dien thoai</th>
            <th>email</th>
            <th>dia chi</th>
            <th>ngay vao lam</th>
            <th>gioi tinh</th>
            <th>dang lam</th>
            <th>hinh anh</th>
            <th></th>
            <th></th>

        </tr>
        @foreach($employees as $employees)
        <tr>
            <td>{{$employees['id']}}</td>
            <td>{{$employees['user_id']}}</td>
            <td>{{$employees['ho_ten']}}</td>
            <td>{{$employees['so_cmnd']}}</td>
            <td>{{$employees['so_dien_thoai']}}</td>
            <td>{{$employees['email']}}</td>
            <td>{{$employees['dia_chi']}}</td>
            <td>{{$employees['ngay_vao_lam']}}</td>
            @if ($employees['gioi_tinh'] == 1)
                <td>{{ 'nam' }}</td>
            @else
                <td>{{ 'nu' }}</td>
            @endif
            @if ($employees['dang_lam'] == 1)
                <td>{{ 'co' }}</td>
            @else
                <td>{{ 'khong' }}</td>
            @endif
            
            <td><img src="{{asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/employees/'.$employees['hinh_anh'])}}" alt="ko c" width="50px" height="50px"></td>
            <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/employees/updateDisplay/{{$employees['id']}}">update</a></td>
            <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/employees/delete/{{$employees['id']}}">delete</a></td>
        </tr>
        @endforeach
    </table>
    <a href="employees/create">Addnew</a>
@endsection
