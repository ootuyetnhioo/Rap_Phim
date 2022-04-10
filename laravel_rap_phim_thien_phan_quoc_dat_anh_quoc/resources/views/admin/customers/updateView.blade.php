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
            <input type="text" class="form-control" name="ho_ten" placeholder="Họ Tên..." value="{{$customers['ho_ten']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số CMND</label>
            <input type="number" class="form-control" name="so_cmnd" placeholder="Số CMND..." value="{{$customers['so_cmnd']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
            <input type="number" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại..." value="{{$customers['so_dien_thoai']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email..." value="{{$customers['email']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ..." value="{{$customers['dia_chi']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Đăng Ký</label>
            <input type="datetime-local" class="form-control" name="ngay_dang_ky" placeholder="Ngày đăng ký..." value="{{$customers['ngay_dang_ky']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Sinh</label>
            <input type="datetime-local" class="form-control" name="ngay_sinh" placeholder="Ngày sinh..." value="{{$customers['ngay_sinh']}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select class="form-select" name="gioi_tinh">
            @if($customers->gioi_tinh == 1)
                <option value="1" selected>Nam</option>
                <option value="0">Nữ</option>
            @else
                <option value="1">Nam</option>
                <option value="0" selected>Nữ</option>
            @endif
            </select>
        </div>
        
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
