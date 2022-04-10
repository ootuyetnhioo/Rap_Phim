@extends('admin.layout.master')
@section('content')
    
    <table class="table">
        <tr>
            <th>id</th>
            <th>ten</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($kindOfMovies as $kindOfMovie)
                <tr>
                    <td>{{ $kindOfMovie['id'] }}</td>
                    <td>{{ $kindOfMovie['ten'] }}</td>
                    <td><a class="btn btn-primary" href="http://127.0.0.1:8000/admin/kindOfMovie/updateDisplay/{{ $kindOfMovie['id'] }}">Update</a></td>
                    <td><a class="btn btn-danger" href="http://127.0.0.1:8000/admin/kindOfMovie/destroy/{{ $kindOfMovie['id'] }}">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No data!</td>
                </tr>
            @endforelse
        </tr>
    </table>
    <a href="http://127.0.0.1:8000/admin/kindOfMovie/create">Add New</a>
@endsection