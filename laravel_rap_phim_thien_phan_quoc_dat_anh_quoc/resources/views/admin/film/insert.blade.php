@extends('admin.layout.master')
@section('content')
    <form action="{{ route('adminFilmCreate') }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">Tên Phim</label>
            <input type="text" class="form-control" name="ten" placeholder="Tên phim...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thời Lượng Phim</label>
            <input type="text" class="form-control" name="thoi_luong" placeholder="Thời lượng phim...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Độ Tuổi Được Xem</label>
            <input type="text" class="form-control" name="gioi_han_tuoi" placeholder="Độ tuổi được xem...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Công Chiếu</label>
            <input type="date" class="form-control" name="ngay_cong_chieu" placeholder="Ngày công chiếu...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngôn Ngữ</label>
            <input type="text" class="form-control" name="ngon_ngu" placeholder="Ngôn ngữ của phim...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Diễn Viên</label>
            <input type="text" class="form-control" name="dien_vien" placeholder="Diễn viên đóng phim...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Quốc Gia</label>
            <input type="text" class="form-control" name="quoc_gia" placeholder="Quốc gia...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nhà Sản Xuất</label>
            <input type="text" class="form-control" name="nha_san_xuat" placeholder="Nhà sãn xuất...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tóm Tắt</label>
            <input type="text" class="form-control" name="tom_tat" placeholder="Nhà sãn xuất...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái</label>
            <select class="form-select" name="trang_thai">
                <option value="1">Đang Chiếu</option>
                <option value="0" selected>Sắp Chiếu</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Đã Xóa</label>
            <select class="form-select" name="da_xoa">
                <option value="1">Đã Xóa</option>
                <option value="0" selected>Chưa Xóa</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Thể Loại Phim</label>
            <select class="form-select" name="loai_phim_id">
            @forelse ($kindOfMovies as $kindOfMovie)
                <option value="{{ $kindOfMovie['id'] }}">{{ $kindOfMovie['ten'] }}</option>
            @empty
            <option value="no data">no data</option>
            @endforelse
            </select>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình Ảnh Phim</label>
            <input type="file" class="form-control" name="hinh_anh">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection