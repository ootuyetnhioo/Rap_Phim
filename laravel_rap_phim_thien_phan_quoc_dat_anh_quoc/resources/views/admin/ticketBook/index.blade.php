@extends('admin.layout.master')
@section('content')
    
    <table class="table">
        <tr>
            <th>id</th>
            <th>ngay ban</th>
            <th>gia ve</th>
            <th>tong tien</th>
            <th>suat chieu</th>
            <th>ghe</th>
            <th>Khach Hang</th>
            <th>nhan vien</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($ticketBooks as $row)
                <tr>
                    <td>{{ $row['id'] }}</td>
                    <td>{{ $row['ngay_ban'] }}</td>
                    <td>{{ $row['gia_ve'] }}</td>
                    <td>{{ $row['tong_tien'] }}</td>
                    <td>{{ $row['suat_chieu_id'] }}</td>
                    <td>{{ $row->ghe->vi_tri_day}}.{{$row->ghe->vi_tri_cot}}</td>
                    <td>{{ $row->veban->khachhang->ho_ten}}</td>
                    <td>{{ $row->nhanvien->ho_ten}}</td>
                    <td><a href="edit/{{$row['id']}}">Edit</a></td>
                    <td>
                        <form action="destroy/{{$row['id']}}" method="post">
                            @method('delete')
                            @csrf
                            <button>Xóa</button>
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