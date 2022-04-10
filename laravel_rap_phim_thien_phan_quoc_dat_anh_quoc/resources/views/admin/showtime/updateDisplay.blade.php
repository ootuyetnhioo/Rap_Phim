@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/showtime/update/{{ $showtime['id'] }}" method="POST">
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
            <label for="exampleInputEmail1" class="form-label">Giờ Bắt Đầu:</label>
            <input type="datetime-local" class="form-control" name="gio_bat_dau" placeholder="Giờ bắt đầu..." value="{{ $showtime['gio_bat_dau'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giờ Kết Thúc:</label>
            <input type="datetime-local" class="form-control" name="gio_ket_thuc" placeholder="Giờ kết thúc..." value="{ $showtime['gio_ket_thuc'] }}">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Chiếu:</label>
            <input type="date" class="form-control" name="ngay_chieu" placeholder="Ngày chiếu..." value="{{$showtime['ngay_chieu']}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phim:</label>
            <select class="form-select" name="phim_id">
            <option value="">Chọn Phim</option>
            @foreach ($films as $film)
            <option {{$film->id == $showtime->phim_id ?'selected':''}} value="{{ $film['id'] }}">{{ $film['ten'] }}</option>
            @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phòng Chiếu:</label>
            <select class="form-select" name="phim_id">
            <option value="">Chọn Phòng Chiếu</option>
            @foreach ($cinemaRooms as $cinemaRoom)
            <option {{$cinemaRoom->id == $showtime->phong_chieu_id ?'selected':''}} value="{{ $cinemaRoom['id'] }}">{{ $cinemaRoom['id'] }}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection