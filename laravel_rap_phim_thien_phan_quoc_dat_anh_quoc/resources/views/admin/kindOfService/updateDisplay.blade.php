@extends('admin.layout.master')
@section('content')
<body>
    <form action="http://127.0.0.1:8000/admin/kindOfService/update/{{ $kindOfService['id'] }}" method="POST">
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
            <input type="text" class="form-control" name="ten_dich_vu" placeholder="Tên dịch vụ..." value="{{ $kindOfService['ten_dich_vu'] }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection