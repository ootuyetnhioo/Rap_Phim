@extends('admin.layout.master')
@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>Tên Khuyến Mãi</th>
            <th>Hình Ảnh</th>
            <th>Nội Dung</th>
            <th>Điều Kiện Điều Khoản</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Giảm Giá</th>
            <th>Phim</th>
            <th>Trạng Thái</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($news as $row)
        <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['ten_khuyen_mai'] }}</td>
            <td><img src="{{ asset('/images/news/' . $row['hinh_anh']) }}" alt="Không có hình ảnh" height="250px"
                    width="250px"></td>
            <td>{{ $row['noi_dung'] }}</td>
            <td>{{ $row['dieu_kien_dieu_khoan'] }}</td>
            <td>{{ $row['ngay_bat_dau'] }}</td>
            <td>{{ $row['ngay_ket_thuc'] }}</td>
            <td>{{ $row['giam_gia'] }}%</td>
            <td>{{ $row->phim->ten }}</td>
            <td>
                @if ($row->trang_thai == 0)
                    <span>Khuyến mãi đã hết</span>
                @else
                    <span>Khuyến mãi còn</span>
                @endif
            </td>
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
