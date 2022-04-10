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
            <label for="exampleInputEmail1" class="form-label">Vị Trí Dãy:</label>
            <input type="text" class="form-control" name="vi_tri_day" placeholder="Vị trí dãy...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vị Trí Cột:</label>
            <input type="text" class="form-control" name="vi_tri_cot" placeholder="Vị trí cột...">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
            <option value="1" selected>Hoạt Động</option>
            <option value="0">Không Hoạt Động</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phòng Chiếu:</label>
            <select class="form-select" name="phong_chieu_id">
            <option value="">Chọn Phòng Chiếu</option>
            @foreach($cinemaRooms as $row)
            <option value="{{$row['id']}}">{{$row['id']}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection