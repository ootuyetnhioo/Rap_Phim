@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/service/update/{{$service['id']}}" method="POST">
        @method('put')
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
            <input type="text" class="form-control" name="ten_dich_vu" placeholder="Tên dịch vụ..." value="{{$service['ten_dich_vu']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá Dịch Vụ:</label>
            <input type="text" class="form-control" name="gia_dich_vu" placeholder="Giá dịch vụ..." value="{{$service['gia_dich_vu']}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
            @if($service->trang_thai == 0)
            <option value="0" selected>Không Hoạt Động</option>
            <option value="1">Hoạt Động</option>
            @else
            <option value="0">Không Hoạt Động</option>
            <option value="1" selected>Hoạt Động</option>
            @endif
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Loại Dịch Vụ:</label>
            <select class="form-select" name="loai_dich_vu_id">
            <option value="">Chọn Loại Dịch Vụ</option>
            @foreach($kindOfServices as $row)
            <option {{$row->id == $service->loai_dich_vu_id ? 'selected':''}} value="{{$row['id']}}">{{$row['ten_dich_vu']}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection