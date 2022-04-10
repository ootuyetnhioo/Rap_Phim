@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>ho ten</th>
            <th>so cmnd</th>
            <th>so dien thoai</th>
            <th>email</th>
            <th>dia chi</th>
            <th>ngay dang ky</th>
            <th>ngay sinh</th>
            <th>gioi tinh</th>
            <th></th>
            <th></th>

        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{$customer['id']}}</td>
            <td>{{$customer['ho_ten']}}</td>
            <td>{{$customer['so_cmnd']}}</td>
            <td>{{$customer['so_dien_thoai']}}</td>
            <td>{{$customer['email']}}</td>
            <td>{{$customer['dia_chi']}}</td>
            <td>{{$customer['ngay_dang_ky']}}</td>
            <td>{{$customer['ngay_sinh']}}</td>
            @if ($customer['gioi_tinh'] == 1)
                <td>{{ 'nam' }}</td>
            @else
                <td>{{ 'nu' }}</td>
            @endif
            <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/customers/update/{{$customer['id']}}">update</a></td>
            <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/customers/delete/{{$customer['id']}}">delete</a></td>
        </tr>
        @endforeach
    </table>
    <a href="customers/create">Add New</a>
@endsection