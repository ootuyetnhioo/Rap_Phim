@extends('welcome')
@section('content')
@include('home.header')
<div class="bg-white">
<div class="container page-detail" style="font-size: 18px;">
<div class="row justify-content-center bg-white" style="padding-top: 40px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div style="padding-bottom: 30px;"><span class="text-uppercase font-weight-bold" style="color: #ff5400;">ĐIỀU KHOẢN GIAO DỊCH</span></div>
                <div>
                    <p>Cảm ơn Quý khách đã tin tưởng sử dụng dịch vụ của <span class="font-weight-bold">Metiz Cinema</span>. Khi truy cập trang web này có nghĩa là Quý khách đồng ý với các điều khoản về quy định, thay đổi, hiệu chỉnh hoặc lược bỏ trong quyền sử dụng. Vì vậy, xin vui lòng tìm hiểu kỹ trước khi Đặt vé trực tuyến. </p>
                    <h3 class="font-weight-bold">1. Phạm vi áp dụng</h3>
                    <p>&nbsp;&nbsp; Những quy định dưới đây áp dụng riêng cho chức năng Đặt vé trực tuyến tại Website Metiz Cinema. Sử dụng chức năng này đồng nghĩa với việc quý khách chấp nhận các điều khoản về đặt chỗ mua vé cũng như các chỉ dẫn, điều khoản, điều kiện đã đăng tải trên Website. Nếu Quý khách không đồng ý với bất kì điều khoản nào, xin vui lòng dừng sử dụng chức năng này. </p>
                    <h3 class="font-weight-bold">2. Điều kiện sử dụng</h3>
                    <p>&nbsp;&nbsp; Để sử dụng chức năng Đặt vé trực tuyến, Quý khách phải đăng kí tài khoản với những thông tin xác thực về bản thân và cập nhật khi có thay đổi. Các tài khoản đã đăng kí sẽ được công nhận là thành viên của <span class="font-weight-bold">Metiz Cinema</span> và sở hữu bao gồm: tài khoản cá nhân, mật khẩu, các hoạt động giao dịch trên Website Metiz Cinema. Khi tài khoản có dấu hiệu bị truy cập trái phép, vui lòng thông báo ngay cho chúng tôi để được hướng dẫn xử lý kịp thời. Chúng tôi không chịu trách nhiệm với những thiệt hại, mất mát về tài khoản do quý khách không tuân thủ quy định hoặc thông báo chậm trễ. </p>
                    <h3 class="font-weight-bold">3. Quy định về Đặt vé trực tuyến </h3>
                    <p>- Tính năng đặt vé trực tuyến trên chỉ dành cho thành viên <span class="font-weight-bold">Metiz Cinema</span>. </p>
                    <p>- Tất cả các phim tại <span class="font-weight-bold">Metiz Cinema</span> đều được mở bán vé trực tuyến trước ngày công chiếu chính thức. Nếu bạn muốn mua vé suất chiếu chưa được hiển thị trên website, vui lòng liên hệ Hotline 0236 3630 689 để được tư vấn. </p>
                    <p>- Thời gian đóng chức năng đặt vé trực tuyến là 15 phút trước giờ chiếu phim. Ngoài thời gian này, quý khách vui lòng liên hệ trực tiếp tại rạp để mua vé. </p>
                    <p>- Thời gian một phiên đặt vé kể từ lúc quý khách bắt đầu chọn ghế là 5 phút. Sau thời gian này, số hế đã chọn của quý khách sẽ bị hủy. Quý khách có thể đặt tối đa 8 chỗ trong mỗi lần giao dịch.  </p>
                    <p>- Trước khi tiến thành các bước thanh toán, Quý khách vui lòng kiểm tra kỹ các thông tin về rạp chiếu, tên phim, số ghế, giờ chiếu và số tiền. Sau khi xác nhận thông tin đặt vé, quý khách bấm vào ô “Thanh toán” để thực hiện giao dịch. Mã xác nhận đặt vé của Quý khách sẽ được gửi về số điện thoại và Email (theo đăng kí thông tin thành viên). </p>
                    <p>- Nếu Quý khách không nhận được tin nhắn xác nhận đặt vé và mã giao dịch, vui lòng kiểm tra thông tin số điện thoại cung cấp (trong thông tin đăng kí thành viên) trước khi liên lạc với <span class="font-weight-bold">Metiz Cinema</span>. Email xác nhận thông tin đặt vé của Quý khách có thể bị chuyển vào Hộp thư rác (Spam), quý khách vui lòng kiểm tra trong trường hợp không nhận được email xác nhận đặt vé. </p>
                    <p>- Quý khách không thể thay đổi số ghế, suất chiếu khi đã xác nhận đặt vé và thanh toán giao dịch. Tuy nhiên, trong những trường hợp bất khả kháng xảy ra liên quan đến thay đổi chương trình; trục trặc kỹ thuật, phần mềm; sự cố về phần cứng, cơ sở vật chất, <span class="font-weight-bold">Metiz Cinema</span> có quyền hoàn trả lại vé (trong trường hợp hủy suất chiếu) hoặc thực hiện đổi, chuyển vé của bạn qua suất chiếu khác theo yêu cầu của khách hàng.</p>
                    <h3 class="font-weight-bold">4. Giá vé</h3>
                    <p>- Giá vé được niêm yết tại <span class="font-weight-bold">Metiz Cinema</span> là giá vé cuối cùng đã bao gồm thuế Giá trị gia tăng (VAT). Giá vé có thể thay đổi tùy vào thời điểm, phim và chương trình khuyến mãi kèm theo. Giá vé sẽ hiển thị trong trình đặt vé Trực tuyến khi quý khách tiến hành xác nhận thông tin đặt vé. </p>
                    <p>- Giá vé khi đặt trực tuyến là giá vé người lớn. Các loại vé khác như vé Trẻ em, Người cao tuổi, Học sinh – Sinh viên, vui lòng giao dịch trực tiếp tại rạp. </p>
                    <h3 class="font-weight-bold">5. Giá trị giao dịch và hình thức thanh toán</h3>
                    <p>- <span class="font-weight-bold">Metiz Cinema</span> cung cấp các hình thức thanh toán: Thẻ thanh toán nội địa (ATM) và Thẻ thanh toán quốc tế (VISA), thẻ quà tặng hoặc điểm thưởng. </p>
                    <p>- Để đảm bảo an toàn khi thanh toán, Quý khách lưu ý: </p>
                    <p>&nbsp; + Đối với đặt vé trực tuyến, chỉ thực hiện thanh toán tại cửa sổ liên kết từ Metiz Cinema chuyển đến </p>
                    <p>&nbsp; + Khi phát hiện các giao dịch trái phép trên thẻ thành viên của mình, Quý khách vui lòng liên hệ cho bộ phận Chăm sóc khách hàng để được xử lý kịp thời. </p>
                    <p>&nbsp;  + Kiểm tra tài khoản ngân hàng thường xuyên để kiểm soát mọi giao dịch từ thẻ của mình.  </p>
                    <h3 class="font-weight-bold">6. Giao dịch </h3>
                    <p>&nbsp;&nbsp; Khách hàng khi thực hiện giao dịch trực tuyến phải đăng nhập bằng tài khoản thành viên và thực hiện theo trình tự sau:</p>
                    <p>- Bước 1: Lựa chọn suất chiếu theo phim hoặc theo rạp </p>
                    <p>- Bước 2: Lựa chọn ghế ngồi </p>
                    <p>- Bước 3: Thanh toán bằng các hình thức thanh toán được Metiz hỗ trợ như Thẻ ATM, thẻ VISA, điểm thưởng, thẻ quà tặng. </p>
                    <p>- Bước 4: Nhận mã đặt chỗ qua tin nhắn SMS và Email </p>
                    <p>- Bước 5: Nhận vé đã đặt tại rạp xem phim. Quý khách vui lòng xuất trình tin nhắn tại quầy Ticket Box để nhận vé. </p>
                    <h3 class="font-weight-bold">7. Thay đổi, hủy bỏ giao dịch đặt vé </h3>
                    <p>&nbsp;&nbsp;  - Vé đã thanh toán thành công qua trình đặt vé trực tuyến không thể hủy, thay đổi thông tin hoặc hoàn trả. </p>
                    <p>- Hệ thống đặt vé trực tuyến của <span class="font-weight-bold">Metiz Cinema</span> liên kết với nhiều đối tác gồm: Cổng thanh toán VNPAY và các ngân hàng nội địa, các tổ chức tín dụng quốc tế. Tình trạng thanh toán của Quý khách phụ thuộc vào kết nối mạng, truyền dẫn, nhận và trả tín hiệu của các đối tác liên kết. <span class="font-weight-bold">Metiz Cinema</span> chỉ thực hiện hoàn tiền trong trường hợp tài khoản ngân hàng của bạn đã bị trừ tiền nhưng không được xác nhận đặt vé thành công (cũng như không nhận được tin nhắn, email thông báo). Trong trường hợp đó, Quý khách vui lòng liên hệ ngay với bộ phận Chăm sóc khách hàng của <span class="font-weight-bold">Metiz Cinema</span> để được hỗ trợ xử lý. </p>
                    <h3 class="font-weight-bold">8. Quy định về bảo mật</h3>
                    <p>&nbsp;&nbsp;  - <span class="font-weight-bold">Metiz Cinema</span> trong giao dịch luôn tôn trọng khách hàng cũng như các thông tin mang tính cá nhân của khách hàng, vì vậy mọi thông tin tài khoản của khách hàng đều được bảo mật an toàn. </p>
                    <p>- Bên cạnh đó, bằng việc sử dụng dịch vụ đặt vé và các tài nguyên khác của website Metiz Cinema, Quý khách có nghĩa vụ đảm bảo tính bảo mật, bản quyền của đơn vị. Quý khách không được dùng bất cứ chương trình, công cụ hay hình thức nào khác để can thiệp làm thay đổi cấu trúc dữ liệu. <span class="font-weight-bold">Metiz Cinema</span> nghiêm cấm các hành vi can thiệp, phá hoại, xâm nhập, sao chép trái phép dữ liệu của hệ thống cũng như phát tán, cổ vũ các cá nhân, tổ chức thực hiện các hành vi tương tự. Tùy vào mức độ nghiêm trọng của sự việc, <span class="font-weight-bold">Metiz Cinema</span> sẽ tước bỏ các quyền lợi và thực hiện truy tố trước pháp luật. </p>
                    <h3 class="font-weight-bold">9. Quy định về xác thực thông tin</h3>
                    <p>&nbsp;&nbsp; Khách hàng có trách nhiệm cung cấp thông tin đầy đủ và chính xác khi tham gia giao dịch tại <span class="font-weight-bold">Metiz Cinema</span>. Trong trường hợp khách hàng nhập sai thông tin tại trang thông tin trong tài khoản cá nhân, <span class="font-weight-bold">Metiz Cinema</span> có quyền từ chối thực hiện giao dịch. Ngoài ra, trong mọi trường hợp, khách hàng đều có quyền đơn phương chấm dứt giao dịch. </p>
                    <h3 class="font-weight-bold">10. Quy định chấm dứt thỏa thuận</h3>
                    <p>&nbsp;&nbsp;  - Trong trường hợp có bất kỳ thiệt hại nào phát sinh do việc vi phạm Quy Định sử dụng trang web, chúng tôi có quyền đình chỉ hoặc khóa tài khoản của quý khách vĩnh viễn. Nếu quý khách không hài lòng với trang web hoặc bất kỳ điều khoản, điều kiện, quy tắc, chính sách, hướng dẫn, hoặc cách thức vận hành của <span class="font-weight-bold">Metiz Cinema</span>, vui lòng ngưng sử dụng website này. </p>
                    <p>&nbsp;&nbsp;  Xin quý khách lưu ý chỉ mua hàng khi chấp nhận và hiểu rõ những quy định trên. Nếu cần hỗ trợ thêm thông tin, quý khách vui lòng liên hệ bộ phận Chăm sóc khách hàng của <span class="font-weight-bold">Metiz Cinema</span>. </p>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('home.footer')
@endsection