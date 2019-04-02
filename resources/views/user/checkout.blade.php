
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="_token" content="{{csrf_token()}}" /> 
		<meta name="notification" content="" title="" noticontent="" icon=""/>
		<meta name="address" city="" />
        <title>{{__('loading')}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body class="checkout" onload="starting()">
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

			var _data_ = $('input[name="_data_"]').val();
			if(_data_ == 0){
				$(':input[id="orderSubmit"]').prop('disabled', true);
			}else{
			}
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"getCartDataForCheckoutPage",
				method:"POST",
				data:{
					_token: _token	
				},
				success:function(data)
				{
					if(data[0]["status"] != "failed"){
						var citySelect = document.getElementById('city-dev');
						var districtSelect = document.getElementById('distric-dev');
						var communeSelect = document.getElementById('commune-dev');

						document.getElementById('name').value= data[0]["yourName"];

						var cityOption = document.createElement('option');
						cityOption.value = data[0]["address"][2];
						cityOption.id = "city-dev-data";
						cityOption.innerHTML = data[0]["address"][2];
						citySelect.appendChild(cityOption);
						document.querySelector('#city-dev > option[id="city-dev-data"]').setAttribute('selected',true);

						var districtOption = document.createElement('option');	
						districtOption.value = data[0]["address"][1];
						districtOption.id = "district-dev-data";
						districtOption.innerHTML = data[0]["address"][1];
						districtSelect.appendChild(districtOption);
						document.querySelector('#distric-dev > option[id="district-dev-data"]').setAttribute('selected',true);

						var communeOption = document.createElement('option');	
						communeOption.value = data[0]["address"][0];
						communeOption.id = "commune-dev-data";
						communeOption.innerHTML = data[0]["address"][0];
						communeSelect.appendChild(communeOption);
						document.querySelector('#commune-dev > option[id="commune-dev-data"]').setAttribute('selected',true);

						document.getElementById('address').value= data[0]["addressFull"];
						document.getElementById('ck-emailAddress').value= data[0]["emailAddress"];
						document.getElementById('ck-phone').value= data[0]["phoneNumber"];

						var ck_emailAddress = document.getElementById("ck-email-data");
						ck_emailAddress.classList.add("success");
						var ck_phone = document.getElementById("ck-phone-data");
						ck_phone.classList.add("success");
						
						preloader_.style.display = "none";
					}else{
                        preloader_.style.display = "none";
					}
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
								<li><a href="/checkout" class="active">{{__('checkout')}}</a></li>
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
							<h2>{{__('checkout')}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area-end -->
		<!-- coupon-area-area-start -->
		<div class="coupon-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="coupon-accordion">
							<?php
								$data = getCurrentUser();
								$h = $data[2];
								$id = $data[1];
								$c = $h->userName;

								if ($c == "no"){
									if($data[0] == 'en'){
										echo("<h3>You are not login. <span data-toggle='modal' data-target='#login-modal'> Click here to login</span></h3>");
									}else{
										echo("<h3>Bạn chưa đăng nhập. <span data-toggle='modal' data-target='#login-modal'> Nhấn vào đây để đăng nhập</span></h3>");
									}
								}else{
									// Đã đăng nhập, không hiển thị nửa
								}
								
							?>
							
							<div class="coupon-content" id="checkout-login">
								<div class="coupon-info">
									<p class="coupon-text">{{__('loginRequireNotification')}}</p>
									<form action="#">
										<p class="form-row-first">
											<label>{{__('userNameOrEmail')}}<span class="required">*</span></label>
											<input type="text">
										</p>
										<p class="form-row-last">
											<label>{{__('password')}}  <span class="required">*</span></label>
											<input type="text">
										</p>
										<p class="form-row">					
											<input type="submit" value="{{__('login')}}">
											<label>
												<input type="checkbox">
												{{__('savePassword')}}
											</label>
										</p>
										<p class="lost-password">
											<a href="#">{{__('forgetPassword')}}?</a>
										</p>
									</form>
								</div>
							</div>
							<h3>{{__('coupon')}}. <span id="showcoupon">{{__('couponTitle')}}</span></h3>
							<div class="coupon-checkout-content" id="checkout_coupon">
								<div class="coupon-info">
									<form action="#">
										<p class="checkout-coupon">
											<input type="text" id="dev-coupon" placeholder="{{__('coupon')}}">
											<input type="button" class="dev-btn" id="checkout-coupon-submit" value="{{__('use')}}">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- coupon-area-area-end -->
		<!-- checkout-area-start -->
		<div class="checkout-area mb-70">
			<div class="container">
				<div class="row">
					<form action="#">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="checkbox-form">						
								<h3>{{__('orderDetail')}}</h3>
								<h5 class="mainColorOrange">{{__('changeInformationRemind')}}</h5>
								<div class="row">
									<div class="col-lg-12">
										<div class="checkout-form-list">
											<label>{{__('yourName')}} <span class="required">*</span></label>										
											<input id="name" type="text" placeholder="{{__('yourName')}}">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="country-select">
											<label> {{__('city')}}<span class="required">*</span></label>
											<select id="city-dev">
												<option style="color: red" value="">{{__('chooseProvince')}}</option>
											  	@foreach($city as $newdata)
													@foreach($newdata as $hi)
														<option data-code="{{$hi['code']}}" value="{{$hi['name']}}">{{$hi['name']}}</option>
													@endforeach
												@endforeach
											</select> 	
											{{ csrf_field() }}		
											
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
											<script>
																		
																						
											</script>
											<?php
											$_data_ = 0;
												if (!empty($_SESSION['cart'])) {
													for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
														if($_SESSION['cart'][$i-1]["title"] != "brighten"){
															$_data_ += 1;
														}
													} 
													echo "<input type='hidden' name='_data_' value='$_data_'>";
												}else{
													echo "<input type='hidden' name='_data_' value='$_data_'>";
												}
											?>
											<script>
												function runtime() {
													setTimeout("runtime()",400);
													// console.log('The system is running');
												}
												runtime();
											</script>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="country-select">
											<label>{{__('district')}} <span class="required">*</span></label>
											<select id="distric-dev">
											  <option value="">{{__('chooseDistric')}}</option>
											</select> 										
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="country-select">
											<label>{{__('commune')}} <span class="required">*</span></label>
											<select id="commune-dev">
												<option value="">{{__('chooseCommun')}}</option>
											</select> 
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list">
											<label>{{__('address')}} <span class="required">*</span></label>
											<input id="address" type="text" placeholder="{{__('streetAddress')}}">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list">									
											<input id="addressDetail" type="text" placeholder="{{__('addressRecommend')}}({{__('optional')}})">
										</div>
									</div>
									<div id="ck-email-data" class="email form-group text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label class="col-form-label">{{__('emailAddress')}}</label>
										<input type="text" id="ck-emailAddress" class="ck-input" placeholder="youremail@domain.com">
										<svg viewBox="0 0 16 16">
											<path d="M10.8000002,10.8000002 C9.85000038,11.6500006 9.18349609,12 8,12 C5.80000019,12 4,10.1999998 4,8 C4,5.80000019 5.80000019,4 8,4 C10.1999998,4 12,6 12,8 C12,9.35332031 12.75,9.5 13.5,9.5 C14.25,9.5 15,8.60000038 15,8 C15,4 12,1 8,1 C4,1 1,4 1,8 C1,12 4,15 8,15 C12,15 15,12 15,8"></path>
											<polyline points="5 8.375 7.59090909 11 14.5 4" transform='translate(0 -0.5)'></polyline>
										</svg>
									</div>
									<div id="ck-phone-data" class="phone form-group text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label class="col-form-label ck-lable">{{__('phone')}} <span class="required ck-required-span">*</span></label>
										<input type="text" id="ck-phone" class="ck-input" placeholder="0123456789">
										<svg viewBox="0 0 16 16">
											<path d="M10.8000002,10.8000002 C9.85000038,11.6500006 9.18349609,12 8,12 C5.80000019,12 4,10.1999998 4,8 C4,5.80000019 5.80000019,4 8,4 C10.1999998,4 12,6 12,8 C12,9.35332031 12.75,9.5 13.5,9.5 C14.25,9.5 15,8.60000038 15,8 C15,4 12,1 8,1 C4,1 1,4 1,8 C1,12 4,15 8,15 C12,15 15,12 15,8"></path>
											<polyline points="5 8.375 7.59090909 11 14.5 4" transform='translate(0 -0.5)'></polyline>
										</svg>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list create-acc">	
											<input type="checkbox" id="cbox">
											<label data-toggle="modal" data-target="#signup-modal">{{__('createAccount')}}?</label>
										</div>
									</div>	
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 order-notes ">
										<div class="checkout-form-list">
											<label>{{__('note')}}</label>
											<textarea id="note" placeholder="{{__('noteEx')}}" rows="10" cols="30" id="checkout-mess"></textarea>
										</div>									
									</div>							
								</div>
																			
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="your-order">
								<h3>{{__('yourOrder')}}</h3>
								<div class="your-order-table table-responsive">
									<table>
										<thead>
											<tr>
												<th class="product-name">{{__('product')}}</th>
												<th class="product-total">{{__('total')}}</th>
											</tr>							
										</thead>

										<tbody id="dev-table-items">
										<?php
										if (!empty($_SESSION['cart'])) {
											for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
												if($_SESSION['cart'][$i-1]["title"] != "brighten"){
													$price = ($_SESSION['cart'][$i-1]["promotionPrice"]) * ($_SESSION['cart'][$i-1]["quanlity"]);
													echo("
													<tr class='cart_item'>
														<td class=''>
															<div class='cart-product'>
																<div class='single-cart'>
																	<div class='cart-img'>
																		<a><img src='".$_SESSION['cart'][$i-1]["images"][0]."' /></a>
																	</div>
																	<div class='cart-info'>
																		<h5><a>".$_SESSION['cart'][$i-1]["title"]."</a></h5>
																		<span class='item-price'>".$_SESSION['cart'][$i-1]["promotionPrice"]."</span>
																		<span class='item-quantity'> x ".$_SESSION['cart'][$i-1]["quanlity"]."</span>
																	</div>
																</div>
															</div>
														</td>
														<td class='product-total'>
															<span class='amount'>".$price."</span>
														</td>
													</tr>
													");
												}
											} 
										}else{
											echo("Không có sản phẩm nào trong giỏ hàng của bạn! (There are no products in your shopping cart!)");
										}
										?>
										</tbody>
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
															$('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đã thêm vào giỏ hàng. (Your request has been processed. Login successfully.)');
															$('meta[name=notification]').attr('icon', '#008000');
															document.getElementById("quanlity").value = data["numberOfItem"];
															$("#item-list").empty();
															$("#dev-table-items").empty();
															
															for (var i = 0; i < data["cart_"].length; i++) { 
																if(data["cart_"][i]["title"] != "brighten"){
																	var index = data["cart_"].indexOf(data["cart_"][i]);
																	var price = parseInt(data["cart_"][i]["promotionPrice"], 10) * parseInt(data["cart_"][i]["quanlity"], 10);
																	var element = "<tr class='cart_item'><td class=''><div class='cart-product'><div class='single-cart'><div class='cart-img'><a><img src='"+data["cart_"][i]["images"][0]+"' /></a></div><div class='cart-info'><h5><a>"+data["cart_"][i]["title"]+"</a></h5><span class='item-price'>"+data["cart_"][i]["promotionPrice"]+"</span><span class='item-quantity'> x "+data["cart_"][i]["quanlity"]+"</span></div></div></div></td><td class='product-total'><span class='amount'>"+price+"</span></td></tr>";
																	document.getElementById('dev-table-items').innerHTML += element;
																	total += price;
																}
															}
															$("#amount").text(total+" đ");
															$("#ck-amount").text(total+" đ");
															$("#ck-vat").text((total * 10) / 100+" đ");
															$("#ck-total").text(+(((total * 10) / 100) + total)+" đ");

															
															preloader_.style.display = "none";
														}else if(data["status"]=='failed'){
															$('meta[name=notification]').attr('content', 'error');
															$('meta[name=notification]').attr('title', 'Lỗi - Error');
															$('meta[name=notification]').attr('noticontent', 'Tên đăng/email hoặc mật khẩu không đúng. Vui lòng kiểm tra và thử lại. (Username/email or password is not correct. Please check and try again.)');
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
														$('meta[name=notification]').attr('noticontent', 'Lỗi hệ thống. Vui lòng thử lại');
														$('meta[name=notification]').attr('icon', '#ffa500');
														preloader_.style.display = "none";
													}
												})
											}
										</script>
										<tfoot>
											<tr class="cart-subtotal">
												<th>{{__('subTotal')}}</th>
												<?php
													$quanlity = 0;
													if (!empty($_SESSION['cart'])) {
														for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
															if($_SESSION['cart'][$i-1]["title"] != "brighten"){
																$quanlity += $_SESSION['cart'][$i-1]["promotionPrice"]* $_SESSION['cart'][$i-1]["quanlity"];
															}
														} 
														echo("<td><span id='ck-amount' class='amount'>".$quanlity." đ</span></td>");
													}
												?>
											</tr>
											<tr class="shipping">
												<th>{{__('otherPayment')}}</th>
												<td>
													<ul>
														<li>
															<label class="tax">
															
															{{__('VATtax')}} (10%): 
															<?php
																$quanlity = 0;
																if (!empty($_SESSION['cart'])) {
																	for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
																		if($_SESSION['cart'][$i-1]["title"] != "brighten"){
																			$quanlity += $_SESSION['cart'][$i-1]["promotionPrice"]* $_SESSION['cart'][$i-1]["quanlity"];
																		}
																	} 
																	echo("<span id='ck-vat' class='amount'>".($quanlity * 10) / 100 ." đ</span>");
																}
															?>
															
															</label >
														</li>
														<li>
															<label class="tax">
															{{__('shipping')}}: ({{__('shippingNotification')}})<span class="amount"></span>
															</label>
														</li>
														<li></li>
													</ul>
												</td>
											</tr>
											<tr class="order-total">
												<th>{{__('orderTotal')}}</th>
												<td>
												<?php
													$quanlity = 0;
													if (!empty($_SESSION['cart'])) {
														for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
															if($_SESSION['cart'][$i-1]["title"] != "brighten"){
																$quanlity += $_SESSION['cart'][$i-1]["promotionPrice"]* $_SESSION['cart'][$i-1]["quanlity"];
															}
														} 
														echo("<strong><span id='ck-total' class='amount'>".((($quanlity * 10) / 100) + $quanlity)." đ</span></strong>");
													}
												?>
												</td>
											</tr>								
										</tfoot>
									</table>
								</div>
								<div class="payment-method">
									<div class="payment-accordion">
										<div class="collapses-group">
											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse">
															  {{__('note')}}
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse in" role="tabpanel">
														<div class="panel-body">
															<p>
																{{__('noteForRecever')}}
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="order-button-payment">
										<input type="button" id="orderSubmit" value="{{__('placeOrder')}}">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- checkout-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		
		<!-- Get CSS file -->
        @include('components.getjs')
    </body>
</html>
