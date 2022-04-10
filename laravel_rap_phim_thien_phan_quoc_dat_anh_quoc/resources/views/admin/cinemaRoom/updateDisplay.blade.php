@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/cinemaRoom/update/{{ $cinemaRoom['id'] }}" method="POST">
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
            <label for="" class="form-label">Số Lượng Dãy</label>
            <input type="number" class="form-control" name="so_luong_day" placeholder="Số lượng dãy..." value="{{ $cinemaRoom['so_luong_day'] }}">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Số Lượng Dãy</label>
            <input type="number" class="form-control" name="so_luong_cot" placeholder="Số lượng cột..." value="{{ $cinemaRoom['so_luong_cot'] }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection