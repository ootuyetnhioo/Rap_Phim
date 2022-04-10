@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/film/update/{{ $film['id'] }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="ten" placeholder="Tên phim..." value="{{ $film['ten'] }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thời Lượng Phim</label>
            <input type="text" class="form-control" name="thoi_luong" placeholder="Thời lượng phim..." value="{{ $film['thoi_luong'] }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Độ Tuổi Được Xem</label>
            <input type="text" class="form-control" name="gioi_han_tuoi" placeholder="Độ tuổi được xem..." value="{{ $film['gioi_han_tuoi'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Công Chiếu</label>
            <input type="date" class="form-control" name="ngay_cong_chieu" placeholder="Ngày công chiếu..." value="{{ $film['ngay_cong_chieu'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngôn Ngữ</label>
            <input type="text" class="form-control" name="ngon_ngu" placeholder="Ngôn ngữ của phim..." value="{{ $film['ngon_ngu'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Diễn Viên</label>
            <input type="text" class="form-control" name="dien_vien" placeholder="Diễn viên đóng phim..." value="{{ $film['dien_vien'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Quốc Gia</label>
            <input type="text" class="form-control" name="quoc_gia" placeholder="Quốc gia..." value="{{ $film['quoc_gia'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nhà Sản Xuất</label>
            <input type="text" class="form-control" name="nha_san_xuat" placeholder="Nhà sãn xuất..." value="{{ $film['nha_san_xuat'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tóm Tắt</label>
            <input type="text" class="form-control" name="tom_tat" placeholder="Nhà sãn xuất..." value="{{ $film['tom_tat'] }}">
        </div>
        

        <div class="mb-3">
            <label class="form-label">Trạng Thái</label>
            <select class="form-select" name="trang_thai">
                @if($film->trang_thai == 0)
                <option value="1">Đang Chiếu</option>
                <option value="0" selected>Sắp Chiếu</option>
                @else
                <option value="1" selected>Đang Chiếu</option>
                <option value="0">Sắp Chiếu</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Đã Xóa</label>
            <select class="form-select" name="da_xoa">
                @if($film->da_xoa == 0)
                <option value="1">Đã Xóa</option>
                <option value="0" selected>Chưa Xóa</option>
                @else
                <option value="1" selected>Đã Xóa</option>
                <option value="0">Chưa Xóa</option>
                @endif
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Thể Loại Phim</label>
            <select class="form-select" name="loai_phim_id">
            @forelse ($kindOfMovies as $kindOfMovie)
                <option {{$kindOfMovie->id == $film->loai_phim_id ? 'selected' :''}} value="{{ $kindOfMovie['id'] }}">{{ $kindOfMovie['ten'] }}</option>
            @empty
            <option value="no data">no data</option>
            @endforelse
            </select>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình Ảnh Phim</label>
            <input type="file" class="form-control" name="hinh_anh">
            <label for="hinh_anh"><img src="{{ asset('http://127.0.0.1/laravel_rap_phim/storage/app/images/films/'.$film['hinh_anh']) }}" border="3" height="100" width="100"></label>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection