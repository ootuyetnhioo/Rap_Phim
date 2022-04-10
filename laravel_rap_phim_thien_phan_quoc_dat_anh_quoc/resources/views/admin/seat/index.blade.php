@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>Day</th>
            <th>Cot</th>
            <th>trang thai</th>
            <th>phong chieu</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($seats as $row)
        <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['vi_tri_day'] }}</td>
            <td>{{ $row['vi_tri_cot'] }}</td>
            <td>
                @if ($row['trang_thai'] == 0)
                    <span>Khong hoat dong</span>
                @else
                    <span>Hoat dong</span>
                @endif
            </td>
            <td>{{ $row['phong_chieu_id'] }}</td>
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
