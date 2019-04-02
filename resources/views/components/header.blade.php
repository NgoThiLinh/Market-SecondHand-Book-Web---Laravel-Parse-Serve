<!-- header-top-area-start -->
<?php
	$city = getCity();
	$categories = getCategories();
?>
<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="language-area">
								<ul>
									<?php
										$data = getCurrentUser();
										if ($data[0] == "en"){
											echo "
												<li><img src='/img/flag/1.jpg' alt='flag' /><a href='change-language/en'>English<i class='fa fa-angle-down'></i></a>
													<div class='header-sub'>
														<ul>
															<li><a href='change-language/vi'><img src='/img/flag/4.jpg' alt='flag' />Tiếng Việt</a></li>
														</ul>
													</div>
												</li>	
											";
										}else{
											echo "
												<li><img src='/img/flag/4.jpg' alt='flag' /><a href='change-language/vi'>Tiếng Việt<i class='fa fa-angle-down'></i></a>
													<div class='header-sub'>
														<ul>
															<li><a href='change-language/en'><img src='/img/flag/1.jpg' alt='flag' />English</a></li>
														</ul>
													</div>
												</li>	
											";
										}
									?>								
								</ul>
							</div>
						</div>
						<?php
							$data = getCurrentUser();
							if($data[0] == "en"){
								echo "<input type='hidden' name='lang' value='en'>";
							}else{
								echo "<input type='hidden' name='lang' value='vi'>";
							}
						?>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="account-area text-right">
							<?php
								$data = getCurrentUser();
								$h = $data[2];
								$id = $data[1];
								$c = $h->userName;
								if ($c == "no"){

								}else{
									$user = $data[2]->get('yourName');
								}
								if ($data[1] == "null"){
									if($data[0] == "en"){
										echo("
										<ul>
											<li><a href='' data-toggle='modal' data-target='#login-modal'><i class='fa fa-sign-in'></i> Login</a></li>
											<li><a href='' data-toggle='modal' data-target='#signup-modal'><i class='fa fa-address-book'></i> Register</a></li>
										</ul>
									");
									}else{
										echo("
										<ul>
											<li><a href='' data-toggle='modal' data-target='#login-modal'><i class='fa fa-sign-in'></i> Đăng nhập</a></li>
											<li><a href='' data-toggle='modal' data-target='#signup-modal'><i class='fa fa-address-book'></i> Đăng kí</a></li>
										</ul>
									");
									}

								}else{
									if($data[0] == "en"){
										
										for ($i = 0 ; $i< count($paymentInfor);$i++ ){

											if($paymentInfor[$i]->get("freeTrial") == 0 && $paymentInfor[$i]->get("sellerActive") == 0)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Hello: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Profile</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Change password</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Money account</a></li>
																		<li><a id = 'upNewBook' href='/profile/entermoney'><i class='fa fa-sticky-note'></i>Upload</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Logout</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
											elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 1)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Hello: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Profile</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Đổi mật khẩu</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Money account</a></li>
																		<li><a id = 'upNewBook' href='/upload'><i class='fa fa-sticky-note'></i> Upload</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Logout</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
											elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 0)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Hello: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Profile</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Change password</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Money account</a></li>
																		<li><a id = 'upNewBook' href='/profile/entermoney'><i class='fa fa-sticky-note'></i> upload</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Log out</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
										}
									
									}else{
										for ($i = 0 ; $i< count($paymentInfor);$i++ ){

											if($paymentInfor[$i]->get("freeTrial") == 0 && $paymentInfor[$i]->get("sellerActive") == 0)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Xin chào: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Xem thông tin</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Đổi mật khẩu</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Tài khoản</a></li>
																		<li><a id = 'upNewBook' href='/profile/entermoney'><i class='fa fa-sticky-note'></i>Thêm sách mới</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Đăng xuất</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
											elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 1)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Xin chào: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Xem thông tin</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Đổi mật khẩu</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Tài khoản</a></li>
																		<li><a id = 'upNewBook' href='/upload'><i class='fa fa-sticky-note'></i> Thêm sách mới</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Đăng xuất</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
											elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 0)	{
												echo( "
													<div class='profile-user'>
														<ul>
															<li><a href='#'><i class='fa fa-user-circle-o'></i> Xin chào: $user <i class='fa fa-angle-down'></i></a>
																<div class='header-sub'>
																	<ul>
																		<li><a href='/profile/userInfor'><i class='fa fa-drivers-license-o'></i> Xem thông tin</a></li>
																		<li><a href='#'><i class='fa fa-edit'></i> Đổi mật khẩu</a></li>
																		<li><a href='/profile/entermoney'><i class='fa fa-money	'></i> Tài khoản</a></li>
																		<li><a id = 'upNewBook' href='/profile/entermoney'><i class='fa fa-sticky-note'></i> Thêm sách mới</a></li>
																		<li><a href='/user/logout'><i class='fa fa-sign-out'></i> Đăng xuất</a></li>
																	</ul>
																</div>
															</li>									
														</ul>
													</div>
												");
											}
										}
									
									}
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-top-area-end -->
			<!-- header-mid-area-start -->
			<div class="header-mid-area ptb-40">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
							<div class="header-search" style = "margin-top: 67px;">
								<form>
									<input type="text" id="searchFullPage" class="searchFullPage" placeholder="Search: Mẹ luôn bên con" />
									<a href="#"><i class="fa fa-search"></i></a>
								</form>
								<div id="dev-searchContainer" class="dev-searchContainer dev-scroll">
								<?php
									$data = getBooks();
									$books = array();
									for ($i = 0; $i < count($data); $i++) {
											// array_push($books, array($data[$i]->get('title'),$data[$i]->get('promotionPrice'),$data[$i]->get('images')[0]));
											echo("
											<div class='dev-searchFull'>
												<a href='/detail/".$data[$i]->getObjectId()."' class='row'>
													<div class='col-sm-4'><img class='dev-search-img' src='".$data[$i]->get('images')[0]."'></div>
													<div class='col-sm-8'>
														<div class='dev-info-search-item'>
															<h6>".$data[$i]->get('title')."</h6>
															<h6>".$data[$i]->get('promotionPrice')." đ</h6>
														</div>
													</div>
												</a>
											</div>
											");
									}
								?>
									<div class="dev-searchFull">
										<a href="hihihi" class="row">
											<div class="col-sm-4"><img class="dev-search-img" src="https://i.imgur.com/R5gPHhd.jpg"></div>
											<div class="col-sm-8">
												<div class="dev-info-search-item">
													<h6>{{__('bookName')}}: Cư</h6>
													<h6>{{__('price')}}: 25.000 đ</h6>
												</div>
											</div>
										</a>
									</div>
									<div class="dev-searchFull">
										<a href="hihihi" class="row">
											<div class="col-sm-4"><img class="dev-search-img" src="https://i.imgur.com/R5gPHhd.jpg"></div>
											<div class="col-sm-8">
												<div class="dev-info-search-item">
													<h6>{{__('bookName')}}: Cánh hoa tuổi thơ</h6>
													<h6>{{__('price')}}: 25.000 đ</h6>
												</div>
											</div>
										</a>
									</div>
									<div class="dev-searchFull">
										<a href="hihihi" class="row">
											<div class="col-sm-4"><img class="dev-search-img" src="https://i.imgur.com/R5gPHhd.jpg"></div>
											<div class="col-sm-8">
												<div class="dev-info-search-item">
													<h6>{{__('bookName')}}: Huy Nguyễn</h6>
													<h6>{{__('price')}}: 25.000 đ</h6>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
						<script src='http://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
						<script>
						window.addEventListener('scroll', function() {
							document.getElementById("dev-searchContainer").style.display = "none";
						});

						var qsRegex;

						// init Isotope
						var $grid = $('.dev-searchContainer').isotope({
						itemSelector: '.dev-searchFull',
						layoutMode: 'fitRows',
						filter: function() {
							return qsRegex ? $(this).text().match( qsRegex ) : true;
						}
						});

						// use value of search field to filter
						var $quicksearch = $('.searchFullPage').keyup( debounce( function() {
						qsRegex = new RegExp( $quicksearch.val(), 'gi' );
						document.getElementById("dev-searchContainer").style.display = "block";
						document.getElementById("dev-searchContainer").style.position = "fixed";
						if($quicksearch.val() == ''){
							document.getElementById("dev-searchContainer").style.display = "none";
							document.getElementById("dev-searchContainer").style.position = "fixed";
						}
						$grid.isotope();
						}, 200 ) );

						// debounce so filtering doesn't happen every millisecond
						function debounce( fn, threshold ) {
						var timeout;
						threshold = threshold || 100;
						return function debounced() {
							clearTimeout( timeout );
							var args = arguments;
							var _this = this;
							function delayed() {
							fn.apply( _this, args );
							}
							timeout = setTimeout( delayed, threshold );
						};
						}
						</script>
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<div class="logo-area text-center logo-xs-mrg">
								<a href="/"><img src="/img/logo/logo.png" alt="logo" /></a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="my-cart">
								<ul>
									<li id="cart-mini-dropdown">
										<a href="#"><i class="fa fa-shopping-cart"></i>{{__('cart')}}</a>
										<?php
											$quanlity = 0;
											if (!empty($_SESSION['cart'])) {
												for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
													if($_SESSION['cart'][$i-1]["title"] != "brighten"){
														$quanlity += 1;
													}
												} 
												echo "<input type='text' class='dev-quantity-cart' id='quanlity' disabled value='$quanlity'>";
											}else{
												echo "<input type='text' class='dev-quantity-cart' id='quanlity' disabled value='0'>";
											}
										?>
										<div class="mini-cart-sub">
											<div id="item-list" class="cart-product">
												
											</div>
											<div class="cart-totals">
												<h5>{{__('total')}} <span id="total-price"></span></h5>
											</div>
											<div class="cart-bottom">
												<a class="view-cart" href="/cart">{{__('viewCart')}}</a>
												<a href="/checkout">{{__('checkout')}}</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-mid-area-end -->
			<!-- main-menu-area-start -->
			<div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="menu-area">
								<nav>
									<ul>
										<li class="active"><a href="/">{{__('home')}}</a>
										</li>
										<li><a href="book">{{__('category')}}<i class="fa fa-angle-down"></i></a>
											<div class="sub-menu sub-menu-2">
											@for ($i = 0; $i < count($categories); $i++)
												<ul>
													<li>
														<a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
															{{__($categories[$i]->get('categoryName'))}}
														</a>
													</li>
												</ul>
											@endfor
											</div>
										</li>
										<li><a href="/about">{{__('aboutus')}}</a>
										</li>
										<li><a href="/contact">{{__('contact')}}</a>
										</li>
										<li><a href="/policy">{{__('policy')}}</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- main-menu-area-end -->
			<!-- mobile-menu-area-start -->
			<div class="mobile-menu-area hidden-md hidden-lg">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul id="nav">
										<li><a href="/">{{__('home')}}</a>
										</li>
										<li><a href="book">{{__('category')}}</a>
											<ul>
                                                @for ($i = 0; $i < count($categories); $i++)
												<li>
                                                    <a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
														{{__($categories[$i]->get('categoryName'))}}
													</a>
                                                </li>
                                                @endfor
											</ul>
										</li>
										<li><a href="/about">{{__('aboutus')}}</a>
										</li>
										<li><a href="/contact">{{__('contact')}}</a>
										</li>
										<li><a href="/policy">{{__('policy')}}</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
			<div id="login-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
			    	<div class="modal-content1">
			     		<div class="modal-header">
			     			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        	<span aria-hidden="true" style="color:black;">&times;</span>
				        	</button>
				        	<h4 class="modal-title text-center">{{__('login')}}</h4>
			      		</div>
			      		<div class="modal-body">
			        		<form>
			        		<div class="form-group text-left">
			            		<label for="recipient-name" class="col-form-label">{{__('emailOrphone')}}</label>
			            		<input type="text" class="form-control" id="userName" placeholder="{{__('emailOrphone')}}">
			          		</div>
          		<div class="form-group text-left">
            		<label for="recipient-name" class="col-form-label">{{__('password')}}</label>
            		<input type="password" class="form-control" id="userPassword" placeholder="{{__('password')}}">
          		</div>
       			</form>
				   <!-- <h5 class="text-left"><a href="">{{__('forgetPassword')}}?</a></h5> -->
				   <h5 class="text-left">{{__('forgetPasswordTitle')}} <span id="forgetpassword">{{__('clickHere')}}?</span></h5>
				<div class="coupon-checkout-content text-left" id="checkout_email">
					<div class="coupon-info">
						<form action="#">
							<p class="checkout-coupon" id="check-forget-email">
								<input type="text" id="dev-email" placeholder="{{__('enterYourEmail')}}?">
								<svg viewBox="0 0 16 16">
										<path d="M10.8000002,10.8000002 C9.85000038,11.6500006 9.18349609,12 8,12 C5.80000019,12 4,10.1999998 4,8 C4,5.80000019 5.80000019,4 8,4 C10.1999998,4 12,6 12,8 C12,9.35332031 12.75,9.5 13.5,9.5 C14.25,9.5 15,8.60000038 15,8 C15,4 12,1 8,1 C4,1 1,4 1,8 C1,12 4,15 8,15 C12,15 15,12 15,8"></path>
										<polyline points="5 8.375 7.59090909 11 14.5 4" transform='translate(0 -0.5)'></polyline>
								</svg>
								<input type="button" class="dev-btn" id="forget-email-submit" value="{{__('submit')}}">
							</p>
						</form>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<a href="" class="account">Bạn chưa có tài khoản?</a>
        		<button type="button" id="user-login" class="btn btn-primary">{{__('login')}}</button>
      		</div>
      	</div>
  	</div>
