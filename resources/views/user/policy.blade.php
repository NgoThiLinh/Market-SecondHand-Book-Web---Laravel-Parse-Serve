<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Chợ sách - Của tôi & Của bạn</title>
        <meta name="_token" content="{{csrf_token()}}" />
        <meta name="notification" content="" title="" noticontent="" icon=""/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
<!-- header-area-end -->
    
    <style>
        .content {
            padding: 0 100px;
            margin-top: 90px;
            margin-bottom: 20px;
        }

        .content img {
            max-width: 100% !important;
        }

        #outer_edm_edm,
        #outer_edm_edm table,
        #outer_edm_edm td {
            max-width: 100% !important;
            overflow: hidden;
        }

        #title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .legal {
            line-height: 20px;
        }

        .legal ol {
            list-style-type: none;
            counter-reset: item;
            margin: 0;
            padding: 0;
        }

        .legal ol li:before {
            display: inline-block;
            width: 50px;
            content: counters(item, ".") ". ";
            font-weight: bold;
        }

        .legal ol li {
            display: table;
            counter-increment: item;
            margin-bottom: 0.6em;
            margin-left: 0;
            font-size: 120%;
            font-weight: bold;
            line-height: 50px;
        }

        .legal ol ol li:before {
            width: 50px;
            content: counters(item, ".");
            display: table-cell;
            font-weight: normal;
        }

        .legal ol ol li {
            font-size: 80%;
            font-weight: normal;
            line-height: 30px;
            margin: 20px 0 20px 0;
        }

        .legal ol ol ol li:before {
            content: "(" counter(item, lower-alpha) ")";
            display: table-cell;
            font-weight: normal;
        }

        .legal ol ol ol li {
            font-size: 100%;
            font-weight: normal;
            line-height: 30px;
        }

        .legal .hyphen-list li:before {
            content: '-';
        }

        .legal .no-numbering li:before {
            content: '  ';
        }

        .legal .number-numbering li:before {
            content: counters(item, ".");
            padding-right: 15px;
        }

        .legal .lower-th-numbering li:before {
            content: attr(data-attr);
        }

        .legal .lower-alpha-numbering li:before {
            content: "(" counter(item, lower-alpha) ")";
        }

        .legal .lower-roman-numbering li:before {
            content: "(" counter(item, lower-roman) ")";
        }

        .legal .lower-roman-numbering li span {
            text-decoration: underline;
        }

        .legal .decimal-numbering li:before {
            content: "(" counter(item, decimal) ")";
        }

        .legal .bold-text {
            font-weight: bold;
        }

        .legal .no-margin-bottom {
            margin-bottom: 0px;
        }

        .legal .justify-text {
            text-align: justify;
        }

        .legal p {
            font-size: 80%;
            font-weight: normal;
            line-height: 30px;
        }

        .legal a {
            text-decoration: none;
        }

    </style>

