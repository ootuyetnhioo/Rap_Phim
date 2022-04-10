@extends('admin.layout.master')
@section('content')

 <table class="table">
<tr>
  <th>id</th>
  <th>so luong day</th>
  <th>so luong cot</th>
  <th></th>
  <th></th>
</tr>
<tr>
  @forelse ($cinemaRooms as $cinemaRoom)
<tr>
  <td>{{ $cinemaRoom['id'] }}</td>
  <td>{{ $cinemaRoom['so_luong_day'] }}</td>
  <td>{{ $cinemaRoom['so_luong_cot'] }}</td>
  <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/cinemaRoom/updateDisplay/{{ $cinemaRoom['id'] }}">Update</a></td>
  <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/cinemaRoom/destroy/{{ $cinemaRoom['id'] }}">Delete</a></td>
</tr>
@empty
<tr>
  <td colspan="4">No data!</td>
</tr>
@endforelse
</tr>
</table>
<a href="http://127.0.0.1:8000/admin/cinemaRoom/create">Add New</a>
@endsection