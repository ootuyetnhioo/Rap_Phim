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
        <br>
        <input type="integer" name="gia_ve" placeholder="gia ve">
        <br>
        <input type="text" name="tong_tien" placeholder="tong tien">
        <br>
        <label for="">Suat Chieu</label>
        <select name="suat_chieu_id" id="">
            
            @foreach($showtimes as $row)
            <option value="{{$row['id']}}">{{$row->gio_bat_dau}}</option>
            @endforeach
        </select>
        <br>
        <label for="">Ghe</label>
        <select name="ghe_id" id="">
           
            @foreach($seats as $row)
                    <option {{$row->trang_thai == 1}} value="{{$row['id']}}">{{$row->vi_tri_day}}{{$row->vi_tri_cot}}</option>
            @endforeach
        </select>
        <br>
        <label for="">ve ban</label>
        <select name="ve_ban_id" id="">
            
            @foreach($ticketSells as $row)
            <option value="{{$row['id']}}">{{$row['id']}}</option>
            @endforeach
        </select>
        <br>

        <label for="">nhan vien</label>
        <select name="nhan_vien_id" id="">
            
            @foreach($employees as $row)
            <option value="{{$row['id']}}">{{$row['ho_ten']}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
@endsection