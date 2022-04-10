@extends('admin.layout.master')
@section('content')
    <form action="{{ route('adminShowtimeCreate') }}" method="POST">
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
            <input type="datetime-local" class="form-control" name="gio_bat_dau" placeholder="Giờ bắt đầu...">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giờ Kết Thúc:</label>
            <input type="datetime-local" class="form-control" name="gio_ket_thuc" placeholder="Giờ kết thúc...">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày Chiếu:</label>
            <input type="date" class="form-control" name="ngay_chieu" placeholder="Ngày chiếu...">
        </div>

        <div class="mb-3">
            <label class="form-label">Phim:</label>
            <select class="form-select" name="phim_id">
            <option value="">Chọn Phim</option>
            @foreach ($films as $film)
            <option value="{{ $film['id'] }}">{{ $film['ten'] }}</option>
            @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Phòng Chiếu:</label>
            <select class="form-select" name="phim_id">
            <option value="">Chọn Phòng Chiếu</option>
            @foreach ($cinemaRooms as $cinemaRoom)
                <option value="{{ $cinemaRoom['id'] }}">{{ $cinemaRoom['id'] }}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection