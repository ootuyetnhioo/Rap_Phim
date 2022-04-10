@extends('admin.layout.master')
@section('content')
    <form action="" method="post">
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
            <label for="exampleInputEmail1" class="form-label">Họ Tên</label>
            <input type="text" class="form-control" name="ho_ten" placeholder="Họ Tên...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số CMND</label>
            <input type="number" class="form-control" name="so_cmnd" placeholder="Số CMND...">
        </div>
    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
            <input type="number" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Đăng Ký</label>
            <input type="datetime-local" class="form-control" name="ngay_dang_ky" placeholder="Ngày đăng ký...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Sinh</label>
            <input type="datetime-local" class="form-control" name="ngay_sinh" placeholder="Ngày sinh...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select class="form-select" name="gioi_tinh">
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>
        
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection