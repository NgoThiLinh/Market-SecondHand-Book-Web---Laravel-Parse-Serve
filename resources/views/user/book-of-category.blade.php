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
    <body onload="starting()" class="shop">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- Preloader -->
        <!-- <section class="preloader">
            <div class="spinner">
                <span class="spinner-rotate"></span>
            </div>
        </section> -->
        <!-- header-area-start -->
        <header>
        	@include('components.header')
		</header>
		<!-- header-area-end -->
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="/">{{__('home')}}</a></li>
								<li><a href="/book" class="active">{{__('book')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- shop-main-area-start -->
		<div class="shop-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">
							<div class="section-title-5 mb-30">
								<h2>{{__('shoppingOption')}}</h2>
							</div>
							<div class="left-title mb-20">
								<h4>{{__('category')}}</h4>
							</div>
							<div class="left-menu mb-30">
								<ul>
                                    @for ($i = 0; $i < count($categories); $i++)
                                    <li>
                                        <a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
                                            {{__($categories[$i]->get('categoryName'))}}
                                            @for ($j = 0; $j < count($numberOfBookByCate); $j++)
                                            @if($i==$j)
                                            <span>{{$numberOfBookByCate[$j]}}</span>
                                            @endif
                                            @endfor
                                        </a>
                                    </li>
                                    @endfor
								</ul>
							</div>
                            <div class="left-title mb-20">
								<h4>{{__('bookLanguage')}}</h4>
							</div>
                            <div class="left-menu mb-30">
								<ul>
									<li><a href="#">{{__('vietnamese')}}<span>(1)</span></a></li>
									<li><a href="#">{{__('english')}}<span>(11)</span></a></li>
									<li><a href="#">{{__('other')}}<span>(2)</span></a></li>
								</ul>
							</div>
							<div class="banner-area mb-30">
								<div class="banner-img-2">
									<a href="#"><img src="img/banner/31.jpg" alt="banner" /></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="category-image mb-30">
							<a href="#"><img src="img/banner/32.jpg" alt="banner" /></a>
						</div>
						<div class="section-title-5 mb-30">
							<h2>{{__('book')}}</h2>
						</div>
						<div class="toolbar mb-30">
                            <div class="shop-tab">
								<div class="tab-3">
                                    <div class="header-search">
                                        <form action="#">
                                            <input type="text" id="quicksearch" class="quicksearch" placeholder="{{__('enterKeyWord')}}" />
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
								</div>
							</div>
							<div class="toolbar-sorter">
								<span>{{__('sort')}}</span>
								<select id="sorter" class="sorter-options" data-role="sorter">
									<option selected="selected" value="1"> {{__('allbook')}} </option>
									<option value="2"> {{__('latest')}} </option>
									<option value="3"> {{__('lowToHigh')}} </option>
                                    <option value="4"> {{__('highToLow')}} </option>
								</select>
								{{-- <a href="#"><i class="fa fa-arrow-up"></i></a> --}}
							</div>
						</div>
						<!-- tab-area-start -->
						<div class="tab-content">
							<div class="tab-pane active" id="th"> 
                                <div class="row">
									<div id="dev-root" class="pagination_container">
										@if(count($detailBookByCate)==0)
										<div class="col-lg-12 col-md-12 col-sm-12 single-item">
											Có 0 quyển sách thuộc thể loại này.
										</div>
										@elseif(count($detailBookByCate) > 0)
										@for ($i = 0; $i < count($detailBookByCate); $i++)
										<div class="col-lg-3 col-md-4 col-sm-6 single-item">
											<!-- single-product-start -->
											<div class="product-wrapper mb-40">
												<div class="product-img">
													<a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}">
														<img src="{{$detailBookByCate[$i]->get('images')[0]}}" alt="book" class="primary">
													</a>
												</div>
												<div class="product-details text-center">
													<h4><a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}">{{$detailBookByCate[$i]->get('title')}}</a></h4>
													<div class="product-price">
														<ul>
															<li>{{$detailBookByCate[$i]->get("promotionPrice")}} đ</li>
															<li class="old-price">{{$detailBookByCate[$i]->get("OriginPrice")}} đ</li>
														</ul>
													</div>
												</div>
												<div class="product-link">
													<div class="product-button">
														<a onclick="clientAddToCart('{{$detailBookByCate[$i]->getObjectId()}}')" title="{{__('addToCart')}}">
															<i class="fa fa-shopping-cart"></i>{{__('addToCart')}}
														</a>
													</div>
													<div class="add-to-link">
														<ul>
															<li><a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- single-product-end -->
										</div>
										@endfor
										@endif
									</div>

									<div id="dev-root_" class="dev-root_" >
										@if(count($detailBookByCate)==0)
										<div class="col-lg-12 col-md-12 col-sm-12 single-item">
											Có 0 quyển sách thuộc thể loại này.
										</div>
										@elseif(count($detailBookByCate) > 0)
										@for ($i = 0; $i < count($detailBookByCate); $i++)
										<div class="col-lg-3 col-md-4 col-sm-6 dev-single-item">
											<!-- single-product-start -->
											<div class="product-wrapper mb-40">
												<div class="product-img">
													<a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}">
														<img src="{{$detailBookByCate[$i]->get('images')[0]}}" alt="book" class="primary">
													</a>
												</div>
												<div class="product-details text-center">
													<h4><a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}">{{$detailBookByCate[$i]->get('title')}}</a></h4>
													<div class="product-price">
														<ul>
															<li>{{$detailBookByCate[$i]->get("promotionPrice")}} đ</li>
															<li class="old-price">{{$detailBookByCate[$i]->get("OriginPrice")}} đ</li>
														</ul>
													</div>
												</div>
												<div class="product-link">
													<div class="product-button">
														<a onclick="clientAddToCart('{{$detailBookByCate[$i]->getObjectId()}}')" title="{{__('addToCart')}}">
															<i class="fa fa-shopping-cart"></i>{{__('addToCart')}}
														</a>
													</div>
													<div class="add-to-link">
														<ul>
															<li><a href="/detail/{{$detailBookByCate[$i]->getObjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- single-product-end -->
										</div>
										@endfor
										@endif
									</div>
								</div>
							</div>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
							<script src='http://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
							<script>
								// quick search regex

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
										if(data["status"]=='success'){
											$('#login-modal').modal('hide');
											$('meta[name=notification]').attr('content', 'success');
											$('meta[name=notification]').attr('title', 'Thành công -  Successfully');
											$('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đã thêm vào giỏ hàng. (Your request has been processed. Login successfully.)');
											$('meta[name=notification]').attr('icon', '#008000');
											document.getElementById("quanlity").value = data["numberOfItem"];
											$("#item-list").empty();
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
								var devroot = document.getElementById("dev-root");
								var devroot_ = document.getElementById("dev-root_");
								devroot_.style.display = "none";
								var qsRegex;

								// init Isotope
								var $grid = $('.dev-root_').isotope({
								itemSelector: '.dev-single-item',
								layoutMode: 'fitRows',
								filter: function() {
									return qsRegex ? $(this).text().match( qsRegex ) : true;
								}
								});

								// use value of search field to filter
								var $quicksearch = $('.quicksearch').keyup( debounce( function() {
								qsRegex = new RegExp( $quicksearch.val(), 'gi' );

								var data_search_input = document.getElementById("quicksearch").value;
								var pagination = document.getElementById("pagination");

								if (data_search_input == ''){
									devroot_.style.display = "none";
									devroot.style.display = "block";
									pagination.style.display = "block";
								}else{
									devroot_.style.display = "block";
									devroot.style.display = "none";
									pagination.style.display = "none";
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
							
							<script>
								function clientAddToCart(data){
									preloader_.style.display = "block";
									var _token = $('input[name="_token"]').val();
									$.ajax({
									url:"clientAddToCart",
									method:"POST",
									data:{
										data: data,
										_token: _token	
									},
									datatype: 'json',
									success:function(data)
									{
										if(data["status"]=='success'){
											$('#login-modal').modal('hide');
											$('meta[name=notification]').attr('content', 'success');
											$('meta[name=notification]').attr('title', 'Thành công -  Successfully');
											$('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện. Đã thêm vào giỏ hàng. (Your request has been processed. Login successfully.)');
											$('meta[name=notification]').attr('icon', '#008000');
											document.getElementById("quanlity").value = data["numberOfItem"];
											preloader_.style.display = "none";
										}else if(data["status"]=='failed'){
											$('meta[name=notification]').attr('content', 'error');
											$('meta[name=notification]').attr('title', 'Lỗi - Error');
											$('meta[name=notification]').attr('noticontent', 'Không thể thêm sản phẩm này vào giỏ hàng. Có thể đã hết hạn hoặc không còn trong kho. (Cannot add this product to cart. May have expired or no longer in stock.)');
											$('meta[name=notification]').attr('icon', '#FF0000');
											preloader_.style.display = "none";
										}else if(data["status"]=='full'){
											$('meta[name=notification]').attr('content', 'warning');
											$('meta[name=notification]').attr('title', 'Sản phẩm đã tồn tại - Product exists already');
											$('meta[name=notification]').attr('noticontent', 'Không thể thêm sản phẩm này vào giỏ hàng. Sản phẩm này đã tồn tại trong giỏ hàng của bạn. (Cannot add this product to cart. This product already exists in your cart.)');
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
										$('meta[name=notification]').attr('noticontent', 'Hệ thống đang bận. Vui lòng quay lại sau vài phút. (The system is busy. Please come back in a few minutes)');
										$('meta[name=notification]').attr('icon', '#ffa500');
										preloader_.style.display = "none";
									}
								})
								}
							</script>
						</div>
						<!-- tab-area-end -->
					</div>
				</div>
			</div>
		</div>
		<!-- shop-main-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		<!-- Get CSS file -->
        @include('components.getjs')
    </body>
</html>