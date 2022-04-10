@extends('admin.layout.master')
@section('content')
    <form action="http://127.0.0.1:8000/admin/ticketBook/update/{{$ticketBook['id']}}" method="POST">
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
        <br>
        <label for="ngay_ban">ngay ban</label>
        <input type="date" name="ngay_ban" value="{{$ticketBook['ngay_ban']}}">
        <br>
        <label for="gia_ve">gia ve</label>
        <input type="integer" name="gia_ve" value="{{$ticketBook['gia_ve']}}">
        <br>
        <label for="tong_tien">tong tien</label>
        <input type="text" name="tong_tien" value="{{$ticketBook['tong_tien']}}">
        <br>
        <label for="suat_chieu_id">suat chieu</label>
        <select name="suat_chieu_id" id="">
            @foreach($showtimes as $row)
            <option {{$row->id == $ticketBook->suat_chieu_id ?'selected':''}} value="{{$row['id']}}">{{$row->gio_bat_dau}}</option>
            @endforeach
        </select>
        <br>
        <label for="ghe_id">Ghe</label>
        <select name="ghe_id" id="">
            @foreach($seats as $row)
            <option {{$row->id == $ticketBook->ghe_id ?'selected':''}} value="{{$row['id']}}">{{$row->vi_tri_day}}{{$row->vi_tri_cot}}</option>
            @endforeach
        </select>
        <br>
        <label for="ve_ban_id">ve ban</label>
        <select name="ve_ban_id" id="">
            @foreach($ticketSells as $row)
            <option value="{{$row['id']}}">{{$row['id']}}</option>
            @endforeach
        </select>
        <br>

        <label for="">nhan vien</label>
        <select name="nhan_vien_id" id="">
            @foreach($employees as $row)
            <option {{$row->id == $ticketBook->nhan_vien_id ?'selected':''}} value="{{$row['id']}}">{{$row['ho_ten']}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
@endsection