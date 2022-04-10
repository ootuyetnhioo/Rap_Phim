@extends('admin.layout.master')
@section('content')
    <form action="{{ route('adminKindOfServiceCreate') }}" method="POST">
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
            <label for="exampleInputEmail1" class="form-label">Tên Dịch Vụ</label>
            <input type="text" class="form-control" name="ten_dich_vu" placeholder="Tên dịch vụ...">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection