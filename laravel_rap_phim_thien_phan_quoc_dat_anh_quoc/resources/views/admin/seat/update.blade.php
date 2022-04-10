@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/seat/update/{{$seat['id']}}" method="POST">
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
            <label for="exampleInputEmail1" class="form-label">Vị Trí Dãy:</label>
            <input type="text" class="form-control" name="vi_tri_day" placeholder="Vị trí dãy..." value="{{$seat['vi_tri_day']}}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vị Trí Cột:</label>
            <input type="text" class="form-control" name="vi_tri_cot" placeholder="Vị trí cột..." value="{{$seat['vi_tri_cot']}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Trạng Thái:</label>
            <select class="form-select" name="trang_thai">
            @if($seat['trang_thai']==1)
            <option value="1" selected>Hoạt Động</option>
            <option value="0">Không Hoạt Động</option>
            @else
            <option value="1">Hoạt Động</option>
            <option value="0" selected>Không Hoạt Động</option>
            @endif
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phòng Chiếu:</label>
            <select class="form-select" name="phong_chieu_id">
            <option value="">Chọn Phòng Chiếu</option>
            @foreach($cinemaRooms as $row)
            <option {{$row->id == $seat->phong_chieu_id ? 'selected':''}} value="{{$row['id']}}">{{$row['id']}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection