@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>ten dich vu</th>
            <th>gia dich vu</th>
            <th>trang thai</th>
            <th>loai dich vu</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($services as $row)
        <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['ten_dich_vu'] }}</td>
            <td>{{ $row['gia_dich_vu'] }}</td>
            <td>
                @if ($row['trang_thai'] == 1)
                    <span>Hoat dong</span>
                @else
                    <span>Khong hoat dong</span>
                @endif
            </td>
            <td>{{ $row->loaidichvu->ten_dich_vu }}</td>
            <td><a class="btn btn-primary" href="edit/{{ $row['id'] }}">Update</a></td>
            <td>
                <form action="destroy/{{ $row['id'] }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No data!</td>
        </tr>
        @endforelse
        </tr>
    </table>
    <a href="create">Add New</a>
@endsection