</div>
{{ csrf_field() }}
<div id="signup-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
     		<div class="modal-header">
     			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	<span aria-hidden="true" style="color:black;">&times;</span>
	        	</button>
	        	<h4 class="modal-title text-center" id="exampleModalLabel">{{__('register')}}</h4>
      		</div>
      		<div class="modal-body">
        	<form>
				<div class="row">
					<div class="form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('yourName')}}</label>
						<input type="text" class="form-control" id="yourName" placeholder="{{__('yourName')}}">
					</div>

					<div class="form-group text-left col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('city')}}</label>
						<select id="city" class="dev-register-select">
							<option style="color: red" value="">{{__('chooseProvince')}}</option>
								@foreach($city as $newdata)
									@foreach($newdata as $hi)
										<option data-code="{{$hi['code']}}" value="{{$hi['name']}}">{{$hi['name']}}</option>
									@endforeach
								@endforeach
						</select>
					</div>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

					<div class="form-group text-left col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('district')}}</label>
						<select id="distric" class="dev-register-select">
							<option value="">{{__('chooseDistric')}}</option>
						</select>
					</div>

					<div class="form-group text-left col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('commune')}}</label>
						<select id="commune" class="dev-register-select">
							<option value="">{{__('chooseCommun')}}</option>
						</select>
					</div>

					<div id="phone-data" class="phone form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('phone')}}</label>
						<input type="text" id="phone" placeholder="0352213396">
						<svg viewBox="0 0 16 16">
							<path d="M10.8000002,10.8000002 C9.85000038,11.6500006 9.18349609,12 8,12 C5.80000019,12 4,10.1999998 4,8 C4,5.80000019 5.80000019,4 8,4 C10.1999998,4 12,6 12,8 C12,9.35332031 12.75,9.5 13.5,9.5 C14.25,9.5 15,8.60000038 15,8 C15,4 12,1 8,1 C4,1 1,4 1,8 C1,12 4,15 8,15 C12,15 15,12 15,8"></path>
							<polyline points="5 8.375 7.59090909 11 14.5 4" transform='translate(0 -0.5)'></polyline>
						</svg>
					</div>

					<div id="email-data" class="email form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('emailAddress')}}</label>
						<input type="text" id="emailAddress" placeholder="youremail@domain.com">
						<svg viewBox="0 0 16 16">
							<path d="M10.8000002,10.8000002 C9.85000038,11.6500006 9.18349609,12 8,12 C5.80000019,12 4,10.1999998 4,8 C4,5.80000019 5.80000019,4 8,4 C10.1999998,4 12,6 12,8 C12,9.35332031 12.75,9.5 13.5,9.5 C14.25,9.5 15,8.60000038 15,8 C15,4 12,1 8,1 C4,1 1,4 1,8 C1,12 4,15 8,15 C12,15 15,12 15,8"></path>
							<polyline points="5 8.375 7.59090909 11 14.5 4" transform='translate(0 -0.5)'></polyline>
						</svg>
					</div>

					<div class="form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('password')}}</label>
						<input type="password" class="form-control" id="password" placeholder="**********">
					</div>

					<div class="form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="col-form-label">{{__('ConfirmPassword')}}</label>
						<input type="password" class="form-control" id="ConfirmPassword" placeholder="**********">
					</div>
					<div class="form-group text-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label>
						<input type="checkbox" id="agree" checked="checked">
						<span id="agree-lb" class="psw">Bạn đã đồng ý với <a href="#">điều khoản dịch vụ</a> của chúng tôi</span>
						</label>
					</div>
				</div>
        	</form>
      		</div>
      		<div class="modal-footer">
        		<a href="" class="account">Bạn đã có tài khoản?</a>
        		<button type="button" id="register" class="btn btn-primary">{{__('signin')}}</button>
      		</div>
      	</div>
  	</div>
</div>


<script>
	document.getElementById("agree").checked = false;
</script>