<body onload="starting()">
    <header>
            @include('components.header')
    </header>
    <!-- breadcrumbs-area-start -->
        <div class="breadcrumbs-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-menu">
                            <ul>
                                <li><a href="/">{{__('home')}}</a></li>
                                <li><a href="/policy" class="active">{{__('policy')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area-end -->
    <div class="container content">
        <div id="title">ĐIỀU KHOẢN DỊCH VỤ CHỢ SÁCH</div>
        <p align="center" style="background:white;text-align:center;">
	<br>
</p>
<p class="MsoNormal" style="text-align:left;background:white;">
	<b><span style="color:#000000;">1. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GIỚI THIỆU</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Điều khoản dịch vụ này là một bộ quy tắc về các điều khoản mà người bán và 
		người mua phải tuân thủ khi thực hiện giao dịch mua bán sách cũ tại Chợ Sách.
	</span><span><span style="color:#000000;"></span></span><span style="color:#000000;"></span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">1.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chào mừng bạn đến với website Chợ Sách qua giao diện
website hoặc ứng dụng di động (“Trang Chợ Sách”). Trước khi sử dụng Trang Chợ Sách hoặc tạo tài khoản Chợ Sách (“Tài Khoản”), 
vui lòng đọc kỹ các &nbsp;</span><b><span style="color:#000000;">Điều Khoản Dịch Vụ&nbsp;
</span></b><span style="color:#000000;">dưới đây và&nbsp;</span><b><span style="color:#000000;">để hiểu rõ quyền lợi và nghĩa vụ 
của mình khi trao đổi, mua bán sách cũ tại Chợ Sách. Khoản Dịch Vụ này điều chỉnh việc  bạn sử dụng Dịch Vụ cung cấp bởi website Chợ Sách.
</span></b>
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">1.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dịch Vụ bao gồm dịch vụ sàn giao dịch trực tuyến kết nối người tiêu
	dùng với nhau nhằm mang đến cơ hội kinh doanh giữa người mua (“Người Mua”) và người bán (“Người Bán”) (gọi chung là “bạn”, “Người Sử Dụng” 
	hoặc “Các Bên”). Hợp đồng mua bán thật sự là trực tiếp giữa Người Mua và Người Bán. Các Bên liên quan đến giao dịch đó sẽ hoàn toàn chịu
	trách nhiệm đối với hợp đồng mua bán giữa họ, việc đăng bán sách cũ, bảo hành sản phẩm và tương tự. Chợ Sách không can thiệp vào giao dịch
	giữa các Người Sử Dụng. Chợ Sách có thể hoặc không sàng lọc trước Người Sử Dụng hoặc Nội Dung hoặc thông tin cung cấp bởi Người Sử Dụng.
	Chợ Sách không bảo đảm cho việc các Người Sử Dụng sẽ thực tế hoàn thành giao dịch. Lưu ý, Chợ Sách sẽ là bên trung gian quản lý tình trạng 
	hàng hóa và mua bán giữa Người Mua và Người Bán và không quản lý vấn đề chuyển phát, Người Mua và Người Bán  tự giao dịch với nhau một 
	cách rõ ràng.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">1.3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trước khi trở thành Người Sử Dụng của Chợ Sách, bạn cần đọc và chấp nhận
	mọi điều khoản và điều kiện được quy định trong, và dẫn chiếu đến, Điều Khoản Dịch Vụ này và Chính Sách Bảo Mật được dẫn chiếu theo đây.
	</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">1.4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chợ Sách bảo lưu quyền thay đổi, chỉnh sửa, tạm ngưng hoặc chấm dứt tất
	cả hoặc bất kỳ phần nào của Trang Chợ Sách hoặc Dịch Vụ vào bất cứ thời điểm nào theo qui định pháp luật. Chợ Sách không chịu trách nhiệm
	đối với việc phát hành các Dịch Vụ hoặc tính năng của Dịch Vụ với phiên bản thử nghiệm mà các phiên bản này có thể không đúng hoặc không 
	hoàn toàn giống với phiên bản cuối cùng. Chợ Sách có toàn quyền giới hạn một số tính năng hoặc phạm vi truy cập của bạn đối với một phần 
	hoặc toàn bộ Trang Chợ Sách hoặc Dịch Vụ của Chợ Sách mà không cần thông báo hay chịu trách nhiệm.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">1.5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chợ Sách bảo lưu quyền từ chối yêu cầu mở Tài Khoản hoặc các truy cập của 
	bạn tới Trang Chợ Sách hoặc Dịch Vụ với bất kỳ lý do nào.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">BẰNG
VIỆC SỬ DỤNG DỊCH VỤ HAY TẠO TÀI KHOẢN TẠI Chợ Sách, BẠN ĐÃ CHẤP NHẬN KHÔNG HỦY
NGANG ĐỐI VỚI VÀ ĐỒNG Ý VỚI NHỮNG ĐIỀU KHOẢN DỊCH VỤ NÀY, BAO GỒM NHỮNG ĐIỀU
KHOẢN, ĐIỀU KIỆN, VÀ CHÍNH SÁCH BỔ SUNG ĐƯỢC DẪN CHIẾU THEO ĐÂY VÀ/HOẶC CÓ LIÊN
QUAN.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">NẾU
BẠN KHÔNG ĐỒNG Ý VỚI NHỮNG ĐIỀU KHOẢN DỊCH VỤ NÀY, VUI LÒNG KHÔNG SỬ DỤNG DỊCH
VỤ HOẶC TRUY CẬP VÀO TRANG CHỢ SÁCH. NẾU BẠN LÀ NGƯỜI CHƯA THÀNH NIÊN HOẶC BỊ
GIỚI HẠN VỀ NĂNG LỰC HÀNH VI DÂN SỰ THEO QUY ĐỊNH PHÁP LUẬT TẠI QUỐC GIA BẠN
SINH SỐNG, BẠN CẦN NHẬN ĐƯỢC SỰ HỖ TRỢ HOẶC CHẤP THUẬN TỪ CHA MẸ HOẶC NGƯỜI
GIÁM HỘ HỢP PHÁP, TÙY TỪNG TRƯỜNG HỢP ÁP DỤNG, ĐỂ MỞ TÀI KHOẢN HOẶC SỬ DỤNG
DỊCH VỤ. TRONG TRƯỜNG HỢP ĐÓ, CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP, TÙY TỪNG
TRƯỜNG HỢP ÁP DỤNG, CẦN HỖ TRỢ ĐỂ BẠN HIỂU RÕ HOẶC THAY MẶT BẠN CHẤP NHẬN NHỮNG
ĐIỀU KHOẢN TRONG THỎA THUẬN DỊCH VỤ NÀY. NẾU BẠN CHƯA CHẮC CHẮN VỀ ĐỘ TUỔI CŨNG
NHƯ NĂNG LỰC HÀNH VI DÂN SỰ CỦA MÌNH, HOẶC CHƯA HIỂU RÕ CÁC ĐIỀU KHOẢN NÀY CŨNG
NHƯ QUY ĐỊNH PHÁP LUẬT CÓ LIÊN QUAN ÁP DỤNG CHO ĐỘ TUỔI HOẶC NĂNG LỰC HÀNH VI
DÂN SỰ CỦA MÌNH, VUI LÒNG KHÔNG TẠO TÀI KHOẢN HOẶC SỬ DỤNG DỊCH VỤ CHO ĐẾN KHI
NHẬN ĐƯỢC SỰ GIÚP ĐỠ TỪ CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP. NẾU BẠN LÀ CHA MẸ
HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP CỦA NGƯỜI CHƯA THÀNH NIÊN HOẶC BỊ GIỚI HẠN VỀ NĂNG
LỰC HÀNH VI DÂN SỰ, TÙY TỪNG TRƯỜNG HỢP THEO QUY ĐỊNH PHÁP LUẬT, BẠN CẦN HỖ TRỢ
ĐỂ NGƯỜI ĐƯỢC GIÁM HỘ HIỂU RÕ HOẶC ĐẠI DIỆN NGƯỜI ĐƯỢC GIÁM HỘ CHẤP NHẬN CÁC
ĐIỀU KHOẢN DỊCH VỤ NÀY VÀ CHỊU TRÁCH NHIỆM ĐỐI VỚI TOÀN BỘ QUÁ TRÌNH SỬ DỤNG
TÀI KHOẢN HOẶC CÁC DỊCH VỤ CỦA CHỢ SÁCH &nbsp;MÀ
KHÔNG PHÂN BIỆT TÀI KHOẢN ĐÃ &nbsp;HOẶC SẼ ĐƯỢC
TẠO LẬP.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; QUYỀN RIÊNG TƯ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">2.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chợ Sách coi trọng việc bảo mật thông tin của bạn. 
	Để bảo vệ quyền lợi người dùng cho phép Chợ Sách thu thập, sử dụng, công bố và/hoặc xử lý các Nội Dung, dữ liệu cá
	nhân của bạn và Thông Tin Người Sử Dụng, đồng ý và công nhận rằng, trong phạm vi pháp luật có liên quan cho phép, các Thông </span> 
</p>
<p class="MsoListParagraph" style="margin-left:1.0in;text-indent:-.5in;">
	<span style="color:#000000;">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
cho phép Chợ Sách thu thập, sử dụng,
công bố và/hoặc xử lý các Nội Dung, dữ liệu cá nhân của bạn và Thông Tin Người
Sử Dụng như được quy định trong Chính Sách Bảo Mật;</span> 
</p>
<p class="MsoListParagraph" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
đồng ý và công nhận rằng, trong
phạm vi pháp luật có liên quan cho phép, các Thông Tin Người Sử Dụng sẽ thuộc
sở hữu chung của bạn và Chợ Sách; và</span> 
</p>
<p class="MsoListParagraph" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
sẽ không, dù là trực tiếp hay gián
tiếp, tiết lộ các Thông Tin Người Sử Dụng cho bất kỳ bên thứ ba nào, hoặc bằng
bất kỳ phương thức nào cho phép bất kỳ bên thứ ba nào được truy cập hoặc sử
dụng Thông Tin Người Dùng của bạn.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">2.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trường hợp Người Sử Dụng sở hữu dữ liệu cá
nhân của Người Sử Dụng khác thông qua việc sử dụng Dịch Vụ (“Bên Nhận Thông Tin”)
theo đây đồng ý rằng, mình sẽ (i) tuân thủ mọi qui định pháp luật về bảo vệ an
toàn thông tin cá nhân liên quan đến những thông tin đó; (ii) cho phép Người Sử
Dụng là chủ sở hữu của các thông thông tin cá nhân mà Bên Nhận Thông Tin thu
thập được (“Bên Tiết Lộ Thông Tin”) được phép xóa bỏ thông tin của mình được
thu thập từ cơ sở dữ liệu của Bên Nhận Thông Tin; và (iii) cho phép Bên Tiết Lộ
Thông Tin rà soát những thông tin đã được thu thập về họ bởi Bên Nhận Thông
Tin, phù hợp với hoặc theo yêu cầu của các qui định pháp luật hiện hành.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GIỚI HẠN TRÁCH
NHIỆM</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">3.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chợ Sách trao cho Người Sử Dụng quyền phù
hợp để truy cập và sử dụng các Dịch Vụ theo các điều khoản và điều kiện được
quy định trong Điều Khoản Dịch Vụ này. Tất cả các Nội Dung, thương hiệu, nhãn
hiệu dịch vụ, tên thương mại, biểu tượng và tài sản sở hữu trí tuệ khác độc
quyền (“Tài Sản Sở Hữu Trí Tuệ”) hiển thị trên Trang Chợ Sách đều thuộc sở hữu
của Chợ Sách và bên sở hữu thứ ba, nếu có. Không một bên nào truy cập vào Trang
Chợ Sách được cấp quyền hoặc cấp phép trực tiếp hoặc gián tiếp để sử dụng hoặc
sao chép bất kỳ Tài Sản Sở Hữu Trí Tuệ nào, cũng như không một bên nào truy cập
vào Trang Chợ Sách được phép truy đòi bất kỳ quyền, quyền sở hữu hoặc lợi ích nào
liên quan đến Tài Sản Sở Hữu Trí Tuệ. Bằng cách sử dụng hoặc truy cập Dịch Vụ,
bạn đồng ý tuân thủ các quy định pháp luật liên quan đến bản quyền, thương
hiệu, nhãn hiệu dịch vụ hoặc bất cứ quy định pháp luật nào khác bảo vệ Dịch Vụ,
Trang Chợ Sách và Nội Dung của Trang Chợ Sách. Bạn đồng ý không được phép sao chép,
phát tán, tái bản, chuyển giao, công bố công khai, thực hiện công khai, sửa
đổi, phỏng tác, cho thuê, bán, hoặc tạo ra các sản phẩm phái sinh của bất cứ
phần nào thuộc Dịch Vụ, Trang Chợ Sách và Nội Dung của Trang Chợ Sách. Bạn không
được nhân bản hoặc chỉnh sửa bất kỳ phần nào hoặc toàn bộ nội dung của Trang
Chợ Sách trên bất kỳ máy chủ hoặc như là một phần của bất kỳ website nào khác mà
chưa nhận được sự chấp thuận bằng văn bản của Chợ Sách. Ngoài ra, bạn đồng ý rằng
bạn sẽ không sử dụng bất kỳ robot, chương trình do thám (spider) hay bất kỳ
thiết bị tự động hoặc phương thức thủ công nào để theo dõi hoặc sao chép Nội Dung
của Chợ Sách khi chưa có sự đồng ý trước bằng văn bản của Chợ Sách (sự chấp thuận
này được xem như áp dụng cho các công cụ tìm kiếm cơ bản trên các webside tìm
kiến trên mạng kết nối người dùng trực tiếp đến website đó).</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">3.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chợ Sách cho phép kết nối từ website Người
Sử Dụng đến Trang Chợ Sách, với điều kiện website của Người Sử Dụng không được
hiểu là bất kỳ việc xác nhận hoặc liên quan nào đến Chợ Sách. Bạn thừa nhận rằng
Chợ Sách có toàn quyền ngừng cung cấp Dịch Vụ, dù một phần hay toàn bộ, vào bất
kỳ thời điểm nào mà không cần thông báo trước.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">4. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHẦN MỀM</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Bất kỳ phần mềm nào được cung cấp bởi Chợ Sách tới
Người Sử Dụng đều thuộc phạm vi điều chỉnh của các Điều Khoản Dịch Vụ này. Chợ Sách
bảo lưu tất cả các quyền liên quan đến phần mềm không được cấp một các rõ ràng
bởi Chợ Sách theo đây. Bất kỳ tập lệnh hoặc mã code, liên kết đến hoặc dẫn chiếu
từ Dịch Vụ, đều được cấp phép cho bạn bởi các bên thứ ba là chủ sở hữu của tập
lệnh hoặc mã code đó chứ không phải bởi Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">5. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TÀI KHOẢN VÀ BẢO
MẬT</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">5.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Một vài tính năng của Dịch Vụ chúng tôi
yêu cầu phải đăng ký một Tài Khoản bằng cách lựa chọn một tên người sử dụng
không trùng lặp (“Tên Đăng Nhập”) và mật khẩu đồng thời cung cấp một số thông
tin cá nhân nhất định. Nếu bạn lựa chọn Tên Đăng Nhập mà Chợ Sách, theo toàn
quyền quyết định của mình, cho là không phù hợp, Chợ Sách có quyền đình chỉ hoặc
xóa Tài Khoản của bạn. Bạn có thể sử dụng Tài Khoản của mình để truy cập vào
các sản phẩm, website hoặc dịch vụ khác mà Chợ Sách cho phép, có mối liên hệ hoặc
đang hợp tác. Chợ Sách không kiểm tra và không chịu trách nhiệm đối với bất kỳ nội
dung, tính năng năng, bảo mật, dịch vụ, chính sách riêng tư, hoặc cách thực
hiện khác của các sản phẩm, website hay dịch vụ đó.. Trường hợp bạn sử dụng Tài
Khoản của mình để truy cập vào các sản phẩm, website hoặc dịch vụ khác mà
Chợ Sách cho phép, có mối liên hệ hoặc đang hợp tác, các điều khoản dịch vụ của
những sản phẩm, website hoặc dịch vụ đó, bao gồm các chính sách bảo mật tương
ứng vẫn được áp dụng khi bạn sử dụng các sản phẩm, website hoặc dịch vụ đó ngay
cả khi những điều khoản dịch vụ này khác với Điều Khoản Dịch Vụ và/hoặc Chính Sách
Bảo Mật của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">5.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bạn đồng ý (a) giữ bí mật mật khẩu và chỉ
sử dụng Tên Đăng Nhập và mật khẩu khi đăng nhập, (b) đảm bảo bạn sẽ đăng xuất
khỏi tài khoản của mình sau mỗi phiên đăng nhập trên Trang Chợ Sách, và (c) thông
báo ngay lập tức với Chợ Sách nếu phát hiện bất kỳ việc sử dụng trái phép nào đối
với Tài Khoản, Tên Đăng Nhập và/hoặc mật khẩu của bạn. Bạn phải hoàn toàn chịu
trách nhiệm với mọi hoạt động dưới Tên Đăng Nhập và Tài Khoản của mình, ngay cả
khi những hoạt động hoặc việc sử dụng đó không do bạn thực hiện. Chợ Sách không
chịu trách nhiệm đối vớibất kỳ tổn thất hoặc thiệt hại nào phát sinh từ việc sử
dụng trái phép nào liên quan đến mật khẩu hoặc từ việc không tuân thủ Điều Khoản
này của Người Sử Dụng.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">5.3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bạn đồng ý rằng Chợ Sách có toàn quyền xóa Tài
Khoản và Tên Đăng Nhập của Người Sử Dụng ngay lập tức, gỡ bỏ hoặc hủy từ Trang Chợ Sách
bất kỳ Nội Dung nào liên quan đến Tài Khoản và Tên Đăng Nhập của Người Sử Dụng
với bất kỳ lý do nào mà có hoặc không cần thông báo hay chịu trách nhiệm với
Người Sử Dụng hay bên thứ ba nào khác. Căn cứ để thực hiện các hành động này có
thể bao gồm, nhưng không giới hạn ở việc (a) Tài K và Tên Đăng Nhập không hoạt
động trong thời gian dài, (b) vi phạm câu chữ hoặc tinh thần của các Điều Khoản
Dịch Vụ này, (c) có hành vi bất hợp pháp, lừa đảo, quấy rối, xâm phạm, đe dọa
hoặc lạm dụng, (d) có hành vi gây hại tới những Người Sử Dụng khác, các bên thứ
ba hoặc các lợi ích kinh tế của Chợ Sách. Việc sử dụng Tài Khoản cho các mục đích
bất hợp phát, lừa đảo, quấy rối, xâm phạm, đe dọa hoặc lạm dụng có thể được gửi
cho cơ quan nhà nước có thẩm quyền mà không cần thông báo trước cho Người Sử
Dụng. Trường hợp có tranh chấp được tiến hành liên quan đến Tài Khoản của Người
Sử Dụng hoặc việc sử dụng của bạn đối với Dịch Vụ với bất kỳ lý do gì, Chợ Sách
có quyền xóa Tài Khoản của bạn ngay lập tức mà có hoặc không cần thông báo.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">5.4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng có thể yêu cầu xóa tài khoản
bằng cách thông báo bằng văn bản đến Chợ Sách (<a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank"><strong>tại đây</strong></a></span><span style="color:#000000;">). Bất kể việc xóa tải khoản như vậy, Người Sử
Dụng vẫn phải chịu trách nhiệm và nghĩa vụ đối với bất kỳ giao dịch nào chưa
hoàn thành (phát sinh trước hoặc sau khi tài khoản bị xóa) hay việc vận chuyển
hàng hóa. Khi đó, theo Điều Khoản Dịch Vụ, Người Sử Dụng phải liên hệ với
Chợ Sách sau khi đã nhanh chóng và hoàn tất việc thực hiện và hoàn thành các giao
dịch chưa hoàn tất. Chợ Sách không có trách nhiệm và không chịu trách nhiệm đối
với bất kỳ tổn thất nào phát sinh từ bất kỳ hành động nào liên quan đến Mục
này. Người Sử Dụng miễn trừ bất kỳ và mọi khiếu nại liên quan đến bất kỳ hành
động nào như vậy của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">5.5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bạn chỉ có thể sử dụng Dịch Vụ và/hoặc mở
Tài Khoản tại Chợ Sách nếu bạn đáp ứng đủ các điều kiện để chấp nhận Điều Khoản
Dịch Vụ này.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">6. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ĐIỀU KHOẢN SỬ DỤNG</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">6.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quyền được phép sử dụng Trang Chợ Sách và
Dịch Vụ có hiệu lực cho đến khi bị chấm dứt. Quyền được phép sử dụng sẽ bị chấm
dứt theo Điều Khoản Dịch Vụ này hoặc trường hợp Người Sử Dụng vi phạm bất cứ
điều khoản hoặc điều kiện nào được quy định tại Điều Khoản Dịch Vụ này. Trong
trường hợp đó, Chợ Sách có thể chấm dứt việc sử dụng của Người Sử Dụng bằng hoặc
không cần thông báo.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">6.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng không được phép:</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; tải lên, đăng, truyền tải hoặc bằng cách
khác công khai bất cứ Nội Dung nào trái pháp luật, có hại, đe dọa, lạm dụng,
quấy rối, gây hoang mang, lo lắng, xuyên tạc, phỉ báng, xúc phạm, khiêu dâm,
bôi nhọ, xâm phạm quyền riêng tư của người khác, gây căm phẫn, hoặc phân biệt
chủng tộc, dân tộc hoặc bất kỳ nội dung không đúng đắn nào khác;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
vi phạm pháp luật, quyền lợi của bên thứ ba hoặc&nbsp;</span><span><a href="https://Chợ Sách.vn/docs/3604"><span style="color:#000000;">Chính Sách Cấm/Hạn Chế Sản Phẩm</span></a></span><span style="color:#000000;">&nbsp;của Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:21.3pt;text-align:justify;text-indent:14.7pt;background:white;">
	<span style="color:#000000;">(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
gây tổn hại cho trẻ vị thành niên dưới bất kỳ hình thức nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch Vụ để mạo danh bất kỳ cá
nhân hoặc tổ chức nào, hoặc bằng cách nào khác xuyên tạc cá nhân hoặc tổ chức;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; giả mạo các tiêu đề hoặc bằng cách khác
ngụy tạo các định dạng nhằm che giấu nguồn gốc của bất kỳ Nội Dung nào được
tryền tải thông qua Dịch Vụ;</span> 
</p>
<p class="MsoNormal" style="margin-left:21.3pt;text-align:justify;text-indent:14.7pt;background:white;">
	<span style="color:#000000;">(f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
gỡ bỏ bất kỳ thông báo độc quyền nào từ Trang Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(g)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; gây ra, chấp nhận hoặc ủy quyền cho việc
sửa đổi, cấu thành các sản phẩm phái sinh, hoặc chuyển thể của Dich Vụ mà không
được sự cho phép rõ ràng của Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(h)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch Vụ phục vụ lợi ích của bất
kỳ bên thứ ba nào hoặc bất kỳ hành vi nào không được chấp nhận theo Điều Khoản
Dịch Vụ này;</span> 
</p>
<p class="MsoNormal" style="margin-left:21.3pt;text-align:justify;text-indent:14.7pt;background:white;">
	<span style="color:#000000;">(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 sử dụng Dịch Vụ cho mục đích gian lận;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(j)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 chỉnh sửa giá của bất kỳ sản phẩm nào
hoặc can thiệp vào danh mục hàng hóa của Người Sử Dụng khác.</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(k)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; thực hiện bất kỳ hành động nào có thể
phá hoại hệ thống xếp hạng hoặc ghi nhận phản hồi của Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(l)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 cố gắng chuyển đổi mã chương trình, đảo
ngược kỹ thuật, tháo gỡ hoặc xâm nhập (hack) Dịch Vụ (hoặc bất cứ hợp phần nào
theo đó); hoặc phá bỏ hoặc vượt qua bất kỳ công nghệ mã hóa hoặc biện pháp bảo
mật nào được Chợ Sách áp dụng đối với các Dịch Vụ và/hoặc các dữ liệu được truyền
tải, xử lý hoặc lưu trữ bởi Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(m)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; khai thác hoặc thu thập bất kỳ thông tin nào
liên quan đến Tài Khoản của Người &nbsp;Sử
Dụng khác, bao gồm nhưng không giới hạn, bất kỳ thông tin hoặc dữ liệu cá nhân
nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; tải lên, gửi thư điện tử, đăng, chuyển
tải hoặc bằng cách khác công khai bất kỳ Nội Dung nào mà bạn không được cho
phép theo bất kỳ luật hoặc quan hệ hợp đồng hoặc tín thác nào (chẳng hạn thông
tin nội bộ, thông tin độc quyền và thông tin mật được biết hoặc tiết lộ như một
phần của quan hệ lao động hoặc theo các thỏa thuận bảo mật);</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(o)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; tải lên, gửi thư điện tử, đăng, chuyển
tải hoặc bằng cách khác công khai bất kỳ Nội Dung nào dẫn đến trường hợp vi
phạm các quyền về sáng chế, thương hiệu, bí quyết kinh doanh, bản quyền hoặc
bất cứ đặc quyền nào của bất cứ bên nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(p)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; tải lên, gửi thư điện tử, đăng, chuyển
tải hoặc bằng cách khác công khai bất kỳ quảng cáo, các tài liệu khuyến mại, “thư
quấy rối”, “thư rác”, “chuỗi ký tự” không được phép hoặc không hợp pháp, hoặc
bất kỳ hình thức lôi kéo không được phép nào khác;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(q)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; tải lên, gửi thư điện tử, đăng, chuyển tải
hoặc bằng cách khác công khai bất cứ tài liệu chứa các loại vi-rút, worm, trojan
hoặc bất kỳ các mã, tập tin hoặc chương trình máy tính được thiết kế để trực
tiếp hoặc gián tiếp gây cản trở, điều khiển, gián đoạn, phá hỏng hoặc hạn chế
các chức năng hoặc tổng thể của bất kỳ phần mềm hoặc phần cứng hoặc dữ liệu hoặc
thiết bị viễn thông của máy tính;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(r)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; làm gián đoạn các dòng tương tác thông
thường, đẩy nhanh tốc độ “lướt (scroll)” màn hình hơn những Người Sử Dụng khác
có thể đối với Dịch Vụ, hoặc bằng cách khác thực hiện thao tác gây ảnh hưởng
tiêu cực đến khả năng tham gia giao dịch thực của những Người Sử Dụng khác,</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(s)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 can thiệp, điều khiển hoặc làm gián đoạn Dịch
Vụ hoặc máy chủ hoặc hệ thống được liên kết với Dịch Vụ hoặc tới việc sử dụng
và trải nghiệm Dịch Vụ của Người Sử Dụng khác, hoặc không tuân thủ bất kỳ các
yêu cầu, quy trình, chính sách và luật lệ đối với các hệ thống được liên kết
với Trang Chợ Sách;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(t)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; thực hiện bất kỳ hành động hoặc hành vi
nào có thể trực tiếp hoặc gián tiếp phá hủy, vô hiệu hóa, làm quá tải, hoặc làm
suy yếu Dịch Vụ hoặc máy chủ hoặc hệ thống liên kết với Dịch Vụ;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(u)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch Vụ để vi phạm pháp luật,
quy chế, quy tắc, chỉ thị, hướng dẫn, chính sách áp dụng của địa phương, liên
bang, quốc gia hoặc quốc tế (có hoặc chưa có hiệu lực) một cách có chủ ý hoặc
vô ý liên quan đến phòng chống rửa tiền hoặc phòng chống khủng bố;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(v)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch Vụ để vi phạm hoặc phá vỡ
bất kỳ hình phạt hay lệnh cấm vận nào&nbsp; được quản lý hay thực thi bởi các
cơ quan có liên quan.</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(w)&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch Vụ để xâm hại tới quyền
riêng tư của người khác hoặc để “lén theo dõi” hoặc bằng cách khác quấy rối người
khác;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(x)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 xâm phạm các quyền của Chợ Sách, bao gồm
bất kỳ quyền sở hữu trí tuệ và gây nhầm lẫn cho các quyền đó;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(y)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; sử dụng Dịch vụ để thu thập hoặc lưu trữ
dữ liệu cá nhân của Người Sử Dụng khác liên quan đến các hành vi và hoạt động
bị cấm như đề cập ở trên; và/hoặc</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(z)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 liệt kê các hàng hóa xâm phạm quyền tác
giả, nhãn hiệu hoặc các quyền sở hữu trí tuệ khác của các bên thứ ba hoặc sử
dụng Dịch Vụ theo các cách thức có thể xâm phạm đến quyền sở hữu trí tuệ của các
bên khác.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">6.3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng hiểu rằng các Nội Dung, dù
được đăng công khai hoặc truyền tải riêng tư, là hoàn toàn thuộc trách nhiệm
của người đã tạo ra Nội Dung đó.&nbsp; Điều đó
nghĩa là bạn, không phải Chợ Sách, phải hoàn toàn chịu trách nhiệm đối với những Nội
Dung mà bạn tải lên, đăng, gửi thư điện tử, chuyển tải hoặc bằng cách nào khác
công khai trên Trang Chợ Sách. Người Sử Dụng hiểu rằng bằng cách sử dụng Trang
Chợ Sách, bạn có thể gặp phải Nội Dung mà bạn cho là phản cảm, không đúng đắn
hoặc chưa phù hợp. &nbsp;Trong giới hạn tối đa
được pháp luật cho phép, và trong bất cứ trường hợp nào, Chợ Sách sẽ không chịu
trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ Nội Dung nào, bao gồm,
nhưng không giới hạn, bất kỳ lỗi hoặc thiếu sót liên quan đến bất kỳ Nội Dung
nào, hoặc bất kỳ tổn thất hoặc thiệt hại dù như thế nào xuất phát từ việc sử
dụng, hoặc dựa trên, bất kỳ Nội Dung nào được đăng tải, gửi thư, chuyển tải
hoặc bằng cách khác công bố trên Trang Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">6.4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng thừa nhận rằng Chợ Sách và các
bên được chỉ định của mình có toàn quyền (nhưng không có nghĩa vụ) sàng lọc, từ
chối, xóa, gỡ bỏ hoặc dời bất kỳ Nội Dung có sẵn trên Trang Chợ Sách, bao gồm
nhưng không giới hạn bất kỳ Nội Dung hoặc thông tin nào bạn đã đăng. &nbsp;Không giới hạn ở những điều trên, Chợ Sách và
các bên được chỉ định của mình có quyền gỡ bỏ bất kỳ Nội Dung nào (i) xâm phạm
đến Điều Khoản Dịch Vụ; (ii) trường hợp Chợ Sách nhận được khiếu nại từ Người Sử
Dụng khác; (iii) trường hợp Chợ Sách nhận được thông báo về vi phạm quyền sở hữu
trí tuệ hoặc yêu cầu pháp lý cho việc gỡ bỏ; hoặc (iv) những nguyên nhân khác. &nbsp;Chợ Sách có quyền chặn các liên lạc (bao gồm,
nhưng không giới hạn, việc cập nhật trạng thái, đăng tin, truyền tin và/hoặc
tán gẫu) về hoặc liên quan đến Dịch Vụ như nỗ lực của chúng tôi nhằm bảo vệ
Dịch Vụ hoặc Người Sử Dụng của Chợ Sách, hoặc bằng cách khác thi hành các điều
khoản trong Điều Khoản Dịch Vụ này. Người Sử Dụng đồng ý rằng mình phải đánh
giá, và chịu mọi rủi ro liên quan đến, việc sử dụng bất kỳ Nội Dung nào, bao
gồm, nhưng không giới hạn, bất kỳ việc dựa vào tính chính xác, đầy đủ, hoặc độ
hữu dụng của Nội Dung đó. &nbsp;Liên quan đến
vấn đề này, Người Sử Dụng thừa nhận rằng mình không phải và, trong giới hạn tối
đa pháp luật cho phép, không cần dựa bào bất kỳ Nội Dung nào được tạo bởi
Chợ Sách hoặc gửi cho Chợ Sách, bao gồm, nhưng không giới hạn, các thông tin trên
các Diễn Đàn Chợ Sách hoặc trên các phần khác của Trang Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">6.5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng thừa nhận, chấp thuận và
đồng ý rằng Chợ Sách có thể truy cập, duy trì và tiết lộ thông tin Tài Khoản của
Người Sử Dụng trường hợp pháp luật có yêu cầu hoặc theo lệnh của tòa án hoặc
bất kỳ cơ quan chính phủ hoặc cơ quan nhà nước nào có thẩm quyền yêu cầu Chợ Sách
hoặc theo quan điểm của Chợ Sách thì việc duy trì truy cập hoặc tiết lộ đó là cần
thiết để: (a) tuân thủ các thủ tục pháp luật; (b) thực thi Điều Khoản Dịch Vụ;
(c) phản hồi các khiếu nại về việc Nội Dung xâm phạm đến quyền lợi của bên thứ
ba; (d) phản hồi các yêu cầu của Người Sử Dụng liên quan đến chăm sóc khách
hàng; hoặc (e) bảo vệ các quyền, tài sản hoặc an toàn của Chợ Sách, Người Sử Dụng
và/hoặc cộng đồng.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">7. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VI PHẠM ĐIỀU KHOẢN
DỊCH VỤ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">7.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Việc vi phạm chính sách này có thể dẫn tới
một số hành động, bao gồm, nhưng không giới hạn, bất kỳ hoặc tất cả các hành
động sau:</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Xóa danh mục sản
phẩm</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Giới hạn quyền sử
dụng Tài Khoản</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đình chỉ và chấm
dứt Tài Khoản</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cáo buộc hình sự;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">-&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Áp dụng biện pháp dân sự, bao gồm nhưng
không giới hạn, khiếu nại bồi thường thiệt hại và/hoặc áp dụng biện pháp khẩn
cấp tạm thời.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">7.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nếu bạn phát hiện Người Sử Dụng trên Trang
Chợ Sách của chúng tôi có hành vi vi phạm Điều Khoản Dịch Vụ, vui lòng liên
hệ Chợ Sách T</span><span><a href="mailto:support@Chợ Sách.vn"><span style="color:#000000;"></span></a><a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank"><strong>ại đây</strong></a></span><span style="color:#000000;">.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">8. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BÁO CÁO HÀNH VI CÓ
KHẢ NĂNG XÂM PHẠM QUYỀN SỞ HỮU TRÍ TUỆ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">8.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Sử Dụng là các cá nhân hoặc tổ chức độc
lập và họ không có bất kỳ mối liên kết nào với Chợ Sách dưới bất kỳ hình thức
nào. &nbsp;Chợ Sách cũng không phải là đại lý
hay đại diện của Người Sử Dụng và không nắm giữ và/hoặc sở hữu bất kỳ hàng hóa
nào được chào bán trên Trang Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">8.2&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Nếu bạn là chủ sở hữu quyền sở hữu trí tuệ
(“Chủ Sở Hữu Quyền SHTT”) hoặc là đại diện được ủy quyền Chủ Sở Hữu Quyền SHTT
(“Đại Diện Quyền SHTT”) &nbsp;và bạn tin rằng các quyền của bản thân hoặc của
thân chủ có khả năng bị xâm phạm, &nbsp;vui lòng báo bằng văn bản tới Chợ Sách (<strong><a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank">tại đây</a>)</strong></span><span style="color:#000000;">&nbsp;và cung cấp cho chúng tôi các tài liệu như
được hướng dẫn sau đó để hỗ trợ việc giải quyết khiếu nại.&nbsp; Chúng tôi sẽ
dành một khoảng thời gian hợp lý để xử lý các thông tin cung cấp. &nbsp;Chợ Sách sẽ phản hồi khiếu nại của bạn trong
thời gian sớm nhất có thể. &nbsp;Vui lòng sử dụng đơn khiếu nại mẫu và chuẩn bị các hồ sơ cần
thiết&nbsp;</span><span><a href="https://drive.google.com/file/d/1Wh3KzWusgDfIphPwYelkvKLtwsaMTHIJ/view?usp=sharing" target="_blank"><strong><span style="color:#000000;">Tại&nbsp;Đây</span></strong></a></span><span style="color:#000000;">.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">9. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ĐẶT HÀNG VÀ THANH
TOÁN</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">9.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vào từng thời điểm, Chợ Sách hỗ trợ một hoặc
nhiều phương thức thanh toán như sau:</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">(i) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><u><span style="color:#000000;">Thẻ Tín Dụng/Ghi
Nợ</span></u> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;background:white;">
	<span style="color:#000000;">Thanh toán qua thẻ tín dụng/ghi nợ được thực
hiện thông qua kênh thanh toán của bên thứ ba và danh sách thẻ được chấp nhận
phụ thuộc vào kênh thanh toán mà bạn đang sử dụng.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">(ii) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><u><span style="color:#000000;">Thanh Toán Khi
Nhận Hàng (COD)</span></u> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;background:white;">
	<span style="color:#000000;">Chợ Sách cung cấp dịch vụ COD ở một số nước. Người
mua có thể trả tiền mặt trực tiếp cho người vận chuyển sau khi nhận biên nhận
mua hàng.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">9.2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Người Mua chỉ có thể thay đổi kênh thanh
toán trước khi thực hiện thanh toán.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">9.3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chợ Sách không chịu trách nhiệm cũng như nghĩa vụ nào đối với bất kỳ tổn thất hoặc thiệt hại nào mà Người Mua hoặc Người Bán phải chịu từ việc nhập sai thông tin vận chuyển và/hoặc thông tin thanh toán cho đơn hàng đã đặt và/hoặc sử dụng phương thức thanh toán không được liệt kê ở khoản 9.1 ở trên. Chợ Sách bảo lưu quyền kiểm tra tính hợp pháp quyền sử dụng phương thức thanh toán của Người Mua và có quyền đình chỉ giao dịch cho đến khi xác nhận được tính hợp pháp hoặc hủy các giao dịch liên quan nếu không thể xác nhận tính hợp pháp này.&nbsp;&nbsp;</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Lưu ý: Chợ Sách sẽ chịu trách nhiệm với những đơn
hàng có sử dụng các dịch vụ hỗ trợ chuyển phát của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">9.4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hiện tại, Chợ Sách chỉ có thể thực hiện
thanh toán cho Người Sử Dụng qua chuyển khoản ngân hàng. &nbsp;Do vậy, Người Sử Dụng cần cung cấp cho Chợ Sách thông
tin tài khoản ngân hàng để nhận thanh toán, nghĩa là thanh toán cho sản phẩm đã
bán hoặc hoàn lại từ Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;"><br>
</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">10. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VÍ Chợ Sách</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.1 &nbsp;&nbsp;&nbsp; Ví Chợ Sách là một tính năng do Chợ Sách hoặc
nhà cung cấp dịch vụ được phép của Chợ Sách cung cấp để hỗ trợ việc lưu giữ tiền
bán hàng hoặc tiền hoàn trả cho các giao dịch trả hàng/hoàn tiền. Tổng số tiền
này, trừ đi các khoản đã được rút, sẽ được thể hiện ở mục số dư Ví Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.2&nbsp;&nbsp;&nbsp;&nbsp; Bạn có thể chuyển tiền từ Ví Chợ Sách (tối đa
toàn bộ số dư trong Ví Chợ Sách của bạn) đến tài khoản ngân hàng liên kết (“Tài
Khoản Liên Kết”) thông qua thao tác gửi yêu cầu chuyển tiền (“Yêu Cầu Rút
Tiền”). &nbsp;Yêu Cầu Rút Tiền thủ công đầu
tiên trong tuần sẽ không bị tính phí. &nbsp;Chợ Sách
cũng có thể chuyển khoản tự động từ Ví Chợ Sách của bạn đến Tài Khoản Liên Kết
theo định kỳ, theo thiết lập của bạn. &nbsp;Chợ Sách
chỉ thực hiện việc chuyển khoản vào ngày làm việc và việc chuyển khoản đó có
thể cần tối đa ba ngày làm việc để hoàn tất việc ghi có vào Tài Khoản Liên Kết.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.3&nbsp;&nbsp;&nbsp;&nbsp; Tiền thu được từ việc bán hàng &nbsp;có sử dụng dịch vụ vận chuyển được hỗ trợ trên
Trang Chợ Sách sẽ được ghi có vào Ví Chợ Sách sau 8 ngày kể từ khi đơn hàng được
cập nhật trạng thái Giao Hàng Thành Công (cho các đơn hàng ở Chợ Sách Mall), hoặc
sau 48 giờ kể từ khi đơn hàng được cập nhật trạng thái Giao Hàng Thành Công
(cho các đơn hàng không thuộc Chợ Sách Mall), hoặc sau khi Người Mua xác nhận đã
nhận được hàng. &nbsp;Tiền mua hàng thuộc các
đơn hàng thanh toán bằng tiền mặt (COD) được trả hàng/hoàn tiền sẽ được ghi có
vào Ví Chợ Sách trong vòng một (01) ngày làm việc sau ngày yêu cầu trả hàng/hoàn
tiền được chấp thuận.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.4&nbsp;&nbsp;&nbsp;&nbsp; Sau khi đã gửi yêu cầu chuyển tiền, bạn có
thể không thể thay đổi hoặc huỷ Yêu Cầu Rút Tiền.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.5 &nbsp;&nbsp;&nbsp; Nếu xảy ra lỗi trong quá trình xử lý bất kỳ
giao dịch nào, bạn uỷ quyền cho Chợ Sách chỉnh sửa lỗi đó và thực hiện ghi có
hoặc ghi nợ trong tài khoản ngân hàng chỉ định của bạn, với điều kiện là việc
chỉnh sửa này được thực hiện theo quy định pháp luật có liên quan. &nbsp;Nếu Chợ Sách không thể ghi có hoặc ghi nợ vào
tài khoản ngân hàng chỉ định của bạn vì bất kỳ lý do nào, bạn uỷ quyền cho
chúng tôi tiếc tục thực hiện việc ghi có hoặc ghi nợ vào tài khoản, sau khi áp
dụng bất kỳ khoản phí có liên quan nào, vào bất kỳ tài khoản ngân hàng hoặc
phương tiện thanh toán nào mà bạn đã cung cấp cho Chợ Sách hoặc cấn trừ việc ghi
có hoặc ghi nợ cùng các khoản phí có liên quan từ số dư Ví Chợ Sách của bạn trong
tương lai, trong giới hạn pháp luật cho phép.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">10.6&nbsp;&nbsp;&nbsp;&nbsp; Bạn ủy quyền cho chúng tôi được thực hiện
các bút toán ghi có hoặc ghi nợ liên quan đến Ví Chợ Sách của bạn:</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; để
điều chỉnh các sai sót trong việc thực hiện bất kỳ giao dịch nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(ii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; trường hợp Chợ Sách cho rằng bạn thực hiện
hành vi và / hoặc giao dịch gian lận hoặc đáng ngờ</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(iii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; liên quan đến bất kỳ tổn thất, thiệt hại
hoặc các khoản không chính xác nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(iv)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; liên quan đến bất kỳ điểm thưởng hay hoàn
lại nào;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (v)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; liên
quan đến bất kỳ loại phí chưa được thanh toán nào;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(vi)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; liên quan đến việc giải quyết bất kỳ
tranh chấp giao dịch nào, bao gồm bất kỳ các bồi thường cho hoặc từ phía bạn;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(vii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; liên quan đến các sản phẩm bị cấm hoặc các
sản phẩm bị cơ quan có thẩm quyền thu hồi; và</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(viii)&nbsp;&nbsp;&nbsp;&nbsp; liên quan đến bất kỳ việc thay đổi thỏa
thuận đã cam kết giữa Người Mua và Người Bán.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">11. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHÍNH SÁCH ĐẢM BẢO</span></b><span style="color:#000000;">&nbsp;</span><b><span style="color:#000000;">CỦA</span></b><span style="color:#000000;">&nbsp;</span><b><span style="color:#000000;">Chợ Sách</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.1 &nbsp;&nbsp;&nbsp; Chính Sách Đảm Bảo của Chợ Sách là dịch vụ
cung cấp bởi Chợ Sách hoặc đơn vị được Chợ Sách ủy quyền nhằm bảo hộ các giao dịch.
&nbsp;Để bảo đảm các rủi ro về trách nhiệm
pháp lý, khoản tiền Người Mua thanh toán đơn hàng cho Người Bán sẽ được lưu giữ
bởi Chợ Sách hoặc đơn vị được Chợ Sách ủy quyền (“Tài khoản Đảm Bảo Shopee”). &nbsp;Người Bán sẽ không nhận được lãi hoặc bất kỳ
khoản phát sinh nào từ khoản tiền trong Tài Khoản Đảm Bảo Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.2 &nbsp;&nbsp;&nbsp; Sau khi Người Mua thanh toán đơn hàng
(“Khoản Tiền Thanh Toán từ Người Mua”), Khoản Tiền Thanh Toán từ Người Mua sẽ
được lưu giữ trong Tài Khoản Đảm Bảo Chợ Sách cho đến khi:</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(a)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Người Mua gửi xác nhận cho Chợ Sách mình đã
nhận được hàng, trong trường hợp đó, trừ khi Mục 11.2(d) áp dụng, Chợ Sách sẽ
chuyển Tiền Thanh Toán từ Người Mua vào Tài Khoản Đảm Bảo Chợ Sách cho Người bán;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(b)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Trong trường hợp Thời Gian Chợ Sách Đảm Bảo
(hoặc thời hạn gia hạn đã được chấp thuận theo Mục 11.3) đã hết hạn, trừ trường
hợp áp dụng Mục 11.2(c) và 11.2(d), Chợ Sách sẽ chuyển Tiền Thanh Toán từ Người
Mua vào Tài khoản Đảm Bảo Chợ Sách cho Người Bán;</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(c)&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp; Trường hợp Chợ Sách xác định được rằng
yêu cầu trả hàng/hoàn tiền của Người Mua được chấp thuận, trừ khi áp dụng Mục 11.2(d),
Chợ Sách sẽ hoàn tiền cho Người Mua, theo các điều khoản trong Chính Sách Trả Hàng
và Hoàn Tiền của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(d)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; vào thời điểm mà Chợ Sách xác định một cách
hợp lý rằng việc phân bổ Tiền Thanh Toán từ Người Mua là hợp lý, bao gồm, nhưng
không giới hạn, khi Chợ Sách xem như là cần thiết hợp lý để tuân thủ các quy định
pháp luật hoặc theo lệnh của tòa án hoặc để thực thi Điều Khoản Dịch Vụ này.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Chính Sách Đảm Bảo của Chợ Sách chỉ áp dụng khi
Người Mua lựa chọn hình thức thanh toán mà tiền được chuyển vào Tài Khoản Đảm
Bảo Chợ Sách trước. Hình thức tự thỏa thuận giữa Người Mua và Người Bán sẽ không
được áp dụng Chính Sách Đảm Bảo của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.3 &nbsp;&nbsp;&nbsp; Các khoản thanh toán thực hiện qua các kênh
thanh toán Chợ Sách sẽ được giữ lại trong Tài Khoản Đảm Bảo Chợ Sách trong một
khoảng thời gian nhất định (“Thời Gian Chợ Sách Đảm Bảo”). &nbsp;Để biết thêm thông tin về Thời Gian Chợ Sách Đảm
Bảo, vui lòng theo </span><u><span style="color:#000000;">đường dẫn</span></u><span style="color:#000000;"> này. &nbsp;Người Mua có thể đề nghị gia hạn Thời Gian Đảm
Bảo tối đa một lần duy nhất trước khi hết hạn Thời Gian Chợ Sách Đảm Bảo, tùy
thuộc vào và theo các quy định trong Chính Sách Trả Hàng và Hoàn Tiền. &nbsp;Theo yêu cầu của Người mua, Thời Gian Chợ Sách
Đảm Bảo có thể được gia hạn tối đa ba (03) ngày trừ khi Chợ Sách, theo toàn quyền
quyết định của mình, quyết định rằng việc kéo dài thêm thời gian gia hạn là cần
thiết hoặc như được yêu cầu.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.4&nbsp;&nbsp;&nbsp;&nbsp; Trường hợp, vì bất kỳ lý do gì, tài khoản
ngân hàng của Người Bán không thể ghi có và / hoặc Người Bán không thể liên lạc
được, Chợ Sách trong sự cố gắng hợp lý của mình sẽ liên lạc với Bên Bán bằng các
thông tin do Người Bán cung cấp. &nbsp;Trong
trường hợp Người Bán không thể liên lạc được và sau thời hạn mười hai (12)
tháng kể từ ngày Khoản Tiền Thanh Toán của Người Mua đến hạn thanh toán cho
Người Bán nhưng chưa được trả cho Người Bán, Chợ Sách sẽ xử lý Khoản Tiền Thanh
Toán này theo quy định pháp luật.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.5 &nbsp;&nbsp;&nbsp; Người Bán/Người Mua phải là bên thụ hưởng Tài
Khoản và tự thực hiện giao dịch trên Trang Chợ Sách. &nbsp;Chợ Sách có quyền yêu cầu Người Bán hoặc Người
Mua cung cấp các dữ liệu cá nhân như ảnh chân dung, thông tin tài khoản ngân
hàng và/hoặc bất cứ tài liệu cần thiết nào khác để sử dụng vào mục đích xác
nhận thông tin, bao gồm cả việc xác nhận theo yêu cầu của bên thứ ba thực hiện
thanh toán và các bên cung cấp dịch vụ vận chuyển. &nbsp;Người Bán/Người Mua theo đây chấp thuận cho
Chợ Sách sử dụng hoặc cung cấp các dữ liệu cá nhân của mình nhằm phục vụ cho việc
sử dụng Trang Chợ Sách của Người Bán/Người Mua.&nbsp;
Ngoài ra, Người Bán/Người Mua ủy quyền cho Chợ Sách sử dụng các dữ liệu cá
nhân của mình để giải đáp bất kỳ thắc mắc nào Chợ Sách cho là cần thiết để xác
nhận danh tính của Người Bán/Người Mua với các tổ chức khác như ngân hàng của
Người Bán/Người Mua. &nbsp;Để biết thêm thông
tin về cách thức Chợ Sách xử lý thông tin cá nhân của bạn, vui lòng tham khảo tại
trang&nbsp;</span><span><a href="http://Chợ Sách.vn/docs/3603"><span style="color:#000000;">Chính Sách Bảo Mật</span></a></span><span style="color:#000000;">.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.6 &nbsp;&nbsp;&nbsp; Chính Sách Đảm Bảo
của Chợ Sách là nội dung thêm vào và không giới hạn các nghĩa vụ của Người Bán và
Người Mua theo quy định pháp luật hiện hành mà các quy định pháp luật này có
thể rộng hơn hoặc chặt chẽ hơn những quy định trong Chính Sách Đảm Bảo của
Chợ Sách. &nbsp;Chính Sách Đảm Bảo của Chợ Sách
không nhằm mục đích cũng như không được xây dựng nhằm hỗ trợ Người Bán hoặc Người
Mua tuân thủ các nghĩa vụ pháp luật của chính họ mà các nghĩa vụ này phải tự
chịu trách nhiệm bởi chính Người Bán hoặc Người Mua, và Chợ Sách không có trách
nhiệm liên quan đên các nghĩa vụ pháp luật của Người Bán hoặc Người Mua như vừa
đề cập.&nbsp; Trong mọi trường hợp, Chính Sách
Đảm Bảo của Chợ Sách không cấu hành việc bảo hành sản phẩm.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.7 &nbsp;&nbsp;&nbsp; Người Mua và Người Bán thừa nhận và đồng ý
rằng quyết định của Chợ Sách đối với hoặc liên quan đến bất kỳ vấn đề nào về
Chính Sách Đảm Bảo của Chợ Sách là quyết định cuối cùng.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">11.8. &nbsp;&nbsp; Để tránh nhầm lẫn, bất kỳ giao dịch nào không
được thực hiện trên Trang Chợ Sách sẽ không được áp dụng Chính Sách Đảm Bảo của
Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">12. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HỆ THỐNG ĐIỂM
THƯỞNG Chợ Sách XU</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.1 &nbsp;&nbsp;&nbsp; Người Sử Dụng có thể tích lũy điểm thưởng
(“Shopee Xu”) khi mua hàng trên Trang Chợ Sách thông qua việc sử dụng hệ thống Chính
Sách Đảm Bảo của Chợ Sách hoặc thông qua việc tham gia các hoạt động của
Chợ Sách&nbsp;do Chợ Sách toàn quyền quyết định vào từng thời điểm (“Hoạt Động Hợp Lệ”).
&nbsp;Nhìn chung, Chợ Sách Xu sẽ được ghi nhận
vào Tài Khoản của Người Sử Dụng sau khi hoàn tất giao dịch hoặc hoạt động thành
công được Chợ Sách chấp thuận. &nbsp;Bạn có đủ
điều kiện tham gia hệ thống điểm thưởng Chợ Sách Xu nếu bạn là Người Sử Dụng và Tài
Khoản của bạn không thuộc đối tượng không áp dụng việc tham gia.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.2 &nbsp;&nbsp;&nbsp; Giao dịch chưa hoàn thành trên Trang Chợ Sách
khi sử dụng Chính Sách Đảm Bảo Chợ Sách sẽ không đủ điều kiện tham gia hệ thống
điểm thưởng Chợ Sách Xu. &nbsp;Chợ Sách có toàn
quyền loại trừ các mặt hàng không thuộc đối tượng của hệ thống điểm thưởng
Chợ Sách Xu.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.3 &nbsp;&nbsp;&nbsp; Chợ Sách Xu không có giá trị tiền tệ, không cấu
thành tài sản của Người Sử Dụng và không thể được mua, bán, chuyển nhượng hoặc
quy đổi thành tiền mặt.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.4 &nbsp;&nbsp;&nbsp; Tùy thuộc vào các quy tắc và quy định được
Chợ Sách quyết định, thay đổi và chỉnh sửa vào từng thời điểm, tùy thuộc vào hạn
mức theo toàn quyền quyết định của Chợ Sách, Người Sử Dụng có thể sử dụng Chợ Sách
Xu bằng cách gửi yêu cầu đến Chợ Sách và sử dụng Chợ Sách Xu để khấu trừ vào giá
sản phẩm khi thực hiện giao dịch mua hàng trên Trang Chợ Sách theo quy định của
Chợ Sách vào từng thời điểm. &nbsp;Tất cả các khoản hoàn tiền phải tuân thủ theo Chính
Sách Trả Hàng và Hoàn Tiền tại Mục 14.4.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.5 &nbsp;&nbsp;&nbsp; Chợ Sách Xu mà bạn đã sử dụng sẽ được trừ vào
số dư Chợ Sách Xu. &nbsp;Mỗi Chợ Sách Xu đều có
hạn sử dụng. &nbsp;Lưu ý kiểm tra chi tiết Tài
Khoản của bạn trên Trang Chợ Sách để biết số dư Chợ Sách Xu cũng như hạn sử dụng.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.6 &nbsp;&nbsp;&nbsp; Vào từng thời điểm, Chợ Sách sẽ thông tin đến
bạn điểm thưởng Chợ Sách Xu sẽ được áp dụng đối với Hoạt Động Hợp Lệ cụ thể
nào.&nbsp; Hoạt Động Hợp Lệ có thể bao gồm
nhưng không giới hạn đối với việc bạn thực hiện mua sắm với Người Bán đang tham
gia chương trình hoặc các chương trình khuyến mãi cụ thể của Chợ Sách. &nbsp;Chúng tôi sẽ thông báo đến bạn các điều khoản
của các chương trình điểm thưởng đó nếu được áp dụng vào từng thời điểm.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.7 &nbsp;&nbsp;&nbsp; Nếu bạn có khiếu nại liên quan đến số lượng
Chợ Sách Xu nhận được từ Hoạt Động Hợp Lệ, thì khiếu nại đó phải được gửi đến
Chợ Sách (<strong><a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank">tại đây</a></strong><a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank"></a>)</span><span style="color:#000000;">&nbsp;trong vòng một (01) tháng kể từ ngày bạn thực
hiện thành công giao dịch. Chúng tôi có thể yêu cầu bạn cung cấp bằng chứng để
hỗ trợ cho việc khiếu nại của bạn.&nbsp;
Chợ Sách bảo lưu quyền từ chối giải quyết khiếu nại nếu thời gian gửi
khiếu nại đã qua.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.8 &nbsp;&nbsp;&nbsp; Chợ Sách không đảm bảo và không chấp nhận
trách nhiệm thực hiện nghĩa vụ thuế cho Chợ Sách Xu. &nbsp;Bạn cần kiểm tra với chuyên viên tư vấn thuế
của bạn xem là việc nhận Chợ Sách Xu có ảnh hưởng đến nghĩa vụ thuế của bạn hay
không.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">12.9 &nbsp;&nbsp;&nbsp; Trong giới hạn quy định pháp luật áp dụng, Chợ Sách
bảo lưu quyền (i) ngưng hệ thống điểm thưởng Chợ Sách Xu bất cứ lúc nào, và (ii)
hủy hoặc hoãn quyền tham gia vào hệ thống điểm thưởng Chợ Sách Xu của Người Sử
Dụng, bao gồm cả khả năng có được hoặc sử dụng Chợ Sách Xu.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">13. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VẬN CHUYỂN</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">13.1 &nbsp;&nbsp;&nbsp; Khi vận chuyển thành công đơn hàng, Chợ Sách
sẽ thông báo đến Người Bán về việc đã nhận được tiền thanh toán từ phía Người Mua.
Trừ trường hợp có thỏa thuận khác với Chợ Sách, Người Bán có trách nhiệm cung cấp
đầy đủ thông tin tài khoản ngân hàng để Chợ Sách tiến hành chuyển tiền thanh toán
cho đơn hàng đó.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">13.2 &nbsp;&nbsp;&nbsp; Người Bán phải luôn nỗ lực để đảm bảo Người
Mua sẽ nhận được hàng đúng hẹn trong Thời Gian Chợ Sách Đảm Bảo.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">13.3 &nbsp;&nbsp;&nbsp; Người Sử Dụng hiểu rằng Người Bán chịu toàn
bộ rủi ro liên quan đến việc vận chuyển hàng hóa được mua và bảo đảm rằng Người
Bán đã hoặc sẽ mua bảo hiểm hàng hóa, bao gồm cả việc vận chuyển. &nbsp;Trong trường hợp Hàng hóa được mua bị hư hỏng,
thất lạc hoặc không chuyển phát được trong quá trình vận chuyển, Người Sử Dụng thừa
nhận và đồng ý rằng Chợ Sách sẽ không chịu trách nhiệm đối với bất kỳ tổn thất,
chi phí, phí tổn hoặc bất kỳ khoản phí nào phát sinh từ sự cố đó và Người Bán
và/hoặc Người Mua sẽ liên hệ với đơn vị vận chuyển để giải quyết sự cố đó.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">13.4. &nbsp;&nbsp; Đối với Giao Dịch Xuyên Quốc Gia. Người Sử Dụng hiểu rằng, khi một đăng bán có mô tả rằng sản phẩm được đăng bán sẽ được gửi từ nước ngoài, sản phẩm đó được bán bởi Người Bán ngoài Việt Nam, và việc xuất/nhập khẩu sản phẩm đó chịu sự điều chỉnh của pháp luật nước sở tại.&nbsp; Người Sử Dụng cần hiểu rõ các hạn chế về xuất/nhập khẩu hàng hóa của quốc gia nhập khẩu.&nbsp; Người Sử Dụng đồng ý rằng Chợ Sách không thể tư vấn pháp lý liên quan đến vấn đề này và đồng ý rằng Chợ Sách sẽ không thể chịu các rủi ro hoặc trách nhiệm pháp lý đối với hoạt động xuất/nhập khẩu hàng hóa vào Việt Nam.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">14. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HỦY ĐƠN HÀNG, TRẢ
HÀNG VÀ HOÀN TIỀN</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">14.1 &nbsp;&nbsp;&nbsp; Người Mua chỉ có thể hủy đơn hàng trước khi
thanh toán bằng thẻ tín dụng/ghi nợ Quốc tế.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">14.2 &nbsp;&nbsp;&nbsp; Người Mua có thể yêu cầu trả hàng và hoàn
tiền trong vòng ba (03) ngày kể từ ngày nhận hàng. &nbsp;Vui lòng xem&nbsp;</span><span><a href="http://www.Chợ Sách.vn/docs/3605"><span style="color:#000000;">Chính
Sách Trả Hàng và Hoàn Tiền</span></a></span><span style="color:#000000;"> của Chợ Sách&nbsp;để biết thêm thông tin chi tiết.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">14.3 &nbsp;&nbsp;&nbsp; Chợ Sách không quản lý việc hủy đơn hàng, trả
hàng, hoàn tiền của các đơn hàng tự giao dịch giữa Người Bán và Người Mua.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">14.4 &nbsp;&nbsp;&nbsp; Nếu bạn dùng Chợ Sách Xu để thanh toán và được
hoàn trả dựa trên Chính Sách Trả Hàng và Hoàn Tiền của Chợ Sách, Chợ Sách sẽ tách
biệt hoàn trả số tiền bạn đã thanh toán cho món hàng đó và số Chợ Sách Xu bạn đã
dùng vào Tài Khoản của bạn.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">15. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TRÁCH NHIỆM CỦA
NGƯỜI BÁN</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.1 &nbsp;&nbsp;&nbsp; Người Bán phải quản lý và đảm bảo độ chính
xác và đầy đủ của các thông tin chẳng hạn liên quan đến giá cả và chi tiết sản
phẩm, số lượng sản phẩm trong kho cũng như các điều khoản và điều kiện bán hàng
được cập nhật trong danh mục sản phẩm của Người Bán và không được phép đăng tải
các thông tin không chính xác hoặc gây nhầm lẫn.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.2 &nbsp;&nbsp;&nbsp; </span><span style="color:#000000;">Giá sản phẩm được Người Bán toàn quyền quyết định, trừ các sản phẩm được ấn định giá bởi cơ quan có thẩm quyền. Giá sản phẩm nên bao gồm toàn bộ số tiền mà Người Mua cần thanh toán (ví dụ: các loại thuế, phí, v.v.) và Người Bán sẽ không yêu cầu Người Mua thanh toán thêm hoặc riêng bất kỳ khoản tiền nào khác.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.3 &nbsp;&nbsp;&nbsp; Trong giới hạn pháp luật cho phép, Người Bán
đồng ý rằng Chợ Sách có thể, theo toàn quyền quyết định của mình, thực hiện các
hoạt động khuyến mãi để hỗ trợ các giao dịch giữa Người Bán và Người Mua thông
qua việc giảm, chiết khấu hoặc hoàn lại phí hoặc thông qua những cách khác. &nbsp;Giá cuối cùng Người Mua cần thanh toán thực tế
là giá đã áp dụng những điều chỉnh trên.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.4 &nbsp;&nbsp;&nbsp; Để thúc đẩy việc mua các sản phẩm Người Bán
đăng bán, Chợ Sách có thể đăng những sản phẩm đó (theo mức giá đã điều chỉnh) lên
các website của bên thứ ba (chẳng hạn các cổng thông tin và cổng so sánh giá)
và những website khác (nội địa hoặc quốc tế) được vận hành bởi hoặc hợp tác với
Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.5 &nbsp;&nbsp;&nbsp;</span> <span style="color:#000000;">Người Bán chịu trách nhiệm cung cấp hóa đơn cho Người Mua theo quy định pháp luật.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.6 &nbsp;&nbsp;&nbsp; Người Bán thừa nhận và đồng ý rằng Người Bán
chịu trách nhiệm chi trả các loại thuế, phí hải quan và bất kỳ loại phí nào đối
với sản phẩm được bán và Chợ Sách không cung cấp bất kỳ tư vấn về pháp lý hay tư
vấn thuế nào liên quan đến vấn đề này. &nbsp;Bên
Bán nên sử dụng dịch vụ tư vấn thuế chuyên nghiệp nếu cần thiết.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">15.7 &nbsp;&nbsp;&nbsp; Người Bán thừa nhận và đồng ý rằng bất kỳ sự
vi phạm nào của Người Bán đối với các chính sách của Chợ Sách sẽ dẫn đến các biện
pháp đề cập tại Mục 7.1.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">16. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHÍ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">16.1 &nbsp;&nbsp;&nbsp;</span> <span style="color:#000000;">Nếu không có thỏa thuận nào khác, Người Sử Dụng không phải thanh toán bất kỳ khoản phí nào khi sử dụng sàn giao dịch thương mại điện tử Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">16.2 &nbsp;&nbsp;&nbsp; Nếu có bất kỳ khoản phí nào phải trả, khoản
phí đó cũng là đối tượng chịu thuế theo quy định pháp luật có liên quan. &nbsp;Người Bán thừa nhận và đồng ý rằng Chợ Sách có
thể khấu trừ các khoản phí phải trả cho Chợ Sách và các khoản thuế áp dụng từ số
tiền bán hàng được thanh toán bởi Người Mua. &nbsp;Chợ Sách sẽ xuất biên lai hoặc hóa đơn tài chính
cho khoản phí và khoản thuế do Người Bán chi trả nếu có yêu cầu.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">17. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TRANH CHẤP</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">17.1 &nbsp;&nbsp;&nbsp; Trường
hợp phát sinh vấn đề liên quan đến giao dịch, Người Bán và Người Mua đồng ý đầu
tiên sẽ đối thoại với nhau để cố gắng giải quyết tranh chấp đó bằng thảo luận
hai bên, và Chợ Sách sẽ cố gắng một cách hợp lý để thu xếp. &nbsp;Nếu vấn đè không được giải quyết bằng thảo
luận hai bên, Người Sử Dụng có thể khiếu nại lên cơ quan có thẩm quyền của địa
phương để giải quyết tranh chấp phát sinh đối với giao dịch.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">17.2&nbsp;&nbsp;&nbsp;&nbsp; Mỗi Người Bán và Người Mua cam kết và đồng
ý rằng mình sẽ không tiến hành thủ tục tố tụng hoặc bằng cách khác khiếu nại
đối với Chợ Sách hoặc các công ty liên kết của Chợ Sách (trừ trường hợp Chợ Sách hoặc
các công ty liên kết của mình là Người Bán sản phẩm liên quan đến khiếu nại đó)
liên quan đến bất kỳ giao dịch nào được thực hiện trên Trang Chợ Sách hoặc bất kỳ
tranh chấp nào liên quan đến giao dịch đó.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">17.3 &nbsp;&nbsp;&nbsp; Người
Sử Dụng được áp dụng Chính Sách Đảm Bảo của Chợ Sách có thể gửi yêu cầu bằng văn
bản tới Chợ Sách để được hỗ trợ giải quyết tranh chấp phát sinh từ giao dịch. &nbsp;Chợ Sách, theo toàn quyền quyết định của mình và
không có nghĩa vụ đối với Người Bán và Người Mua, sẽ thực hiện những bước cần
thiết để hỗ trợ Người Sử Dụng giải quyết những tranh chấp này. &nbsp;Để biết thêm thông tin chi tiết, vui lòng
xem&nbsp;</span><span><a href="http://Chợ Sách.vn/docs/3605"><span style="color:#000000;">Chính Sách Trả Hàng và Hoàn Tiền</span></a></span><span style="color:#000000;"> của Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">17.4 &nbsp;&nbsp;&nbsp; Để
rõ ràng hơn, việc hỗ trợ theo Mục 17 này chỉ áp dụng đối với Người Mua là đối
tượng của Chính Sách Đảm Bảo của Chợ Sách. &nbsp;Người Mua sử dụng những phương thức thanh toán
khác có thể liên hệ trực tiếp với Người Bán.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">1</span></b><b><span style="color:#000000;">8</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHẢN HỒI</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">18.1 &nbsp;&nbsp;&nbsp; Chợ Sách
luôn đón nhận những thông tin và phản hồi từ phía Người Sử Dụng nhằm giúp
Chợ Sách cải thiện chất lượng Dịch Vụ. &nbsp;Vui
lòng xem thêm quy trình phản hồi của Chợ Sách dưới đây:</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(ii)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Phản hồi cần được thực hiện bằng văn bản qua
email hoặc sử dụng mẫu phản hồi có sẵn trên ứng dụng.</span> 
</p>
<p class="MsoNormal" style="margin-left:.25in;text-align:justify;text-indent:.25in;background:white;">
	<span style="color:#000000;">(iii)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Tất cả các phản hồi ẩn danh đều không được
chấp nhận.</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(iv)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Người Sử Dụng liên quan đến phản hồi sẽ được
thông báo đầy đủ và được tạo cơ hội cải thiện tình hình.</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(v)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Những phản hồi không rõ ràng và mang tính
phỉ báng sẽ không được chấp nhận</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">1</span></b><b><span style="color:#000000;">9</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LOẠI TRỪ TRÁCH NHIỆM</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">19.1</span><b><span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span style="color:#000000;">DỊCH
VỤ ĐƯỢC CUNG CẤP NHƯ ‘SẴN CÓ’ VÀ KHÔNG CÓ BẤT KỲ SỰ ĐẢM BẢO, KHIẾU NẠI HOẶC KHẲNG
ĐỊNH NÀO TỪ Chợ Sách VỀ BẤT KỲ NỘI DUNG NÀO ĐƯỢC THỂ HIỆN, NGỤ Ý HOẶC BẮT BUỘC ĐỐI
VỚI DỊCH VỤ, BAO GỒM NHƯNG KHÔNG GIỚI HẠN, VIỆC ĐẢM BẢO VỀ CHẤT LƯỢNG, VIỆC
THỰC HIỆN, KHÔNG VI PHẠM, VIỆC MUA BÁN, HAY SỰ PHÙ HỢP CHO MỘT MỤC ĐÍCH CỤ THỂ,
CŨNG NHƯ KHÔNG CÓ BẤT KỲ SỰ ĐẢM BẢO NÀO ĐƯỢC TẠO RA TRONG QUÁ TRÌNH GIAO DỊCH, THỰC
HIỆN, MUA BÁN HOẶC SỬ DỤNG SẢN PHẨM SAU KHI MUA.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">NGOÀI CÁC NỘI DUNG TRÊN VÀ TRONG GIỚI HẠN CHO
PHÉP TỐI ĐA CỦA PHÁP LUẬT, Chợ Sách KHÔNG ĐẢM BẢO RẰNG DỊCH VỤ, TRANG Chợ Sách HOẶC
CÁC CHỨC NĂNG ĐƯỢC TÍCH HỢP TRONG ĐÓ LUÔN CÓ SẴN, CÓ THỂ TRUY CẬP, KHÔNG BỊ
GIÁN ĐOẠN, ĐÚNG LÚC, AN TOÀN, CHÍNH XÁC, HOÀN THIỆN HOẶC KHÔNG BỊ LỖI, RẰNG CÁC
LỖI PHÁT SINH, NẾU CÓ, SẼ ĐƯỢC KHẮC PHỤC, HOẶC RẰNG TRANG Chợ Sách VÀ/HOẶC MÁY CHỦ
SẼ SẴN CÓ NHỮNG CHỨC NĂNG AN TOÀN VỚI VI RÚT, TROJAN-HORSES, ĐỊNH TUYẾN, TRAP
DOORS, TIME BOMBS HOẶC BẤT CỨ MÃ, LỆNH, CHƯƠNG TRÌNH HOẶC THÀNH TỐ CÓ HẠI NÀO
KHÁC.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">19.2 &nbsp;&nbsp;&nbsp; NGƯỜI
SỬ DỤNG CẦN THỪA NHẬN RẰNG MỌI RỦI RO PHÁT SINH NGOÀI VIỆC SỬ DỤNG HOẶC VẬN
HÀNH CỦA TRANG Chợ Sách VÀ/HOẶC DỊCH VỤ Chợ Sách SẼ THUỘC VỀ NGƯỜI SỬ DỤNG TRONG
GIỚI HẠN TỐI ĐA PHÁP LUẬT CHO PHÉP.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">19.3 &nbsp;&nbsp;&nbsp; Chợ Sách
KHÔNG KIỂM SOÁT VÀ, TRONG GIỚI HẠN TỐI ĐA PHÁP LUẬT CHO PHÉP, KHÔNG ĐẢM BẢO
HOẶC CHẤP NHẬN BẤT KỲ TRÁCH NHIỆM NÀO ĐỐI VỚI: (A) VIỆC PHÙ HỢP MỤC ĐÍCH, SỰ
TỒN TẠI, CHẤT LƯỢNG, ĐỘ AN TOÀN HOẶC TÍNH PHÁP LÝ CỦA CÁC SẢN PHẨM CÓ SẴN TRÊN TRANG
Chợ Sách; HOẶC (B) KHẢ NĂNG NGƯỜI BÁN BÁN CÁC SẢN PHẨM HOẶC KHẢ NĂNG CỦA NGƯỜI
MUA MUA VÀ THANH TOÁN CHO CÁC SẢN PHẨM. &nbsp;NẾU
CÓ TRANH CHẤP LIÊN QUAN ĐẾN MỘT HOẶC NHIỀU NGƯỜI SỬ DỤNG, NHỮNG NGƯỜI SỬ DỤNG
NÀY ĐỒNG Ý TỰ GIẢI QUYẾT TRANH CHẤP TRỰC TIẾP VỚI NHAU VÀ, TRONG GIỚI HẠN TỐI
ĐA PHÁP LUẬT CHO PHÉP, MIỄN TRỪ Chợ Sách VÀ CÁC CÔNG TY LIÊN KẾT CỦA Chợ Sách KHỎI BẤT
KỲ VÀ MỌI KHIẾU NẠI, YÊU CẦU VÀ TỔN THẤT PHÁT SINH HOẶC LIÊN QUAN VỚI BẤT KỲ
TRANH CHẤP NÀO.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">20</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CÁC LOẠI TRỪ VÀ GIỚI
HẠN TRÁCH NHIỆM</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">20.1 &nbsp;&nbsp;&nbsp; TRONG
GIỚI HẠN TỐI ĐA PHÁP LUẬT CHO PHÉP, KHÔNG MỘT TRƯỜNG HỢP NÀO RÀNG BUỘC Chợ Sách
CHỊU TRÁCH NHIỆM DÙ PHÁT SINH TỪ HỢP ĐỒNG, BẢO HÀNH, LỖI (BAO GỒM, NHƯNG KHÔNG
GIỚI HẠN, NHỮNG BẤT CẨN (DÙ CHỦ ĐỘNG, BỊ ĐỘNG HOẶC BỊ QUY GÁN), TRÁCH NHIỆM ĐỐI
VỚI SẢN PHẨM, TRÁCH NHIỆM PHÁP LÝ HOẶC TRÁCH NHIỆM KHÁC), HOẶC NGUYÊN NHÂN KHÁC
LIÊN QUAN ĐẾN LUẬT PHÁP, QUYỀN LỢI CHÍNH ĐÁNG, CÁC QUY CHẾ HOẶC CÁC HÌNH THỨC
KHÁC ĐỐI VỚI</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (A) TỔN THẤT VỀ SỬ DỤNG; (B) TỔN THẤT
VỀ LỢI NHUẬN; (C) TỔN THẤT VỀ DOANH THU; (D) TỔN THẤT VỀ DỮ LIỆU; (E) TỔN THẤT
VỀ UY TÍN; HOẶC (F) KHÔNG THỰC HIỆN ĐƯỢC CÁC BIỆN PHÁP NGUY CẤP DỰ TRÙ, ĐỐI VỚI
TỪNG TRƯỜNG HỢP DÙ TRỰC TIẾP HOẶC GIÁN TIẾP; HOẶC</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(ii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BẤT KỲ THIỆT HẠI GIÁN TIẾP, NGẪU NHIÊN,
ĐẶC BIỆT HOẶC MANG TÍNH HỆ QUẢ NÀO (GỒM BẤT KỲ MẤT MÁT NÀO VỀ DỮ LIỆU, GIÁN
ĐOẠN DỊCH VỤ, MÁY TÍNH, ĐIỆN THOẠI HOẶC CÁC THIẾT BỊ DI ĐỘNG KHÁC) PHÁT SINH TỪ
HOẶC LIÊN QUAN ĐẾN VIỆC SỬ DỤNG HOẶC NGOÀI KHẢ NĂNG SỬ DỤNG TRANG Chợ Sách HOẶC
DỊCH VỤ, BAO GỒM NHƯNG KHÔNG GIỚI HẠN, BẤT KỲ THIỆT HẠI NÀO PHÁT SINH TỪ ĐÓ,
NGAY CẢ KHI Chợ Sách ĐÃ ĐƯỢC CHO HAY VỀ KHẢ NĂNG CỦA CÁC THIỆT HẠI ĐÓ HOẶC ĐƯỢC GỢI
Ý PHẢI CHỊU TRÁCH NHIỆM.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">20.2 &nbsp;&nbsp;&nbsp; BẠN
THỪA NHẬN VÀ ĐỒNG Ý RẰNG QUYỀN DUY NHẤT CỦA BẠN LIÊN QUAN ĐẾN CÁC SỰ CỐ HOẶC SỰ
KHÔNG THỎA MÃN VỚI DỊCH VỤ LÀ YÊU CẦU CHẤM DỨT TÀI KHOẢN CỦA BẠN VÀ/HOẶC DỪNG
SỬ DỤNG DỊCH VỤ.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">20.3&nbsp;BẤT KỂ CÁC ĐIỀU KHOẢN BÊN TRÊN, TRƯỜNG
HỢP Chợ Sách, THEO PHÁN QUYẾT CỦA TÒA ÁN CÓ THẨM QUYỀN, PHẢI CHỊU TRÁCH NHIỆM
TRONG GIỚI HẠN TỐI ĐA PHÁP LUẬT CHO PHÉP (BAO GỒM ĐỐI VỚI LỖI BẤT CẨN KHÔNG
ĐÁNG KỂ) THÌ TRÁCH NHIỆM CỦA Chợ Sách ĐỐI VỚI BẠN HOẶC BẤT KỲ BÊN THỨ BA NÀO CHỈ
GIỚI HẠN TRONG MỨC THẤP HƠN ĐỐI VỚI (A) KHOẢN PHÍ PHẢI TRẢ CHO BẠN THEO CHÍNH
SÁCH Chợ Sách ĐẢM BẢO; VÀ (B) 2.000.000 VND (HAI TRIỆU ĐỒNG CHẴN) HOẶC KHOẢN TIỀN
KHÁC NHƯ XÁC ĐỊNH CỤ THỂ TRONG PHÁN QUYẾT CHUNG THẨM CỦA TÒA ÁN CÓ THẨM QUYỀN.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">20.4&nbsp;KHÔNG CÓ NỘI DUNG NÀO TRONG ĐIỀU KHOẢN
DỊCH VỤ NÀY SẼ GIỚI HẠN HOẶC LOẠI TRỪ BẤT KỲ TRÁCH NHIỆM NÀO ĐỐI VỚI THƯƠNG
VONG HOẶC TAI NẠN CÁ NHÂN DO SỰ BẤT CẨN, GIAN LẬN CỦA Chợ Sách HOẶC BẤT KỲ TRÁCH
NHIỆM NÀO KHÁC CÓ PHẦN THAM GIA CỦA Chợ Sách MÀ TRÁCH NHIỆM ĐÓ KHÔNG ĐƯỢC HẠN CHẾ
VÀ/HOẶC LOẠI TRỪ THEO QUY ĐỊNH PHÁP LUẬT.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">1</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LIÊN KẾT VỚI TRANG ĐIỆN
TỬ CỦA BÊN THỨ </span></b><b><span style="color:#000000;">BA</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Các đường dẫn của bên thứ ba có trên Trang Chợ Sách
sẽ khiến Người Sử Dụng thoát khỏi Trang Chợ Sách. &nbsp;Các đường dẫn này được cung cấp mang tính chất
xã giao, và các trang điện tử truy cập từ các đường dẫn này không thuộc sự kiểm
soát của Chợ Sách dưới bất kỳ hình thức nào và vì thế bạn phải tự chịu các rủi ro
khi truy cập vào những trang điện tử này.&nbsp;
Chợ Sách dù bất kỳ hình thức nào, không chịu trách nhiệm đối với những nội
dung của bất kỳ trang điện tử nào được dẫn truyền hoặc bất kỳ đường dẫn nào
trên những trang điện tử đó.&nbsp; Chợ Sách cung
cấp các đường dẫn này đơn thuần để tạo sự thuận lợi, và việc có bao gồm đường
dẫn bất kỳ sẽ không, dù bất kỳ hình thức nào, hàm ý hoặc thể hiện việc liên
kết, xác nhận hoặc bảo trợ của Chợ Sách đối với bất kỳ trang điện tử được liên
kết nào và/hoặc bất kỳ nội dùn nào trong đó.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ĐÓNG GÓP CỦA NGƯỜI SỬ
DỤNG ĐỐI VỚI DỊCH VỤ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">22.1 &nbsp;&nbsp;&nbsp; Khi
gửi bất kỳ Nội Dung nào cho Chợ Sách, bạn khẳng định và bảo đảm rằng bạn đã có
đầy đủ tất cả các quyền và/hoặc các chấp thuận cần thiết để cấp các quyền dưới
đây cho Chợ Sách. &nbsp;Bạn cũng thừa nhận và
đồng ý rằng bạn là người chịu trách nhiệm duy nhất đối với bất cứ nội dung gì
bạn đăng tải hoặc tạo sẵn trên hoặc qua Dịch Vụ, bao gồm nhưng không giới hạn
trách nhiệm về độ chính xác, độ tin cậy, tính nguyên bản, rõ ràng các quyền, tính
tuân thủ pháp luật và các giới hạn pháp lý liên quan đến bất kỳ Nội Dung đóng
góp nào. &nbsp;Người Sử Dụng theo đây cấp
quyền cho Chợ Sách và các bên kế thừa của Chợ Sách, một cách liên tục, không hủy
ngang, mang tính toàn cầu, không độc quyền, không tiền bản quyền, có thể cấp
quyền lại và có thể chuyển giao, quyền sử dụng, sao chép, phân phối, tái bản, chuyển
giao, thay đổi, chỉnh sửa, tạo các sản phẩm phái sinh từ, thể hiện công khai,
và thực hiện Nội Dung đóng góp đó, thông qua hoặc liên quan đến Dịch Vụ dưới
bất kỳ phương tiện truyền thông nào và thông qua bất kỳ kênh truyền thông nào,
bao gồm nhưng không giới hạn, cho mục đích khuyến mãi hoặc phân phối lại một
phần Dịch Vụ (hoặc các sản phẩm phái sinh của Dịch Vụ). &nbsp;Quyền mà bạn trao cho chúng tôi chỉ chấm dứt
khi bạn hoặc Chợ Sách loại bỏ Nội Dung đóng góp ra khỏi Dịch Vụ. &nbsp;Bạn hiểu rằng sự đóng góp của bạn có thể được
chuyển giao sang nhiều hệ thống khác nhau và được thay đổi để phù hợp và đáp
ứng các yêu cầu về kỹ thuật.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">22.2 &nbsp;&nbsp;&nbsp; Bất
kỳ tài liệu, thông tin hoặc ý tưởng nào Người Sử Dụng đăng tải hoặc thông qua
Dịch Vụ, hoặc bằng cách khác chuyển giao cho Chợ Sách dưới bất kỳ hình thức nào
(mỗi hình thức được gọi là “Nội Dung Gửi”), sẽ không được bảo mật bởi Chợ Sách và
có thể được phổ biến hoặc sử dụng bởi Chợ Sách hoặc các công ty liên kết mà không
phải trả phí hoặc chịu trách nhiệm với Người Sử Dụng, để phục vụ bất kỳ mục
đích nào, bao gồm nhưng không giới hạn, việc phát triển, sản suất và quảng bá sản
phẩm.&nbsp; Khi thực hiện Nội Dung Gửi &nbsp;đến Chợ Sách, bạn thừa nhận và đồng ý rằng
Chợ Sách và/hoặc các bên thứ ba có thể độc lập phát triển các phần mềm, ứng dụng, giao diện, sản
phẩm và chỉnh sửa và nâng cấp các phần mềm, ứng dụng, giao diện, sản phẩm mà
chúng đồng nhất hoặc tương tự với các ý tưởng được nêu trong Nội Dung Gửi của
bạn về chức năng, mã hoặc các đặc tính khác. &nbsp;Vì vậy, bạn theo đây trao cho Chợ Sách và các
bên kế thừa của Chợ Sách, một cách liên tục, không hủy ngang, mang tính toàn cầu,
không độc quyền, không tiền bản quyền, có thể cấp quyền lại và có thể chuyển
giao, quyền sử dụng, sao chép, phân phối, tái bản, chuyển giao, thay đổi, chỉnh
sửa, tạo các sản phẩm phái sinh từ, thể hiện công khai, và thực hiện Nội Dung
Gửi đó, thông qua hoặc liên quan đến Nội Dung Gửi dưới bất kỳ phương tiện
truyền thông nào và thông qua bất kỳ kênh truyền thông nào, bao gồm nhưng không
giới hạn, cho mục đích khuyến mãi hoặc phân phối lại một phần Dịch Vụ (hoặc các
sản phẩm phái sinh của Dịch Vụ).&nbsp; Điều
khoản này không áp dụng đối với các thông tin cá nhân là đối tượng của chính sách
bảo mật của Chợ Sách trừ khi bạn công khai những thông tin đó trên hoặc thông qua
Dịch Vụ.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">3</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ĐÓNG GÓP CỦA BÊN THỨ
BA ĐỐI VỚI DỊCH VỤ VÀ CÁC ĐƯỜNG DẪN BÊN NGOÀI</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">23.1 &nbsp;&nbsp;&nbsp; Mỗi
một bên đóng góp cho Dịch Vụ về dữ liệu, tin nhắn, hình ảnh, âm thanh, video,
phần mềm và Nội Dung khác, sẽ chịu trách nhiệm về độ chính xác, độ tin cậy,
tính nguyên bản, rõ ràng các quyền, tính tuân thủ pháp luật và các giới hạn
pháp lý liên quan đến bất kỳ Nội Dung đóng góp nào.&nbsp; Như vậy, Chợ Sách không chịu trách nhiệm, và
cũng không phải, thường xuyên giám sát hoặc kiểm tra độ chính xác, độ tin cậy,
tính nguyên bản, rõ ràng các quyền, tính tuân thủ pháp luật và các giới hạn
pháp lý liên quan đến bất kỳ Nội Dung đóng góp nào.&nbsp; Người Sử Dụng không buộc Chợ Sách phải chịu
trách nhiệm đối với bất kỳ các hoạt động hoặc không hoạt động nào của Người Sử
Dụng, bao gồm nhưng không giới hạn, các vấn đề họ đăng tải hoặc bằng cách khác
tạo sẵn qua Dịch Vụ.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">23.2 &nbsp;&nbsp;&nbsp; Ngoài
ra, Trang Chợ Sách có thể chứa các đường dẫn tới sản phẩm, website, dịch vụ và
các mời chào của bên thứ ba. &nbsp;Những đường
dẫn, sản phẩm, websites, dịch vụ và các mời chào của bên thứ ba này không thuộc
sở hữu và quản lý của Chợ Sách.&nbsp; Thực tế,
các sản phẩm, website, dịch vụ và các mời chào đó được thực hiện bởi, và là tài
sản của bên thứ ba tương ứng, và được bảo vệ bởi luật pháp và các điều ước về
bản quyền hoặc quyền sở hữu trí tuệ khác. &nbsp;Chợ Sách không xem xét, và không có trách nhiệm
đối với những nội dung, chức năng, độ an toàn, dịch vụ, các chính sách bảo mật,
hoặc các hoạt động khác của những bên thứ ba này. &nbsp;Chợ Sách khuyến khích Người Sử Dụng tìm hiểu các
điều khoản và các chính sách khác được niêm yết bởi bên thứ ba trên các website
hoặc phương tiện khác của họ. &nbsp;Bằng việc sử
dụng Dịch Vụ, bạn thừa nhận rằng Chợ Sách không chịu trách nhiệm dưới bất kỳ hình
thức nào do việc bạn sử dụng, hoặc không thể sử dụng được bất kỳ website hoặc
các widget nào. &nbsp;Ngoài ra bạn thừa nhận
và đồng ý rằng Chợ Sách có thể vô hiệu hóa việc sử dụng của bạn, hoặc gỡ bỏ, bất
kỳ các đường dẫn của bên thứ ba nào, hoặc các ứng dụng trên Dịch Vụ trong giới
hạn bên thứ ba vi phạm các Điều Khoản Dịch Vụ này.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">4</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KHẲNG ĐỊNH VÀ ĐẢM BẢO
CỦA NGƯỜI SỬ DỤNG</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;text-indent:.5in;background:white;">
	<span style="color:#000000;">Người Sử Dụng khẳng định và đảm bảo rằng:</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(a)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Người Sử Dụng sở hữu năng lực, (và đối với trường
hợp vị thành niên, có sự đồng ý hợp lệ từ cha mẹ hoặc người giám hộ hợp pháp),
quyền và khả năng hợp pháp để giao kết các Điều Khoản Dịch Vụ này và để tuân
thủ các điều khoản theo đó; và</span> 
</p>
<p class="MsoNormal" style="margin-left:1.0in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">(b)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Người Sử Dụng chỉ sử dụng Dịch Vụ cho các
mục đích hợp pháp và theo quy định của các Điều Khoản Dịch Vụ này cũng như tất
cả các luật, quy tắc, quy chuẩn, chỉ thị, hướng dẫn, chính sách và quy định áp
dụng.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">5</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BỒI THƯỜNG</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Bạn đồng ý bồi thường, bảo vệ và không gây hại
cho Chợ Sách, các cổ đông, công ty con, công ty liên kết, giám đốc, viên chức, đại
lý, đồng sở hữu thương hiệu hoặc đối tác, và nhân viên của Chợ Sách (gọi chung là
“Bên Được Bồi Thường”) liên quan đến hoặc đối với bất kỳ và tất cả khiếu nại,
hành động, thủ tục tố tụng, và các vụ kiện cũng như tất cả nghĩa vụ, tổn thất, thanh
toán, khoản phạt, tiền phạt, chi phí và phí tổn có liên quan (bao gồm, nhưng
không giới hạn, bất kỳ chi phí giải quyết tranh chấp nào khác) do bất kỳ Bên
Được Bồi Thường nào ghánh chịu, phát sinh từ hoặc có liên quan đến (a) bất kỳ
giao dịch nào được thực hiện trên Trang Chợ Sách, hoặc bất kỳ tranh chấp nào liên
quan đến giao dịch đó (trừ trường hợp Chợ Sách hoặc các công ty liên kết của
Chợ Sách là Người Bán đối với giao dịch liên quan đến khiếu nại), (b) Chính Sách Đảm
Bảo của Chợ Sách, (c) việc tổ chức, hoạt động, quản trị và/hoặc điều hành các
Dịch Vụ được thực hiện bởi hoặc đại diện cho Chợ Sách, (d) vi phạm hoặc không
tuân thủ bất kỳ điều khoản nào trong các Điều Khoản Dịch Vụ này hoặc bất kỳ
chính sách hoặc hướng dẫn nào được tham chiếu theo đây, (e) việc bạn sử dụng
hoặc sử dụng không đúng Dịch Vụ, hoặc (f) vi phạm của bạn đối với bất kỳ luật
hoặc bất kỳ các quyền của bên thứ ba nào.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">6</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TÍNH RIÊNG LẺ</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Nếu bất kì điều khoản nào trong Điều Khoản Dịch
Vụ này không hợp pháp, bị bãi bỏ, hoặc vì bất kỳ lý do nào không thể thực thi
theo pháp luật, thì điều khoản đó sẽ được tách ra khỏi các điều khoản và điều
kiện này và sẽ không ảnh hưởng tới hiệu lực cũng như tính thi hành của bất kỳ điều
khoản còn lại nào cũng như không ảnh hưởng tới hiệu lực cũng như tính thi hành
của điều khoản sẽ được xem xét theo luật.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">7</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LUẬT ÁP DỤNG</span></b> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;background:white;">
	<span style="color:#000000;">Các Điều Khoản Dịch Vụ này sẽ được điều chỉnh
bởi và diễn giải theo luật pháp của Việt Nam. &nbsp;Bất kỳ tranh chấp, tranh cãi, khiếu nại hoặc
sự bất đồng dưới bất cứ hình thức nào phát sinh từ hoặc liên quan đến các Điều
Khoản Dịch Vụ này chống lại hoặc liên quan đến Chợ Sách hoặc bất kỳ Bên Được Bồi
Thường nào thuộc đối tượng của các Điều Khoản Dịch Vụ này sẽ được giải quyết
bằng Trung Tâm Trọng Tài Quốc Tế Việt Nam (VIAC). &nbsp;Ngôn ngữ phán xử của trọng tài là Tiếng Việt.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">&nbsp;</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<b><span style="color:#000000;">2</span></b><b><span style="color:#000000;">8</span></b><b><span style="color:#000000;">. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; QUY ĐỊNH CHUNG</span></b> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">28.1 &nbsp;&nbsp;&nbsp; Chợ Sách
bảo lưu tất cả các quyền lợi không được trao theo đây.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.2. &nbsp;&nbsp; Chợ Sách
có quyền chỉnh sửa các Điều Khoản Dịch Vụ này vào bất cứ thời điểm nào thông
qua việc đăng tải các Điều Khoản Dịch Vụ được chỉnh sửa lên Trang Chợ Sách. &nbsp;Việc Người Dùng tiếp tục sử dụng Trang Chợ Sách sau
khi việc thay đổi được đăng tải sẽ cấu thành việc Người Sử Dụng chấp nhận các
Điều Khoản Dịch Vụ được chỉnh sửa.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.3. &nbsp;&nbsp; Người
Sử Dụng không được phép chuyển giao, cấp lại quyền hoặc chuyển nhượng bất kỳ
các quyền hoặc nghĩa vụ được cấp cho Người Sử Dụng theo đây.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.4. &nbsp;&nbsp; Không
một quy định nào trong các Điều Khoản Dịch Vụ này sẽ cấu thành quan hệ đối tác,
liên doanh hoặc quan hệ đại lý – chủ sở hữu giữa bạn và Chợ Sách.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.5.&nbsp;&nbsp;&nbsp; Tại bất kỳ hoặc các thời điểm nào, nếu
Chợ Sách không thể thực hiện được bất kỳ điều khoản nào theo đây sẽ không ảnh
hưởng, dưới bất kỳ hình thức nào, đến các quyền của Chợ Sách vào thời điểm sau đó
để thực thi các quyền này trừ khi việc thư thi các quyền này được miễn trừ bằng
văn bản.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.6. &nbsp;&nbsp; Các
Điều Khoản Dịch Vụ này hoàn toàn phục vụ cho lợi ích của Chợ Sách và Người Sử
Dụng mà vì lợi ích của bất kỳ cá nhân hay tổ chức nào khác, trừ các công ty
liên kết và các công ty con của Chợ Sách (và cho từng bên kế thừa hay bên nhận
chuyển giao của Chợ Sách hoặc của các công ty liên kết và công ty con của Chợ Sách).</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.7 &nbsp;&nbsp;&nbsp; Các
điều khoản được quy định trong Điều Khoản Dịch Vụ này và bất kỳ các thỏa thuận
và chính sách được bao gồm hoặc được dẫn chiếu trong các Điều Khoản Dịch Vụ này
cấu thành nên sự thỏa thuận và cách hiểu tổng thể của các bên đối với Dịch Vụ
và Trang Chợ Sách và thay thế bất kỳ thỏa thuận hoặc cách hiểu trước đây giữa các
bên liên quan đến vấn đề đó.&nbsp;&nbsp; Với việc
các bên giao kết thỏa thuận được tạo thành theo các Điều Khoản Dịch Vụ này, các
bên không dựa vào bất kỳ tuyên bố, khẳng định, đảm bảo, cách hiểu, cam kết, lời
hứa hoặc cam đoan nào của bất kỳ người nào trừ những điều được nêu rõ trong các
Điều Khoản Dịch Vụ này. &nbsp;Các Điều Khoản
Dịch Vụ này có thể sẽ không mâu thuẫn, giải thích hoặc bổ sung như là bằng
chứng của các thỏa thuận trước, bất kỳ thỏa thuận miệng hiện tại nào hoặc bất
kỳ các điều khoản bổ sung nhất quán nào.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.8.&nbsp; &nbsp; Bạn
đồng ý tuân tủ mọi quy định pháp luật hiện hành liên quan đến chống tham nhũng
và chống hối lộ.</span> 
</p>
<p class="MsoNormal" style="margin-left:.5in;text-align:justify;text-indent:-.5in;background:white;">
	<span style="color:#000000;">28.9. &nbsp;&nbsp; Nếu
bạn có bất kỳ câu hỏi hay thắc mắc nào liên quan đến Điều Khoản Dịch Vụ hoặc
các vấn đề phát sinh liên quan đến Điều Khoản Dịch Vụ trên Trang Chợ Sách, vui
lòng liên hệ Chợ Sách&nbsp;<strong><a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank">tại đây</a>.</strong></span><span style="color:#000000;"></span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">THÔNG
BÁO PHÁP LÝ: Xin vui lòng gửi tất cả các thông báo pháp lý đến Chợ Sách&nbsp;<a href="https://help.Chợ Sách.vn/vn/s/contactus" target="_blank"><strong>tại đây</strong></a></span><span><a href="mailto:support@Chợ Sách.vn"><span style="color:#000000;"></span></a></span><span style="color:#000000;">&nbsp;– Người nhận: Vietnam Legal Team.</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">&nbsp;</span> 
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">TÔI
ĐÃ ĐỌC CÁC ĐIỀU KHOẢN DỊCH VỤ NÀY VÀ ĐỒNG Ý VỚI TẤT CẢ CÁC ĐIỀU KHOẢN NHƯ TRÊN
CŨNG NHƯ BẤT KỲ ĐIỀU KHOẢN NÀO ĐƯỢC CHỈNH SỬA SAU NÀY. &nbsp;BẰNG CÁCH BẤM NÚT “ĐĂNG KÝ” HOẶC “ĐĂNG KÝ QUA
FACEBOOK” BÊN DƯỚI, TÔI HIỂU RẰNG TÔI ĐANG TẠO CHỮ KÝ ĐIỆN TỬ MÀ TÔI HIỂU RẰNG
NÓ CÓ GIÁ TRỊ VÀ HIỆU LỰC TƯƠNG TỰ NHƯ CHỮ KÝ TÔI KÝ BẰNG TAY.</span>
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;"><br>
</span>
</p>
<p class="MsoNormal" style="text-align:justify;background:white;">
	<span style="color:#000000;">Cập nhật lần cuối ngày: 14 tháng 2 năm 2019<br>
</span>
</p>
<p>
	<br>
</p>
<p>
	<br>
</p>
    </div>

	<!-- footer-area-start -->
	<footer>
            @include('components.footer')
	</footer>
	<!-- footer-area-end -->
        @include('components.getjs')


</body>