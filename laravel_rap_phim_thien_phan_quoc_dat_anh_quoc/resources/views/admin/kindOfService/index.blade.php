@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>ten dich vu</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($kindOfServices as $kindOfService)
                <tr>
                    <td>{{ $kindOfService['id'] }}</td>
                    <td>{{ $kindOfService['ten_dich_vu'] }}</td>
                    <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/kindOfService/updateDisplay/{{ $kindOfService['id'] }}">Update</a></td>
                    <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/kindOfService/destroy/{{ $kindOfService['id'] }}">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No data!</td>
                </tr>
            @endforelse
        </tr>
    </table>
    <a href="http://127.0.0.1:8000/admin/kindOfService/create">Add New</a>
@endsection