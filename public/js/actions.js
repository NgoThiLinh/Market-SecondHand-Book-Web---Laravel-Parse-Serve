var preloader_ = document.getElementById("preloader");

$(document).ready(function(){
    var server = 'http://localhost:8000';

    $('#city').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr("id");
            var value =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var selected = $(this).find('option:selected');
            var code = selected.data('code'); 

        $.ajax({
            url:"/getDistric",
            method:"POST",
            data:{
                select: select,
                value: value,
                code: code,
                _token: _token	
            },
            success:function(data)
            {
                var locationcode = data.code;
                $.getJSON(server+'/location', function(data) {
                    var object_data = data[locationcode];
                    var re_data = object_data['quan_huyen'];
                    var select = document.getElementById('distric');

                    resetProvince();
                    var count = 0;
                    for (var k in re_data) {
                        if (re_data.hasOwnProperty(k)) {
                        var opt = document.createElement('option');
                        opt.value = Object.values(re_data)[count]['name'];
                        opt.innerHTML = Object.values(re_data)[count]['name'];
                        opt.setAttribute("data-code",Object.values(re_data)[count]['code']);
                        select.appendChild(opt);
                        ++count;
                        }
                    }
                });
            },
            error: function(data, textStatus, errorThrown) {
                console.log('Some thing went wrong');
            }
        })
        }
    });

    $('#city-dev').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr("id");
            var value =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var selected = $(this).find('option:selected');
            var code = selected.data('code'); 

        $.ajax({
            url:"/getDistric",
            method:"POST",
            data:{
                select: select,
                value: value,
                code: code,
                _token: _token	
            },
            success:function(data)
            {
                var locationcode = data.code;
                $.getJSON(server+'/location', function(data) {
                    var object_data = data[locationcode];
                    var re_data = object_data['quan_huyen'];
                    var select = document.getElementById('distric-dev');

                    resetProvinceDEV();
                    var count = 0;
                    for (var k in re_data) {
                        if (re_data.hasOwnProperty(k)) {
                        var opt = document.createElement('option');
                        opt.value = Object.values(re_data)[count]['name'];
                        opt.innerHTML = Object.values(re_data)[count]['name'];
                        opt.setAttribute("data-code",Object.values(re_data)[count]['code']);
                        select.appendChild(opt);
                        ++count;
                        }
                    }
                });
            },
            error: function(data, textStatus, errorThrown) {
                console.log('Some thing went wrong');
            }
        })
        }
    });

    $('#remove').click(function(){
        data_images = [];
        $("#image-uploaded").empty();
    });

    $('#updateCart_').click(function(){
        timer();
    });

   

    $('#checkout-coupon-submit').click(function(){
        var coupon = $('#dev-coupon').val();
        if(coupon == "cunguyendev"){
            $('meta[name=notification]').attr('content', 'info');
            $('meta[name=notification]').attr('title', 'Thông báo - Notification');
            $('meta[name=notification]').attr('noticontent', 'Chức năng này tạm thời đang bảo trì. Vui lòng thử lại sau. (Temporary functionality is under maintenance, please come back later.)');
            $('meta[name=notification]').attr('icon', '#007bff');
        }else{
            $('meta[name=notification]').attr('content', 'info');
            $('meta[name=notification]').attr('title', 'Thông báo - Notification');
            $('meta[name=notification]').attr('noticontent', 'Mã khuyến mãi không hợp lệ. Vui lòng kiểm tra và thử lại. (Your promotion code is invalid. Please check and try again)');
            $('meta[name=notification]').attr('icon', '#007bff');
        }
    });

    $('#forget-email-submit').click(function(){
        preloader_.style.display = "block";
        var forgotEmailReset = $('#dev-email').val();
        var forget_email_data = $("#check-forget-email").hasClass("success");
        var _token = $('input[name="_token"]').val();
        if(forgotEmailReset == ""){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng nhập email của bạn. (Please enter your email.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("dev-email", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(forget_email_data == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Email không hợp lệ. Vui lòng kiểm tra và thử lại. (Email invalid. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("dev-email", "boder-color-dis");
            preloader_.style.display = "none";
        }else{
            devRemoveClass("dev-email", "boder-color-dis");
            $.ajax({
                url:"resetPassword",
                method:"POST",
                data:{
                    forgotEmailReset: forgotEmailReset,
                    _token: _token	
                },
                success:function(data)
                {
                    console.log(data);
                    if(data=='success'){
                        $('meta[name=notification]').attr('content', 'success');
                        $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                        $('meta[name=notification]').attr('noticontent', 'Một email khôi phục đã được gửi vào hộp thư của bạn. Vui lòng kiểm tra hộp thư của bạn nhé. (A recovery email has been sent to your inbox. Please check your inbox.)');
                        $('meta[name=notification]').attr('icon', '#008000');
                        preloader_.style.display = "none";
                    }else if(data=='failed'){
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Yêu cầu của bạn không được thực hiện. Chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất. (Your request was not made. We will respond to you as soon as possible.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }else{
                        $('#signup-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Location error. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    $('meta[name=notification]').attr('content', 'error');
                    $('meta[name=notification]').attr('title', 'Lỗi - Error');
                    $('meta[name=notification]').attr('noticontent', 'Đã xãy ra lỗi. Vui lòng kiểm tra và thử lại. (Something went wrong. Please check and try again.)');
                    $('meta[name=notification]').attr('icon', '#FF0000');
                    preloader_.style.display = "none";
                }
            })
        }
    });

    $("#cart-mini-dropdown").hover(function(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"getCartData",
            method:"POST",
            data:{
                _token: _token	
            },
            success:function(data)
            {
                var total = 0;
                if(!(data == "false")){
                    for (var i = 0; i < data.length; i++) { 
                        if(data[i]["title"] != "brighten"){
                            var index = data.indexOf(data[i]);
                            var element = "<div class='single-cart'><div class='cart-img'><a href='#'><img src='"+data[i]["images"][0]+"' alt='book'/></a></div><div class='cart-info'><h5><a>"+data[i]["title"]+"</a></h5><span class='item-price'>"+data[i]["promotionPrice"]+"đ</span><span class='item-quantity'> x "+data[i]["quanlity"]+"</span> </div> <div class='cart-icon'> <a><i class='fa fa-remove btn btn-danger' onclick='removeItemInCart("+index+")'></i></a> </div></div>";
                            document.getElementById('item-list').innerHTML += element;
                            var price = parseInt(data[i]["promotionPrice"], 10) * parseInt(data[i]["quanlity"], 10);
                            total += price;
                        }
                    }
                    $("#total-price").text(total+" đ");
                }
            },
            error: function(data, textStatus, errorThrown) {
                
            }
        })
        
        }, function(){
            $("#item-list").empty();
      });

    $('#register').click(function(){
        preloader_.style.display = "block";
        var yourName = $('#yourName').val();
        var phone = $('#phone').val();
        var emailAddress = $('#emailAddress').val();
        var password = $('#password').val();
        var ConfirmPassword = $('#ConfirmPassword').val();
        var agree = document.querySelector('#agree').checked;
        var _token = $('input[name="_token"]').val();
        var city = document.getElementById('city').value;
        var distric = document.getElementById('distric').value;
        var commune = document.getElementById('commune').value;
        var email_data = $("#email-data").hasClass("success");
        var phone_data = $("#phone-data").hasClass("success");

        if(yourName == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Tên của bạn trống. Vui lòng kiểm tra và thử lại. (Your name is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("yourName", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(city == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Thành phố/tỉnh trống. Vui lòng kiểm tra và thử lại. (Province is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("city", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(distric == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Quận/huyện trống. (Distric is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("distric", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(commune == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Xã/phường trống. Vui lòng kiểm tra và thử lại. (Commune is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("commune", "boder-color-dis");
            preloader_.style.display = "none";
        }
        else if(phone == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Số điện thoại trống. Vui lòng kiểm tra vả thử lại. (Phone is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("phone", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(phone_data == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Số điện thoại không hợp lệ. Vui lòng kiểm tra và thử lại. (Invalid phone number. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("phone", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(emailAddress == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Địa chỉ email trống. Vui lòng kiểm tra và thử lại. (Email address is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("emailAddress", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(email_data == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Email không hợp lệ. Vui lòng kiểm tra và thử lại. (Invalid email. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("emailAddress", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(password == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Mật khẩu trống. Vui lòng kiểm tra và thử lại. (Password is empty. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("password", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(ConfirmPassword == ''){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Xác thực mật khẩu của bạn. Vui lòng kiểm tra và thử lại. (Verify your password error. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ConfirmPassword", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(password != ConfirmPassword){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Xác thực mật khẩu không đúng. Vui lòng kiểm tra và thử lại. (Verify password incorrect. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ConfirmPassword", "dev-boder-bottom");
            preloader_.style.display = "none";
        }else if(agree == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Chắc chắn bạn đã đồng ý với điều khoản của chúng tôi? Vui lòng kiểm tra và thử lại. (Are you agree about our provision. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("agree-lb", "dev-boder-bottom");
            preloader_.style.display = "none";
        }
        else{
            var address = commune+", "+distric+", "+city
            $.ajax({
                url:"register",
                method:"POST",
                data:{
                    yourName : yourName,
                    address : address,
                    phone : phone,
                    emailAddress : emailAddress,                    
                    password : password,
                    _token : _token
                },
                success:function(data)
                {
                    if(data=='success'){
                        document.getElementById("yourName").value = "";
                        document.getElementById("phone").value = "";
                        document.getElementById("emailAddress").value = "";
                        document.getElementById("password").value = "";
                        document.getElementById("ConfirmPassword").value = "";
                        $('#city').prop('selectedIndex',0);
                        $('#distric').prop('selectedIndex',0);
                        $('#commune').prop('selectedIndex',0);
                        $('#signup-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'success');
                        $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                        $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đăng kí thành công. Đăng nhập để tiếp tục sử dụng dịch vụ. (Your request has been processed. Register successfully. Log in to continue using the service)');
                        $('meta[name=notification]').attr('icon', '#008000');
                        preloader_.style.display = "none";
                        location.reload();
                    }else if(data=='failed'){
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Một số dữ liệu không chấp nhận. Vui lòng kiểm tra và thử lại. (Some data can not accept. Please check and try again.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }else{
                        $('#signup-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Location error. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    $('meta[name=notification]').attr('content', 'error');
                    $('meta[name=notification]').attr('title', 'Lỗi - Error');
                    $('meta[name=notification]').attr('noticontent', 'Đã xãy ra lỗi. Vui lòng kiểm tra và thử lại. (Something went wrong. Please check and try again.)');
                    $('meta[name=notification]').attr('icon', '#FF0000');
                    preloader_.style.display = "none";
                }
            })
        }


        if(!yourName == ''){
            devRemoveClass("yourName", "boder-color-dis");
        }
        if(!city == ''){
            devRemoveClass("city", "boder-color-dis");
        }
        if(!distric == ''){
            devRemoveClass("distric", "boder-color-dis");
        }
        if(!commune == ''){
            devRemoveClass("commune", "boder-color-dis");
        }
        if(!phone == ''){
            devRemoveClass("phone", "boder-color-dis");
        }
        if(!emailAddress == ''){
            devRemoveClass("emailAddress", "boder-color-dis");
        }
        if(!password == ''){
            devRemoveClass("password", "boder-color-dis");
        }
        if(!ConfirmPassword == ''){
            devRemoveClass("ConfirmPassword", "boder-color-dis");
        }
        if(agree == true){
            devRemoveClass("agree-lb", "dev-boder-bottom");
        }


    });

    $('#upload').click(function(){
        if($(this).val() != ''){
            var bookName = $('#bookName').val();
            var bookPrice = $('#bookPrice').val();
            var bookDiscount = $('#bookDiscount').val();
            var description = $('#description').val();
            var category = $('#category').val();
            var bookNumber = $('#bookNumber').val();
            var number_of_elements = countElements(document.getElementById('image-uploaded'), false);
            var _token = $('input[name="_token"]').val();

            if (bookName == '') {
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("bookName", "boder-color-dis");
            }else if(bookPrice == ''){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("bookPrice", "boder-color-dis");
            }else if(bookDiscount == ''){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("bookDiscount", "boder-color-dis");
            }else if(description == ''){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("description", "boder-color-dis");
            }else if(category == ''){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("category", "boder-color-dis");
            }else if(bookNumber == ''){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Các trường là bắt buộc. Vui lòng kiểm tra và thử lại. (All fields are required. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("bookNumber", "boder-color-dis");
            }else if(number_of_elements < 1){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Hãy có ít một hình ảnh cho sản phẩm của bạn. Vui lòng kiểm tra và thử lại. (at least one image for your product. Please check and try again.)');
                $('meta[name=notification]').attr('icon', '#ffa500');
                devAddClass("dropzone", "boder-color-dis");
            } else{
                preloader_.style.display = "block";

                $.ajax({
                    url:"/uploadToServer",
                    method:"POST",
                    data:{
                        bookName : bookName,
                        bookPrice : bookPrice,
                        bookDiscount : bookDiscount,
                        description : description,
                        category : category,
                        bookNumber : bookNumber,
                        data_images : data_images,
                        _token : _token
                    },
                    success:function(data)
                    {
                        if(data=='success'){
                            $('meta[name=notification]').attr('content', 'success');
                            $('meta[name=notification]').attr('title', 'Thành công - Successfully');
                            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Nhập dữ liệu thành công');
                            $('meta[name=notification]').attr('icon', '#008000');
                            data_images = [];
                            $("#image-uploaded").empty();
                            document.getElementById("bookName").value = "";
                            document.getElementById("bookPrice").value = "";
                            document.getElementById("description").value = "";
                            document.getElementById("bookNumber").value = "";
                            $('#category').prop('selectedIndex',0);
                            preloader_.style.display = "none";
                        }else{
                            $('meta[name=notification]').attr('content', 'error');
                            $('meta[name=notification]').attr('title', 'Lỗi - Error');
                            $('meta[name=notification]').attr('noticontent', 'Đã xãy ra lỗi. Vui lòng kiểm tra và thử lại. (Something went wrong. Please check and try again.)');
                            $('meta[name=notification]').attr('icon', '#FF0000');
                            preloader_.style.display = "none";
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Đã xãy ra lỗi. Vui lòng kiểm tra và thử lại. (Something went wrong. Please check and try again.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }
                })
            }
            
            if(!bookName == ''){
                devRemoveClass("bookName", "boder-color-dis");
            }
            if(!bookPrice == ''){
                devRemoveClass("bookPrice", "boder-color-dis");
            }
            if(!bookDiscount == ''){
                devRemoveClass("bookDiscount", "boder-color-dis");
            }
            if(!description == ''){
                devRemoveClass("description", "boder-color-dis");
            }
            if(!category == ''){
                devRemoveClass("category", "boder-color-dis");
            }
            if(!bookNumber == ''){
                devRemoveClass("bookNumber", "boder-color-dis");
            }
            if(number_of_elements > 0){
                devRemoveClass("dropzone", "boder-color-dis");
            }
        }
    });

    $('#user-login').click(function(){
        var userName = document.getElementById("userName").value;
        var userPassword = document.getElementById("userPassword").value;
        var _token = $('input[name="_token"]').val();
        var c_ = $('input[name="c_"]').val();

        if(userName == ""){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng nhập tên đăng nhập hoặc email (Please enter username or email)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("userName", "boder-color-dis");
        }else if(userPassword == ""){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng nhập mật khẩu (Please enter password)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("userPassword", "boder-color-dis");
        }else{
            preloader_.style.display = "block";
            $.ajax({
                url:"/clientLogin",
                method:"POST",
                data:{
                    userName : userName,
                    userPassword : userPassword,
                    _token : _token
                },
                success:function(data)
                {
                    if(data=='success'){
                        document.getElementById("userName").value = "";
                        document.getElementById("userPassword").value = "";
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'success');
                        $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                        $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đăng nhập thành công. (Your request has been processed. Login successfully.)');
                        $('meta[name=notification]').attr('icon', '#008000');
                        sessionStorage.setItem("_token", "cunguyendev-token");
                        preloader_.style.display = "none";
                        if(c_ != "null"){
                            window.location = c_;
                        }else{
                            location.reload();
                        }
                    }else if(data=='failed'){
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Tên đăng/email hoặc mật khẩu không đúng. Vui lòng kiểm tra và thử lại. (Username/email or password is not correct. Please check and try again.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }else{
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi trong quá trình đăng nhập cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Error during local login process. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    $('meta[name=notification]').attr('content', 'error');
                    $('meta[name=notification]').attr('title', 'Lỗi - Error');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi máy chủ cục bộ. (Internal Server Error.)');
                    $('meta[name=notification]').attr('icon', '#FF0000');
                    preloader_.style.display = "none";
                }
            })
        }

        if(!userName == ''){
            devRemoveClass("userName", "boder-color-dis");
        }
        if(!userPassword == ''){
            devRemoveClass("userPassword", "boder-color-dis");
        }
    });

    $('#distric').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr("id");
            var value =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var selected = $(this).find('option:selected');
            var code = selected.data('code');

            $.getJSON(server+'/location/distric', function(data) {
                var _api_return = data[code].parent_code;
                    $.getJSON(server+'/location/'+_api_return+'/'+code, function(data) {
                        var select = document.getElementById('commune');
                        resetCommune();
                        var count = 0;
                        for (var k in data) {
                            if (data.hasOwnProperty(k)) {
                                var opt = document.createElement('option');
                                opt.value = Object.values(data)[count]['name'];
                                opt.innerHTML = Object.values(data)[count]['name'];
                                opt.setAttribute("data-code",Object.values(data)[count]['code']);
                                select.appendChild(opt);
                            ++count;
                            }
                        } 
                    });
            });
            
        }
    });

    $('#distric-dev').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr("id");
            var value =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var selected = $(this).find('option:selected');
            var code = selected.data('code');

            $.getJSON(server+'/location/distric', function(data) {
                var _api_return = data[code].parent_code;
                    $.getJSON(server+'/location/'+_api_return+'/'+code, function(data) {
                        var select = document.getElementById('commune-dev');
                        resetCommuneDEV();
                        var count = 0;
                        for (var k in data) {
                            if (data.hasOwnProperty(k)) {
                                var opt = document.createElement('option');
                                opt.value = Object.values(data)[count]['name'];
                                opt.innerHTML = Object.values(data)[count]['name'];
                                opt.setAttribute("data-code",Object.values(data)[count]['code']);
                                select.appendChild(opt);
                            ++count;
                            }
                        } 
                    });
            });
            
        }
    });

    $('#btncontact').click(function(e) {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;
        var _token = $('input[name="_token"]').val();
        if(name == "" ){
            devAddClass("name", "boder-color-dis");
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin đầy đủ và chính xác');
            $('meta[name=notification]').attr('icon', '#ffa500');
        }
        else if(email ==""){
            devAddClass("email", "boder-color-dis");
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin đầy đủ và chính xác');
            $('meta[name=notification]').attr('icon', '#ffa500');
        }
        else if(subject ==""){
            devAddClass("subject", "boder-color-dis");
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin đầy đủ và chính xác');
            $('meta[name=notification]').attr('icon', '#ffa500');
        }
        else if(message ==""){
            devAddClass("message", "boder-color-dis");
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin đầy đủ và chính xác');
            $('meta[name=notification]').attr('icon', '#ffa500');
        }else{
        $.ajax({
            url:"/contact",
            method:"POST",
            data:{
                name: name,
                email: email,
                subject:subject,
                message:message,
                _token: _token  
            },
            success:function(data)
            {
                // console.log(data);
                if (data == "success") {
                    document.getElementById('name').value ="";
                    document.getElementById('email').value ="";
                    document.getElementById('subject').value ="";
                    document.getElementById('message').value="";
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Cảm ơn bạn đã đánh giá');
                    $('meta[name=notification]').attr('icon', '#008000');
                    
                }else if (data == "failed") {
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi. Vui lòng thực hiện lại thao tác');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }else {
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi. Vui lòng thực hiện lại thao tác');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                };
            },
            error: function(data, textStatus, errorThrown) {
                 $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thực hiện lại thao tác');
                    $('meta[name=notification]').attr('icon', '#ffa500');
            }
        })
        }
        if(!name == "" ){
            devRemoveClass("name", "boder-color-dis");
        }
        if(!email ==""){
            devRemoveClass("email", "boder-color-dis");
        }
        if(!subject ==""){
            devRemoveClass("subject", "boder-color-dis");
        }
        if(!message ==""){
            devRemoveClass("message", "boder-color-dis");
        }
        });

    function devAddClass(element, willClass){
        document.getElementById(element).classList.add(willClass);
    };

    function devRemoveClass(element, willClass){
        document.getElementById(element).classList.remove(willClass);
    };

    $('#orderSubmit').click(function(){
        preloader_.style.display = "block";
        var name = document.getElementById('name').value;
        var city = document.getElementById('city-dev').value;
        var distric = document.getElementById('distric-dev').value;
        var commune = document.getElementById('commune-dev').value;
        var address = document.getElementById('address').value;
        var addressDetail = "null";
        addressDetail = document.getElementById('addressDetail').value;
        var email = document.getElementById('ck-emailAddress').value;
        var phone = document.getElementById('ck-phone').value;
        var note = "null";
        note = document.getElementById('note').value;
        var _token = $('input[name="_token"]').val();
        var email_data = $("#ck-email-data").hasClass("success");
        var phone_data = $("#ck-phone-data").hasClass("success");
        

        if (name == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Tên bạn là bắt buộc. Vui lòng kiểm tra và thử lại. (Your name is required. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("name", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (city == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng chọn thành phố/tỉnh. Vui lòng kiểm tra và thử lại. (Please choose province. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("city-dev", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (distric == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng chọn quận/huyện. Vui lòng kiểm tra và thử lại. (Please choose distric. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("distric-dev", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (commune == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng chọn xã/phường. Vui lòng kiểm tra và thử lại. (Please choose commune. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("commune-dev", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (address == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng viết lại cụ thể địa chỉ của bạn để thuận lợi trong việc giao hàng. (Please rewrite your address specifically for convenience in delivery.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("address", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (email == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng nhập email của bạn. Vui lòng kiểm tra và thử lại. (Please enter your email. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ck-emailAddress", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(email_data == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Email không hợp lệ. Vui lòng kiểm tra và thử lại. (Invalid email. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ck-emailAddress", "boder-color-dis");
            preloader_.style.display = "none";
        }else if (phone == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng nhập số điện thoại của bạn. Vui lòng kiểm tra và thử lại. (Please enter your phone. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ck-phone", "boder-color-dis");
            preloader_.style.display = "none";
        }else if(phone_data == false){
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Số điện thoại không hợp lệ. Vui lòng kiểm tra và thử lại. (Invalid phone number. Please check and try again.)');
            $('meta[name=notification]').attr('icon', '#ffa500');
            devAddClass("ck-phone", "boder-color-dis");
            preloader_.style.display = "none";
        }else{
            var data = [name, commune +", "+ distric +", "+ city, address, addressDetail, email, phone, note];
            $.ajax({
                url:"/orderSubmit",
                method:"POST",
                data:{
                    data : data,
                    _token: _token  
                },
                success:function(data)
                {
                    console.log(data);
                    
                    if (data == "success") {
                        $('meta[name=notification]').attr('content', 'success');
                        $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                        $('meta[name=notification]').attr('noticontent', 'Hoàn tất đặt hàng. Cám ơn bạn đã mua hàng. (Complete the order. Thank you for your purchase.)');
                        $('meta[name=notification]').attr('icon', '#28a745');
                      
                        document.getElementById('name').value= "";
                        document.getElementById("city-dev").selectedIndex = "0";
                        document.getElementById("distric-dev").selectedIndex = "0";
                        document.getElementById("commune-dev").selectedIndex = "0";

                        document.getElementById('address').value= "";
						document.getElementById('ck-emailAddress').value= "";
						document.getElementById('ck-phone').value= "";

                        var ck_emailAddress = document.getElementById("ck-email-data");
						ck_emailAddress.classList.remove("success");
						var ck_phone = document.getElementById("ck-phone-data");
                        ck_phone.classList.remove("success");
                        
                        $("#city-dev option[id='city-dev-data']").remove();
                        $("#distric-dev option[id='district-dev-data']").remove();
                        $("#commune-dev option[id='commune-dev-data']").remove();

                        $("#dev-table-items").empty();
                        $("#ck-amount").html("0 đ");
                        $("#ck-vat").html("0 đ");
                        $("#ck-total").html("0 đ");
                        document.getElementById('quanlity').value= "0";

                        preloader_.style.display = "none";
                        
                    }else if (data == "failed") {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Hệ thống đang bận. Vui lòng quay lại sau. Hãy thứ cho lỗi này. (The system is busy. Please come back later. Please forgive for this error.)');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                        preloader_.style.display = "none";
                    }else if (data == "exist") {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Email bạn sử dụng có thể đã đăng kí trước đó. Vui lòng đăng nhập để tiếp tục sử dụng. (The email you used may have previously registered. Please login to continue using.)');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                        preloader_.style.display = "none";
                    }else {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Máy chủ không phản hồi. Vui lòng liên hệ với chúng tôi để sớm kịp thời hỗ trợ bạn. (The server is not responding. Please contact us to promptly support you.)');
                        $('meta[name=notification]').attr('icon', '#dc3545');
                        preloader_.style.display = "none";
                    };
                },
                error: function(data, textStatus, errorThrown) {
                    $('meta[name=notification]').attr('content', 'error');
                    $('meta[name=notification]').attr('title', 'Lỗi - Error');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ bộ phận CSKH để hỗ trợ kịp thời. (Location error. Please contact for customer care department.)');
                    $('meta[name=notification]').attr('icon', '#dc3545');
                    preloader_.style.display = "none";
                }
            })
        }
        if(!name == ''){
            devRemoveClass("name", "boder-color-dis");
        }
        if(!city == ''){
            devRemoveClass("city-dev", "boder-color-dis");
        }
        if(!distric == ''){
            devRemoveClass("distric-dev", "boder-color-dis");
        }
        if(!commune == ''){
            devRemoveClass("commune-dev", "boder-color-dis");
        }
        if(!address == ''){
            devRemoveClass("address", "boder-color-dis");
        }
        if(!phone == ''){
            devRemoveClass("ck-phone", "boder-color-dis");
        }
        if(!phone_data == false){
            devRemoveClass("ck-phone", "boder-color-dis");
        }
        if(!email_data == false){
            devRemoveClass("ck-emailAddress", "boder-color-dis");
        }
        if(!email == ''){
            devRemoveClass("ck-emailAddress", "boder-color-dis");
        }
    });

    var regex = new RegExp(
        '^(([^<>()[\\]\\\\.,;:\\s@\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\"]+)*)|' +
        '(\\".+\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])' +
        '|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$'
    );

    var phoneNumber = new RegExp(
        '^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$'
    );

    
    $('.email input').on('keyup', function(e) {
        $(this).parent().toggleClass('success', regex.test($(this).val()));
    });

    $('.phone input').on('keyup', function(e) {
        $(this).parent().toggleClass('success', phoneNumber.test($(this).val()));
    });

    $('.ck-email input').on('keyup', function(e) {
        $(this).parent().toggleClass('success', regex.test($(this).val()));
    });

    $('.checkout-coupon input').on('keyup', function(e) {
        $(this).parent().toggleClass('success', regex.test($(this).val()));
    });

    $('.ck-phone input').on('keyup', function(e) {
        $(this).parent().toggleClass('success', phoneNumber.test($(this).val()));
    });

 

});	

    $("div.star-rating > s").on("click", function(e) {
        
        // remove all active classes first, needed if user clicks multiple times
        $(this).closest('div').find('.active').removeClass('active');

        $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
        $(e.target).addClass('active');  // the element user has clicked on


            var numStars = $(e.target).parentsUntil("div").length+1;
            $('.show-result').text(numStars + (numStars == 1 ));
            $(".show-result").val(numStars);

    });

    $('#btnSendFeedback').click(function(e) {
        preloader_.style.display = "block";
        var numberofstar = document.getElementById('show-result').value;
        var textreview = document.getElementById('review').value;
        var idUserBeFeedBack = document.getElementById("idUserBeFeedBack").value;
        var idUserGiveFeedBack = document.getElementById("idUserGiveFeedBack").value;
        
        var _token = $('input[name="_token"]').val();
        if(numberofstar == "" || textreview ==""){
            $('#model-feedback').modal('hide');
            $("div.star-rating > s").closest('div').find('.active').removeClass('active');
            document.getElementById('show-result').value= "";
            document.getElementById('review').value="";
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin chính xác');
            $('meta[name=notification]').attr('icon', '#ffa500');
        }else if(idUserGiveFeedBack == 'null'){
            $('#model-feedback').modal('hide');
            $('#login-modal').modal('show');
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
            $('meta[name=notification]').attr('noticontent', 'Vui lòng đăng nhập trước khi thực hiện thao tác');
            $('meta[name=notification]').attr('icon', '#ffa500');
            preloader_.style.display = "none";
        }else{
        $.ajax({
            url:"/rating",
            method:"POST",
            data:{
                numberofstar: numberofstar,
                textreview: textreview,
                idUserBeFeedBack:idUserBeFeedBack,
                idUserGiveFeedBack:idUserGiveFeedBack,
                _token: _token  
            },
            success:function(data)
            {
                // console.log(data);
                if (data == "success") {
                    $('#model-feedback').modal('hide');
                    $("div.star-rating > s").closest('div').find('.active').removeClass('active');
                    document.getElementById('show-result').value= "";
                    document.getElementById('review').value="";
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Cảm ơn bạn đã đánh giá');
                    $('meta[name=notification]').attr('icon', '#008000');
                    preloader_.style.display = "none";
                    
                }else if (data == "failed") {
                    $('#model-feedback').modal('hide');
                    document.getElementById('show-result').value= "";
                    document.getElementById('review').value="";
                    $("div.star-rating > s").closest('div').find('.active').removeClass('active');
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Vui lòng điền vào thông tin chính xác2');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                    preloader_.style.display = "none";
                }else{
                        $('#model-feedback').modal('hide');
                        document.getElementById('show-result').value= "";
                        document.getElementById('review').value="";
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi trong quá trình đăng nhập cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Error during local login process. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                        preloader_.style.display = "none";
                };
            },
            error: function(data, textStatus, errorThrown) {
                $('#model-feedback').modal('hide');
                $("div.star-rating > s").closest('div').find('.active').removeClass('active');
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thử lại.');
                $('meta[name=notification]').attr('icon', '#ffa500');
                preloader_.style.display = "none";
            }
        })
        }
        });
    
        $('#btnEnterMoney').click(function(e) {
                var money = document.getElementById('moneyenter').value;
                var usermoney = document.getElementById('userMoney').value;
                var a = parseInt(usermoney);
                var b = parseInt(money);
                var total = a + b;
                var _token = $('input[name="_token"]').val();
                var today = new Date();
                var date = today.getDate();
                var month = today.getMonth() + 1;
                var year = today.getFullYear();
                today =  date + '-' + month + '-' + year;
                if(money == ""){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng điền đầy đủ thông tin và chính xác.');
                $('meta[name=notification]').attr('icon', '#ffa500');
                }else if( total < 300 ){
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng điền đầy đủ thông tin và chính xác.Số tiền nạp vào không đủ để duy trì hoạt động');
                $('meta[name=notification]').attr('icon', '#ffa500');   
                }
                else{
                document.getElementById('moneyenter').value = "";
                document.getElementById('userMoney').value = "";

                $.ajax({
                    url:"/profile/entermoney",
                    method:"POST",
                    data:{
                      date : date,
                      total : total,
                      today:today,
                      _token: _token  
                    },
                    success:function(data)
                    {
                      if (data == "success") {
                            document.getElementById('moneyenter').value = "";
                            document.getElementById('userMoney').value = total;
                            document.getElementById('userMoney').innerHTML  = total + "VND";
                            window.location="/profile/entermoney";
                            $('meta[name=notification]').attr('content', 'success');
                            $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                            $('meta[name=notification]').attr('icon', '#008000');
                            
                        }else if (data == "failed") {                 
                            $('meta[name=notification]').attr('content', 'warning');
                            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                            $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                            $('meta[name=notification]').attr('icon', '#ffa500');
                        }else{                 
                                $('#login-modal').modal('hide');
                                $('meta[name=notification]').attr('content', 'error');
                                $('meta[name=notification]').attr('title', 'Lỗi - Error');
                                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                                $('meta[name=notification]').attr('icon', '#FF0000');
                        };
                    },
                    error: function(data, textStatus, errorThrown) {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                    }
                })
                    
                }

         });
        $('#btnStopActive').click(function(e) {
            var reason = document.getElementById('reason').value;
            var otherReason = document.getElementById('otherReason').value;
            var _token = $('input[name="_token"]').val();
            if(reason = 0){
             var stringReason = "";
            }
            else if(reason = 1){
             var stringReason = "Tôi đã bán hết sách";
            }
            else if(reason = 2){
            var stringReason = "Tôi đang có việc khác để làm";
            }
            else if(reason = 3){
            var stringReason = "Tôi đang bận";
            }
            else if(reason = 4){
            var stringReason = otherReason;
            }
            $.ajax({
                    url:"/profile/stopactive",
                    method:"POST",
                    data:{
                      stringReason : stringReason,
                      _token: _token  
                    },
                    success:function(data)
                    {
                      if (data == "success") {
                            document.getElementById('otherReason').value = "";
                             window.location="/";
                            $('meta[name=notification]').attr('content', 'success');
                            $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                            $('meta[name=notification]').attr('icon', '#008000');
                            
                        }else if (data == "failed") {                 
                            $('meta[name=notification]').attr('content', 'warning');
                            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                            $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                            $('meta[name=notification]').attr('icon', '#ffa500');
                        }else{                 
                                $('#login-modal').modal('hide');
                                $('meta[name=notification]').attr('content', 'error');
                                $('meta[name=notification]').attr('title', 'Lỗi - Error');
                                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                                $('meta[name=notification]').attr('icon', '#FF0000');
                        };
                    },
                    error: function(data, textStatus, errorThrown) {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                    }
                })
         });
        $('#moneyaccountActiveAgain').click(function(e) {
            var today = new Date();
            var date = today.getDate();
            var month = today.getMonth() + 1;
            var year = today.getFullYear();
            today =  date + '-' + month + '-' + year;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url:"/profile/activeAgain",
                    method:"POST",
                    data:{
                        today:today,
                        date : date,
                      _token: _token  
                    },
                    success:function(data)
                    {
                      if (data == "success") {
                             window.location="/";
                            $('meta[name=notification]').attr('content', 'success');
                            $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công. Tài khoản của bạn đã được kích hoạt lại.');
                            $('meta[name=notification]').attr('icon', '#008000');
                            
                        }else if (data == "failed") {                 
                            $('meta[name=notification]').attr('content', 'warning');
                            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                            $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                            $('meta[name=notification]').attr('icon', '#ffa500');
                        }else{                 
                                $('#login-modal').modal('hide');
                                $('meta[name=notification]').attr('content', 'error');
                                $('meta[name=notification]').attr('title', 'Lỗi - Error');
                                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                                $('meta[name=notification]').attr('icon', '#FF0000');
                        };
                    },
                    error: function(data, textStatus, errorThrown) {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                    }
                })
         });

        $('#btnChangeInfor').click(function(e) {
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo');
                $('meta[name=notification]').attr('noticontent', 'Chức năng này đang được bảo trì. Vui lòng thử lại sau.');
                $('meta[name=notification]').attr('icon', '#ffa500');
         });
        $('#btnExchangeScore').click(function(e) {
                var score = document.getElementById('scoreExchange').value;
                var moneyCurrent = document.getElementById('moneyCurrent').value;
                var a = parseInt(score);
                var b = parseInt(moneyCurrent);
                var totalMoneyExchange = a + b;
                var _token = $('input[name="_token"]').val();
                if(score < 10000){
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác thất bại. Số điểm tích lũy ít nhất là 10.000 VND');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }
                else{
                    document.getElementById('scoreExchange').value = "";
                    $.ajax({
                    url:"/addscore",
                    method:"POST",
                    data:{
                        totalMoneyExchange:totalMoneyExchange,
                      _token: _token  
                    },
                    success:function(data)
                    {
                      if (data == "success") {
                            document.getElementById('scoreExchange').value = 0;
                            $('meta[name=notification]').attr('content', 'success');
                            $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công. Tài khoản của bạn vừa được cộng tương ứng với số điểm quy đổi.Hãy kiểm tra lại tài khoản của mình.');
                            $('meta[name=notification]').attr('icon', '#008000');
                            
                        }else if (data == "failed") {                 
                            $('meta[name=notification]').attr('content', 'warning');
                            $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                            $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                            $('meta[name=notification]').attr('icon', '#ffa500');
                        }else{                 
                                $('#login-modal').modal('hide');
                                $('meta[name=notification]').attr('content', 'error');
                                $('meta[name=notification]').attr('title', 'Lỗi - Error');
                                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                                $('meta[name=notification]').attr('icon', '#FF0000');
                        };
                    },
                    error: function(data, textStatus, errorThrown) {
                        $('meta[name=notification]').attr('content', 'warning');
                        $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#ffa500');
                    }
                })
                }


         });
    jQuery('#notice-close').click(function(e) {
    var notice = document.getElementById("dev-log"); 
    notice.style.display = "none";
    $('meta[name=notification]').attr('content', '');
    start = 0;
    });

    jQuery('#loginSubmit').click(function(e) {
        e.preventDefault();

        const metas = document.getElementsByTagName('meta');
        
        for (let i = 0; i < metas.length; i++) {
            if (metas[i].getAttribute('name') === '_token') {
                var token = metas[i].getAttribute('content');
                $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
                    jqXHR.setRequestHeader('X-CSRF-Token', token);
                });
            }
        }

        var userName = document.getElementById('userName').value;
        var password = document.getElementById('password').value;

        if (userName == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo');
            $('meta[name=notification]').attr('noticontent', 'Không thể thực hiện thao tác. Vui lòng nhập tên đăng nhập hoặc email và thử lại.');
            $('meta[name=notification]').attr('icon', '#ffa500');
        } else if (password == '') {
            $('meta[name=notification]').attr('content', 'warning');
            $('meta[name=notification]').attr('title', 'Cảnh báo');
            $('meta[name=notification]').attr('noticontent', 'Không thể thực hiện thao tác. Vui lòng nhập mật khẩu và thử lại.');
            $('meta[name=notification]').attr('icon', '#ffa500');
        } else {
            $('meta[name=notification]').attr('content', 'success');
            $('meta[name=notification]').attr('title', 'Chúc mừng');
            $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đăng nhập thành công');
            $('meta[name=notification]').attr('icon', '#008000');
            
            $('.login').addClass('test');

            setTimeout(function() {
                $('.login').addClass('testtwo');
            }, 300);
            setTimeout(function() {
                $('.authent')
                    .show()
                    .animate(
                        { right: -320 },
                        { easing: 'easeOutQuint', duration: 600, queue: false }
                    );
                $('.authent')
                    .animate({ opacity: 1 }, { duration: 200, queue: false })
                    .addClass('visible');
            }, 500);

            jQuery.ajax({
                url: '/loginAuthencation',
                method: 'post',
                data: {
                    data_userName: userName,
                    data_password: password
                },
                datatype: 'json',
                success: function(data) {
                    // console.log(data);
                    // console.log(data.userName);

                    if(data=='success'){
                        console.log('Ahihi');
                        
                    }else{
                        console.log('no');
                        
                    }



                    // setTimeout(function() {
                    //     $('.authent')
                    //         .show()
                    //         .animate(
                    //             { right: 90 },
                    //             {
                    //                 easing: 'easeOutQuint',
                    //                 duration: 600,
                    //                 queue: false
                    //             }
                    //         );
                    //     $('.authent')
                    //         .animate(
                    //             { opacity: 0 },
                    //             { duration: 200, queue: false }
                    //         )
                    //         .addClass('visible');
                    //     $('.login').removeClass('testtwo');
                    // }, 2500);
                    // setTimeout(function() {
                    //     $('.login').removeClass('test');
                    //     $('.login div').fadeOut(123);
                    // }, 2800);
                    // setTimeout(function() {
                    //     $('.success').fadeIn();
                    // }, 3200);
                },
                error: function(data, textStatus, errorThrown) {
                    console.log('Some thing went wrong');
                }
            });
        }
    });

    var notice = document.getElementById("dev-log"); 
    var start = 0;
    var end = 19;

    function showNoti() {
            setTimeout("showNoti()",400);
            var noti = document.querySelector("meta[name='notification']").getAttribute("content")
            var meta_title = document.querySelector("meta[name='notification']").getAttribute("title")
            var meta_content = document.querySelector("meta[name='notification']").getAttribute("noticontent")
            var meta_icon = document.querySelector("meta[name='notification']").getAttribute("icon")
            
            
            if(
                noti == "warning" || 
                noti == "error" || 
                noti == "success" ||
                noti == "info"
                ){
                start++;
                // Get icon
                var icon = document.getElementById(noti);

                // Set color
                icon.style.color = meta_icon;

                // Show icon
                if (icon.style.display === "none") {
                    icon.style.display = "block";
                } else {
                    icon.style.display = "none";
                }

                notice.style.display = "block";
                $('div#notificationTitle').text(meta_title);
                $('div#notificationContent').text(meta_content);
                if (start > end){
                $('meta[name=notification]').attr('content', '');
                start = 0;
                notice.style.display = "none";
            }
        }
    }
    showNoti();

    function resetProvince(){
        $('#distric')
        .find('option')
        .remove()
        .end()
        .append('<option value="">Chọn quận, huyện</option>')
        .val('whatever');

        resetCommune();
    }

    function resetProvinceDEV(){
        $('#distric-dev')
        .find('option')
        .remove()
        .end()
        .append('<option value="">Chọn quận, huyện</option>')
        .val('whatever');

        resetCommuneDEV();
    }

    function resetCommune(){
        $('#commune')
        .find('option')
        .remove()
        .end()
        .append('<option value="">Chọn xã, phường</option>')
        .val('whatever');
    }

    function resetCommuneDEV(){
        $('#commune-dev')
        .find('option')
        .remove()
        .end()
        .append('<option value="">Chọn xã, phường</option>')
        .val('whatever');
    }

    function countElements(parent, getChildrensChildren){
        var relevantChildren = 0;
        var children = parent.childNodes.length;
        for(var i=0; i < children; i++){
            if(parent.childNodes[i].nodeType != 3){
                if(getChildrensChildren)
                    relevantChildren += getCount(parent.childNodes[i],true);
                relevantChildren++;
            }
        }
        return relevantChildren;
    }
    function closeFunction(){
        $('#model-feedback').modal('hide');
        document.getElementById('show-result').value= "";
        document.getElementById('review').value="";
        $("div.star-rating > s").closest('div').find('.active').removeClass('active');
    }

    var countForReload = 3;
    var statusRun_ = true;
    
    function timer() {
        if(statusRun_ == false){
            if(lang_ == 'en'){
                $( "#updateCart_" ).text("Executing...");
            }else{
                $( "#updateCart_" ).text("Đang thực thi...");
            }
            location.reload();
        }else{
            setTimeout("timer()", 1000);
            if (countForReload <= 0) {
                statusRun_ = false;
            } else {
                var lang_ = $('input[name="lang"]').val();
                if(lang_ == 'en'){
                    $( "#updateCart_" ).text("Please wait ("+countForReload+")s");
                }else{
                    $( "#updateCart_" ).text("Vui lòng đợi ("+countForReload+")s");
                }
                
                countForReload--;
            }
        }
    }

    (function($) {
        var pagify = {
            items: {},
            pagination_container: null,
            totalPages: 1,
            perPage: 3,
            currentPage: 0,
            createNavigation: function() {
                this.totalPages = Math.ceil(this.items.length / this.perPage);

                $('.pagination', this.pagination_container.parent()).remove();
                var pagination = $('<div id="pagination" class="pagination"></div>').append('<a class="fa fa-caret-square-o-left dev prev disabled" data-next="false"></a>');

                for (var i = 0; i < this.totalPages; i++) {
                    var pageElClass = "page";
                    if (!i)
                        pageElClass = "page current";
                    var pageEl = '<a class="' + pageElClass + '" data-page="' + (
                        i + 1) + '">' + (
                        i + 1) + "</a>";
                    pagination.append(pageEl);
                }
                pagination.append('<a class="fa fa-caret-square-o-right dev next" data-next="true"></a>');

                this.pagination_container.after(pagination);

                var that = this;
                $("body").off("click", ".dev");
                this.navigator = $("body").on("click", ".dev", function() {
                    var el = $(this);
                    that.navigate(el.data("next"));
                });

                $("body").off("click", ".page");
                this.pageNavigator = $("body").on("click", ".page", function() {
                    var el = $(this);
                    that.goToPage(el.data("page"));
                });
            },
            navigate: function(next) {
                // default perPage to 5
                if (isNaN(next) || next === undefined) {
                    next = true;
                }
                $(".pagination .dev").removeClass("disabled");
                if (next) {
                    this.currentPage++;
                    if (this.currentPage > (this.totalPages - 1))
                        this.currentPage = (this.totalPages - 1);
                    if (this.currentPage == (this.totalPages - 1))
                        $(".pagination .dev.next").addClass("disabled");
                } else {
                    this.currentPage--;
                    if (this.currentPage < 0)
                        this.currentPage = 0;
                    if (this.currentPage == 0)
                        $(".pagination .dev.prev").addClass("disabled");
                }

                this.showItems();
            },
            updateNavigation: function() {

                var pages = $(".pagination .page");
                pages.removeClass("current");
                $('.pagination .page[data-page="' + (
                    this.currentPage + 1) + '"]').addClass("current");
            },
            goToPage: function(page) {

                this.currentPage = page - 1;

                $(".pagination .dev").removeClass("disabled");
                if (this.currentPage == (this.totalPages - 1))
                    $(".pagination .dev.next").addClass("disabled");

                if (this.currentPage == 0)
                    $(".pagination .dev.prev").addClass("disabled");
                this.showItems();
            },
            showItems: function() {
                this.items.hide();
                var base = this.perPage * this.currentPage;
                this.items.slice(base, base + this.perPage).show();

                this.updateNavigation();
            },
            init: function(pagination_container, items, perPage) {
                this.pagination_container = pagination_container;
                this.currentPage = 0;
                this.totalPages = 1;
                this.perPage = perPage;
                this.items = items;
                this.createNavigation();
                this.showItems();
            }
        };

        // stuff it all into a jQuery method!
        $.fn.pagify = function(perPage, itemSelector) {
            var el = $(this);
            var items = $(itemSelector, el);

            // default perPage to 5
            if (isNaN(perPage) || perPage === undefined) {
                perPage = 3;
            }

            // don't fire if fewer items than perPage
            if (items.length <= perPage) {
                return true;
            }

            pagify.init(el, items, perPage);
        };
    })(jQuery);

    $(".pagination_container").pagify(12, ".single-item");


    
