<?php
    if (!function_exists('dataLog')) {
        include('../actions/actions.php');
    }
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{__('loading')}}</title>
		<meta name="description" content="">
		<meta name="notification" content="" title="" noticontent="" icon=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body class="cart" onload="starting()">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- header-area-start -->
        <header>
        	@include('components.header')
		</header>
		<script>
		function starting(){
			preloader_.style.display = "block";
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
					var thesamebook = [];
					if(!(data == "false")){
						for (var i = 0; i < data.length; i++) { 
							if(data[i]["title"] != "brighten"){
								var index = data.indexOf(data[i]);
								var element = "<tr><td class='product-thumbnail'><a href='#'><img src='"+data[i]["images"][0]+"' alt='man' /></a></td><td class='product-name'><a href='#'><h6 class='book-information'>{{__('bookName')}}: "+data[i]["title"]+"</h6><h6 class='book-information'>{{__('seller')}}: "+data[i]["otherData"]["yourName"]+"</h6></a></td><td class='product-price'><span class='amount'>"+data[i]["promotionPrice"]+" đ</span></td><td class='product-quantity'><div class='value-button' id='decrease' onclick='decreaseValue("+index+")' value='Decrease Value'>-</div><input type='number' id='number_quantity' readonly value='"+data[i]["quanlity"]+"'><div class='value-button' id='increase' onclick='increaseValue("+index+")' >+</div></td><td class='product-subtotal'>"+data[i]["promotionPrice"] * data[i]["quanlity"]+" đ</td><td class='product-remove'><a onclick='removeItemInCart("+index+")' class='btn btn-danger' ><i class='fa fa-times'></i> {{__('remove')}}</a></td></tr>";
								document.getElementById('cart-item-list').innerHTML += element;
								var price = parseInt(data[i]["promotionPrice"], 10) * parseInt(data[i]["quanlity"], 10);
								total += price;
							}
						}
						$("#amount").text(total+" đ");
					}
					preloader_.style.display = "none";
				},
				error: function(data, textStatus, errorThrown) {
					$('meta[name=notification]').attr('content', 'error');
                    $('meta[name=notification]').attr('title', 'Lỗi - Error');
                    $('meta[name=notification]').attr('noticontent', 'Không thể lấy dữ liệu. Có thể hệ thống đang bận. (Cannot retrieve data. Maybe the system is busy.)');
                    $('meta[name=notification]').attr('icon', '#FF0000');
                    preloader_.style.display = "none";
				}
			})
        
		}
		</script>
		<!-- header-area-end -->
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="/">{{__('home')}}</a></li>
								<li><a href="/cart" class="active">{{__('cart')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- entry-header-area-start -->
		<div class="entry-header-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="entry-header-title">
							<h2>{{__('cart')}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area-end -->
		<!-- cart-main-area-start -->
		<div class="cart-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<form action="#">
							<div class="table-content table-responsive">
								<table>
									<thead>
										<tr>
											<th class="product-thumbnail">{{__('product')}}</th>
											<th class="product-name">{{__('bookInfo')}}</th>
											<th class="product-price">{{__('price')}}</th>
											<th class="product-quantity">{{__('quantity')}}</th>
											<th class="product-subtotal">{{__('total')}}</th>
											<th class="product-remove">{{__('remove')}}</th>
										</tr>
									</thead>
									<tbody id="cart-item-list">
										<!-- Cư Nguyễn DEV - 0352213396 - cunguyen.dev@gmail.com -->
									<!-- <tr>
										<td class="product-thumbnail">
											<a href="#"><img src="https://i.imgur.com/wLoXYDv.jpg" alt="man"></a>
										</td>
										<td class="product-name"><a href="#"><h6 class="book-information">Tên sách: Nguyễn Văn Cư</h6><h6 class="book-information">Người bán: Nguyễn Văn Huy</h6></a></td>
										<td class="product-price"><span class="amount">21000 đ</span></td>
										<td class="product-quantity">
											<div class="value-button" id="decrease" onclick="decreaseValue()" >-</div>
											<input type="number" id="number_quantity" readonly value="1">
											<div class="value-button" id="increase" onclick="increaseValue()" >+</div>
										</td>
										<td class="product-subtotal">21000 đ</td>
										<td class="product-remove"><a onclick="removeItemInCart(22)" class="btn btn-danger"><i class="fa fa-times"></i> Xóa bỏ</a></td>
									</tr> -->
									</tbody>
								</table>
								<script>
									function increaseValue(index) {
										preloader_.style.display = "block";
										var _token = $('input[name="_token"]').val();

										$.ajax({
											url:"updateCart_",
											method:"POST",
											data:{
												type: "addition",
												index: index,
												_token: _token	
											},
											datatype: 'json',
											success:function(data)
											{
												var total = 0;
												var q = 0;
												if(data["status"]=='success'){
													document.getElementById("quanlity").value = data["numberOfItem"];
													$("#item-list").empty();
													$("#cart-item-list").empty();
													
													for (var i = 0; i < data["cart_"].length; i++) { 
														if(data["cart_"][i]["title"] != "brighten"){
															var index = data["cart_"].indexOf(data["cart_"][i]);
															var element = "<tr><td class='product-thumbnail'><a href='#'><img src='"+data["cart_"][i]["images"][0]+"' alt='man' /></a></td><td class='product-name'><a href='#'><h6 class='book-information'>{{__('bookName')}}: "+data["cart_"][i]["title"]+"</h6><h6 class='book-information'>{{__('seller')}}: "+data["cart_"][i]["otherData"]["yourName"]+"</h6></a></td><td class='product-price'><span class='amount'>"+data["cart_"][i]["promotionPrice"]+" đ</span></td><td class='product-quantity'><div class='value-button' id='decrease' onclick='decreaseValue("+index+")' value='Decrease Value'>-</div><input type='number' id='number_quantity' readonly value='"+data["cart_"][i]["quanlity"]+"'><div class='value-button' id='increase' onclick='increaseValue("+index+")' >+</div></td><td class='product-subtotal'>"+data["cart_"][i]["promotionPrice"] * data["cart_"][i]["quanlity"]+" đ</td><td class='product-remove'><a onclick='removeItemInCart("+index+")' class='btn btn-danger' ><i class='fa fa-times'></i> {{__('remove')}}</a></td></tr>";
															document.getElementById('cart-item-list').innerHTML += element;
															var price = parseInt(data["cart_"][i]["promotionPrice"], 10) * parseInt(data["cart_"][i]["quanlity"], 10);
															total += price;
															q++;
														}
													}
													$("#amount").text(total+" đ");
													preloader_.style.display = "none";
												}else if(data["status"]=='failed'){
													$('meta[name=notification]').attr('content', 'error');
													$('meta[name=notification]').attr('title', 'Lỗi - Error');
													$('meta[name=notification]').attr('noticontent', 'Có lỗi xãy ra. Xung đột khi thực thi với máy chủ. (An error has occurred. Conflict when executing with server.)');
													$('meta[name=notification]').attr('icon', '#FF0000');
													preloader_.style.display = "none";
												}else if(data["status"]=='stock'){
													$('meta[name=notification]').attr('content', 'info');
													$('meta[name=notification]').attr('title', 'Thông báo - Notification');
													$('meta[name=notification]').attr('noticontent', 'Giá trị vô hạn. Có thể sản phẩm này đã hết so với số lượng bạn yêu cầu. (Infinite value. Maybe this product is out of quantity you requested.)');
													$('meta[name=notification]').attr('icon', '#007bff');
													preloader_.style.display = "none";
												}else{
													$('#login-modal').modal('hide');
													$('meta[name=notification]').attr('content', 'error');
													$('meta[name=notification]').attr('title', 'Lỗi - Error');
													$('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Local error. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
													$('meta[name=notification]').attr('icon', '#FF0000');
													preloader_.style.display = "none";
												}
											},
											error: function(data, textStatus, errorThrown) {
												$('meta[name=notification]').attr('content', 'warning');
												$('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
												$('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thử lại');
												$('meta[name=notification]').attr('icon', '#ffa500');
												preloader_.style.display = "none";
											}
										})
									}

									function decreaseValue(index) {
										preloader_.style.display = "block";
										var _token = $('input[name="_token"]').val();

										$.ajax({
											url:"updateCart_",
											method:"POST",
											data:{
												type: "subtraction",
												index: index,
												_token: _token	
											},
											datatype: 'json',
											success:function(data)
											{
												var total = 0;
												if(data["status"]=='success'){
													document.getElementById("quanlity").value = data["numberOfItem"];
													$("#item-list").empty();
													$("#cart-item-list").empty();
													
													for (var i = 0; i < data["cart_"].length; i++) { 
														if(data["cart_"][i]["title"] != "brighten"){
															var index = data["cart_"].indexOf(data["cart_"][i]);
															var element = "<tr><td class='product-thumbnail'><a href='#'><img src='"+data["cart_"][i]["images"][0]+"' alt='man' /></a></td><td class='product-name'><a href='#'><h6 class='book-information'>{{__('bookName')}}: "+data["cart_"][i]["title"]+"</h6><h6 class='book-information'>{{__('seller')}}: "+data["cart_"][i]["otherData"]["yourName"]+"</h6></a></td><td class='product-price'><span class='amount'>"+data["cart_"][i]["promotionPrice"]+" đ</span></td><td class='product-quantity'><div class='value-button' id='decrease' onclick='decreaseValue("+index+")' value='Decrease Value'>-</div><input type='number' id='number_quantity' readonly value='"+data["cart_"][i]["quanlity"]+"'><div class='value-button' id='increase' onclick='increaseValue("+index+")' >+</div></td><td class='product-subtotal'>"+data["cart_"][i]["promotionPrice"] * data["cart_"][i]["quanlity"]+" đ</td><td class='product-remove'><a onclick='removeItemInCart("+index+")' class='btn btn-danger' ><i class='fa fa-times'></i> {{__('remove')}}</a></td></tr>";
															document.getElementById('cart-item-list').innerHTML += element;
															var price = parseInt(data["cart_"][i]["promotionPrice"], 10) * parseInt(data["cart_"][i]["quanlity"], 10);
															total += price;
														}
													}
													$("#amount").text(total+" đ");
													preloader_.style.display = "none";
												}else if(data["status"]=='failed'){
													$('meta[name=notification]').attr('content', 'error');
													$('meta[name=notification]').attr('title', 'Lỗi - Error');
													$('meta[name=notification]').attr('noticontent', 'Tên đăng/email hoặc mật khẩu không đúng. Vui lòng kiểm tra và thử lại. (Username/email or password is not correct. Please check and try again.)');
													$('meta[name=notification]').attr('icon', '#FF0000');
													preloader_.style.display = "none";
												}else if(data["status"]=='atlease'){
													$('meta[name=notification]').attr('content', 'info');
													$('meta[name=notification]').attr('title', 'Thông báo - Notification');
													$('meta[name=notification]').attr('noticontent', 'Số lượng tối thiểu không hợp lệ. (Minimum quantity is invalid)');
													$('meta[name=notification]').attr('icon', '#007bff');
													preloader_.style.display = "none";
												}else{
													$('#login-modal').modal('hide');
													$('meta[name=notification]').attr('content', 'error');
													$('meta[name=notification]').attr('title', 'Lỗi - Error');
													$('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Local error. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
													$('meta[name=notification]').attr('icon', '#FF0000');
													preloader_.style.display = "none";
												}
											},
											error: function(data, textStatus, errorThrown) {
												$('meta[name=notification]').attr('content', 'warning');
												$('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
												$('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thử lại');
												$('meta[name=notification]').attr('icon', '#ffa500');
												preloader_.style.display = "none";
											}
										})
									}
								</script>
							</div>
						</form>
					</div>
				</div>
				<script>
					function removeItemInCart(data){
						preloader_.style.display = "block";
						var _token = $('input[name="_token"]').val();

						$.ajax({
						url:"removeItemInCart",
						method:"POST",
						data:{
							data: data,
							_token: _token	
						},
						datatype: 'json',
						success:function(data)
						{
							var total = 0;
							if(data["status"]=='success'){
								$('meta[name=notification]').attr('content', 'success');
								$('meta[name=notification]').attr('title', 'Thành công -  Successfully');
								$('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đã xóa sản phẩm. (Operation is performed. Product deleted.)');
								$('meta[name=notification]').attr('icon', '#008000');
								document.getElementById("quanlity").value = data["numberOfItem"];
								$("#item-list").empty();
								$("#cart-item-list").empty();
								
								for (var i = 0; i < data["cart_"].length; i++) { 
									if(data["cart_"][i]["title"] != "brighten"){
										var index = data["cart_"].indexOf(data["cart_"][i]);
										var price = parseInt(data["cart_"][i]["promotionPrice"], 10) * parseInt(data["cart_"][i]["quanlity"], 10);
										var element = "<tr><td class='product-thumbnail'><a href='#'><img src='"+data["cart_"][i]["images"][0]+"' alt='man' /></a></td><td class='product-name'><a href='#'><h6 class='book-information'>{{__('bookName')}}: "+data["cart_"][i]["title"]+"</h6><h6 class='book-information'>{{__('seller')}}: "+data["cart_"][i]["otherData"]["yourName"]+"</h6></a></td><td class='product-price'><span class='amount'>"+data["cart_"][i]["promotionPrice"]+" đ</span></td><td class='product-quantity'><div class='value-button' id='decrease' onclick='decreaseValue("+index+")' value='Decrease Value'>-</div><input type='number' id='number_quantity' readonly value='"+data["cart_"][i]["quanlity"]+"'><div class='value-button' id='increase' onclick='increaseValue("+index+")' >+</div></td><td class='product-subtotal'>"+data["cart_"][i]["promotionPrice"] * data["cart_"][i]["quanlity"]+" đ</td><td class='product-remove'><a onclick='removeItemInCart("+index+")' class='btn btn-danger' ><i class='fa fa-times'></i> {{__('remove')}}</a></td></tr>";
										document.getElementById('cart-item-list').innerHTML += element;
										total += price;
									}
								}
								$("#amount").text(total+" đ");
								preloader_.style.display = "none";
							}else if(data["status"]=='failed'){
								$('meta[name=notification]').attr('content', 'error');
								$('meta[name=notification]').attr('title', 'Lỗi - Error');
								$('meta[name=notification]').attr('noticontent', 'Đã xãy ra sự cố. Không thể cập nhật giỏ hàng của bạn. Chúng tôi sẽ chủ động liên hệ bạn. (There was a problem. Your cart cannot be updated. We will actively contact you.)');
								$('meta[name=notification]').attr('icon', '#FF0000');
								preloader_.style.display = "none";
							}else{
								$('#login-modal').modal('hide');
								$('meta[name=notification]').attr('content', 'error');
								$('meta[name=notification]').attr('title', 'Lỗi - Error');
								$('meta[name=notification]').attr('noticontent', 'Lỗi cục bộ. Vui lòng liên hệ với chúng tôi qua địa chỉ email customer.care.devteam@gmail.com để sớm khắc phục lỗi này. Trân trọng. (Local error. Please contact us at customer.care.devteam@gmail.com email address to fix this soon. Best regards.)');
								$('meta[name=notification]').attr('icon', '#FF0000');
								preloader_.style.display = "none";
							}
						},
						error: function(data, textStatus, errorThrown) {
							$('meta[name=notification]').attr('content', 'warning');
							$('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
							$('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thử lại. (System error. Please try again.)');
							$('meta[name=notification]').attr('icon', '#ffa500');
							preloader_.style.display = "none";
						}
					})
					}
				
				</script>
				<div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="buttons-cart mb-30">
                            <ul>
                                <li><a href="#">{{__('continueShopping')}}</a></li>
                            </ul>
                        </div>
                        <div class="coupon">
                            <h3>{{__('coupon')}}</h3>
                            <p>{{__('couponTitle')}}</p>
                            <form action="#">
                                <input type="text" id="dev-coupon" placeholder="{{__('coupon')}}">
                                <a id="checkout-coupon-submit">{{__('use')}}</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cart_totals">
							<div class="buttons-cart mb-30">
								<ul>
									<li><a id="updateCart_">{{__('updateCart')}}</a></li>
								</ul>
							</div>
                            <table>
                                <tbody>
                                    <tr class="order-total">
                                        <th>{{__('cartTotal')}}</th>
                                        <td>
                                            <strong>
                                                <span id="amount" class="amount"></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="{{ url('checkout') }}">{{__('proceedToCheckout')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<!-- cart-main-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		
		<!-- Get CSS file -->
        @include('components.getjs')
    </body>
</html>
