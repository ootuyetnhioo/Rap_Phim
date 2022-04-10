@extends('admin.layout.master')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email...">
         </div>
        
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" name="mat_khau" placeholder="Họ Tên...">
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
            <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" name="dia_chi" placeholder="Địa Chỉ...">
         </div>
        
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Vào Làm</label>
            <input type="date" class="form-control" name="ngay_vao_lam" placeholder="Ngày vào làm...">
         </div>
        
         <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select class="form-select" name="gioi_tinh">
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Đang Làm</label>
            <select class="form-select" name="dang_lam">
                <option value="0" selected>Có</option>
                <option value="1">Không</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" name="hinh_anh">
         </div>
        
         <div class="mb-3">
            <label class="form-label">Đã Xóa</label>
            <select class="form-select" name="da_xoa">
                <option value="0" selected>Chưa Xóa</option>
                <option value="1">Đã Xóa</option>
            </select>
        </div>
        
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
