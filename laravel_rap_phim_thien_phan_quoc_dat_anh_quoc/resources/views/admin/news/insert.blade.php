@extends('admin.layout.master')
@section('content')
    <form action="store" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Khuyến Mãi:</label>
            <input type="text" class="form-control" name="ten_khuyen_mai" placeholder="Tên khuyến mãi...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình Ảnh:</label>
            <input type="file" class="form-control" name="hinh_anh">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nội Dung:</label>
            <textarea name="noi_dung" id="noi_dung" class="form-control" id="" cols="30" rows="4"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Điều Kiện Điều Khoản:</label>
            <textarea name="dieu_kien_dieu_khoan" id="dieu_kien_dieu_khoan" class="form-control" id="" cols="30" rows="4"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Bắt Đầu:</label>
            <input type="date" class="form-control" name="ngay_bat_dau">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Kết Thúc:</label>
            <input type="date" class="form-control" name="ngay_ket_thuc">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giảm Giá:</label>
            <input type="number" class="form-control" name="giam_gia" placeholder="Giảm giá...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phim:</label>
            <select class="form-select" name="phim_id">
                <option value="">Chọn phim</option>
                @foreach($film as $row)
                <option value="{{$row['id']}}">{{$row['ten']}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
                <option value="0">Khuyến mãi đã hết hạn</option>
                <option value="1" selected>Khuyến mãi còn</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm Khuyến Mãi</button>
    </form>
@endsection