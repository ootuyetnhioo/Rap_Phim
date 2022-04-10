@extends('admin.layout.master')
@section('content')
    <form action="store" method="POST">
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
            <label for="exampleInputEmail1" class="form-label">Tên Dịch Vụ:</label>
            <input type="text" class="form-control" name="ten_dich_vu" placeholder="Tên dịch vụ...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá Dịch Vụ:</label>
            <input type="text" class="form-control" name="gia_dich_vu" placeholder="Giá dịch vụ...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
            <option value="0">Không Hoạt Động</option>
            <option value="1" selected>Hoạt Động</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Loại Dịch Vụ:</label>
            <select class="form-select" name="loai_dich_vu_id">
            <option value="">Chọn Loại Dịch Vụ</option>
            @foreach($kindOfServices as $row)
            <option value="{{$row['id']}}">{{$row['ten_dich_vu']}}</option>
            @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection