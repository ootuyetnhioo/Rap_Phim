file admin/layout/master comment dòng 21: @yield('content')
xóa ở file admin/film/index xóa @if @else $film['da_xoa'] == 0
 thêm hai nút delete và not delete và đổi delete thành delete in database
sửa file FilmController
sửa file web.php(route)
sửa file index.blade.php trong view/admin/film
sửa file movie.blade.php trong view/home/page