@extends('admin.layout.master')
@section('content')
    
    <table class="table">
        <tr>
            <th>id</th>
            <th>ngay ban</th>
            <th>so luong ve</th>
            <th>so luong dich vu</th>
            <th>tong tien</th>
            <th>nhan vien</th>
            <th>dich vu</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            @forelse ($orders as $row)
                <tr>
                    <td>{{ $row['id'] }}</td>
                    <td>{{ $row['ngay_ban'] }}</td>
                    <td>{{ $row['so_luong_ve'] }}</td>
                    <td>{{ $row['so_luong_dich_vu'] }}</td>
                    <td>{{ $row['tong_tien'] }}</td>
                    <td>{{ $row->nhanvien->ho_ten }}</td>
                    <td>{{ $row->dichvu->ten_dich_vu }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $row->id}}">
                            details
                          </button>
                          
                          <!-- Modal -->
                          @foreach ($ticketBooks as $ticketBook)
                          @if ($row->id == $ticketBook->hoa_don_id)
                          <div class="modal fade" id="Modal{{ $ticketBook->hoa_don_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">chi tiet hoa don co id la: {{ $row['id'] }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                            <h5 class="modal-title" id="exampleModalLabel">ngay ban: {{ $ticketBook['ngay_ban'] }}</h5>
                                            <h5 class="modal-title" id="exampleModalLabel">tong tien: {{ $ticketBook['tong_tien'] }}</h5>
                                            @foreach ($showtimes as $showtime)
                                            @if($ticketBook['suat_chieu_id'] == $showtime['id'])
                                            <h5 class="modal-title" id="exampleModalLabel">suat chieu: {{ $showtime['gio_bat_dau'] }}</h5>
                                            @endif
                                            @endforeach
                                            @foreach ($seats as $seat)
                                            @if ($seat['id'] == $ticketBook['ghe_id'])
                                            <h5 class="modal-title" id="exampleModalLabel">so ghe: {{ $seat['vi_tri_day'] }}.{{ $seat['vi_tri_cot'] }}</h5>
                                            @endif
                                            @endforeach
                                           @foreach ($employees as $employee)
                                           @if ($employee['id'] == $ticketBook['nhan_vien_id'])
                                           <h5 class="modal-title" id="exampleModalLabel">ho ten nhan vien: {{ $employee['ho_ten'] }}</h5>
                                           <h5 class="modal-title" id="exampleModalLabel">email nhan vien: {{ $employee['email'] }}</h5>
                                           <h5 class="modal-title" id="exampleModalLabel">anh: <img src="{{ asset('http://127.0.0.1/laravel_rap_phim_thien_phan_quoc_dat_anh_quoc/storage/app/images/films/'.$employee['hinh_anh']) }}" alt="" style="wdith:50px; height:50px"></h5>
                                           @endif
                                           @endforeach                
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endif
                          @endforeach
                    </td>
                    
                    <td><a class="btn btn-primary" href="edit/{{$row['id']}}">Update</a></td>
                    <td>
                        <form action="destroy/{{$row['id']}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No data!</td>
                </tr>
            @endforelse
        </tr>
    </table>
    <a href="create">Add New</a>
@endsection