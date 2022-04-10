@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/news/update/{{ $news['id'] }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $errors)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="{{ $news->id }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Khuyến Mãi:</label>
            <input type="text" class="form-control" name="ten_khuyen_mai" placeholder="Tên khuyến mãi..."
                value="{{ $news->ten_khuyen_mai }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình Ảnh:</label>
            <input type="file" class="form-control" name="hinh_anh">
            <img src="{{ asset('/images/news/' . $news->hinh_anh) }}" alt="{{ $news->ten_khuyen_mai }}" height="250px"
                width="250px">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nội Dung:</label>
            <textarea name="noi_dung" class="form-control" id="" cols="30" rows="4">{{ $news->noi_dung }}</textarea>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Điều Kiện Điều Khoản:</label>
            <textarea name="dieu_kien_dieu_khoan" class="form-control" id="" cols="30"
                rows="4">{{ $news->dieu_kien_dieu_khoan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Bắt Đầu:</label>
            <input type="date" class="form-control" name="ngay_bat_dau" value="{{ $news->ngay_ket_thuc }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Kết Thúc:</label>
            <input type="date" class="form-control" name="ngay_ket_thuc" value="{{ $news->ngay_ket_thuc }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giảm Giá:</label>
            <input type="number" class="form-control" name="giam_gia" placeholder="Giảm giá..."
                value="{{ $news->giam_gia }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phim:</label>
            <select class="form-select" name="phim_id">
                <option value="">Chọn phim</option>
                @foreach ($film as $row)
                    <option {{ $row->id == $news->phim_id ? 'selected' : '' }} value="{{ $row['id'] }}">
                        {{ $row['ten'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
                @if ($row->trang_thai == 1)
                    <option value="0">Khuyến mãi đã hết hạn</option>
                    <option value="1" selected>Khuyến mãi còn</option>
                @else
                    <option value="0" selected>Khuyến mãi đã hết hạn</option>
                    <option value="1">Khuyến mãi còn</option>
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
