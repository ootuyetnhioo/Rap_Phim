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
         <input type="text" class="form-control" name="ho_ten" placeholder="Họ Tên..." value="{{$employees['ho_ten']}}">
      </div>
      
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Số CMND</label>
         <input type="number" class="form-control" name="so_cmnd" placeholder="Số CMND..." value="{{$employees['so_cmnd']}}">
      </div>

      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
         <input type="number" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại..." value="{{$employees['so_dien_thoai']}}">
      </div>
      
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Mật Khẩu</label>
         <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu..." value="{{$employees['mat_khau']}}">
      </div>

      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
         <input type="text" class="form-control" name="dia_chi" placeholder="Địa Chỉ..." value="{{$employees['dia_chi']}}">
      </div>
      
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Ngày Vào Làm</label>
         <input type="date" class="form-control" name="ngay_vao_lam" placeholder="Ngày vào làm..." value="{{$employees['ngay_vao_lam']}}">
      </div>
      
      <div class="mb-3">
         <label class="form-label">Giới Tính</label>
         <select class="form-select" name="gioi_tinh">
            @if($employees->gioi_tinh == 1)
               <option value="1" selected>Nam</option>
               <option value="0">Nữ</option>
            @else
               <option value="1">Nam</option>
               <option value="0" selected>Nữ</option>
            @endif
         </select>
      </div>
      
      <div class="mb-3">
         <label class="form-label">Đang Làm</label>
         <select class="form-select" name="dang_lam">
            @if($employees->dang_lam == 1)
               <option value="1" selected>Có</option>
               <option value="0">Không</option>
            @else
               <option value="1">Có</option>
               <option value="0" selected>Không</option>
            @endif
         </select>
      </div>
      
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Hình Ảnh</label>
         <input type="file" class="form-control" name="hinh_anh">
      </div>

      <div class="mb-3">
         <label class="form-label">Đã Xóa</label>
         <select class="form-select" name="da_xoa">
            @if($employees->da_xoa == 1)
               <option value="0" selected>Chưa Xóa</option>
               <option value="1">Đã Xóa</option>
            @else
               <option value="0">Chưa Xóa</option>
               <option value="1" selected>Đã Xóa</option>
            @endif
         </select>
      </div>

      <input type="submit" value="Update" class="btn btn-primary">
   </form>
@endsection
