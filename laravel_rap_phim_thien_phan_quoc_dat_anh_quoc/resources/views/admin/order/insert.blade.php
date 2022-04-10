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
            <label for="exampleInputEmail1" class="form-label">Ngày Bán:</label>
            <input type="datetime-local" class="form-control" name="ngay_ban" placeholder="Ngày bán...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số Lượng Vé:</label>
            <input type="integer" class="form-control" name="so_luong_ve" placeholder="Số lượng vé...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số Lượng Dịch Vụ:</label>
            <input type="integer" class="form-control" name="so_luong_dich_vu" placeholder="Số lượng dịch vụ...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tổng Tiền:</label>
            <input type="text" class="form-control" name="tong_tien" placeholder="Tổng tiền...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nhân Viên:</label>
            <select class="form-select" name="nhan_vien_id">
            <option value="">Chọn Nhân Viên</option>
            @foreach($employees as $row)
            <option value="{{$row['id']}}">{{$row->ho_ten}}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Dịch Vụ:</label>
            <select class="form-select" name="dich_vu_id">
            <option value="">Chọn Dịch Vụ</option>
            @foreach($services as $row)
            <option value="{{$row['id']}}">{{$row->ten_dich_vu}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection