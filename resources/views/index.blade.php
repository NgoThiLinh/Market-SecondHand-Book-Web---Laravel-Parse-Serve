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

    <body>
		<!-- header-area-start -->
        <header>
            @include('components.header')
		</header>
		<?php
			if(!empty($_SESSION["page"])) {
				if($_SESSION["page"] != "null"){
					echo "<input type='hidden' name='c_' value='".$_SESSION["page"]."'>";
					$_SESSION["page"] = "null";
				}else{
					echo "<input type='hidden' name='c_' value='null'>";
				}
			} else {
				echo "<input type='hidden' name='c_' value='null'>";
			}
		?>
		<!-- header-area-end -->
		<!-- banner-area-start -->
		<div class="banner-area banner-res-large ptb-35">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner">
							<div class="banner-img">
								<img src="img/banner/1.png" alt="banner" />
							</div>
							<div class="banner-text">
								<h4>{{__('prestige')}}</h4>
								<p>{{__('prestige-content')}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner">
							<div class="banner-img">
								<img src="img/banner/2.png" alt="banner" />
							</div>
							<div class="banner-text">
								<h4>{{__('quality')}}</h4>
								<p>{{__('quality-content')}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
						<div class="single-banner">
							<div class="banner-img">
								<img src="img/banner/3.png" alt="banner" />
							</div>
							<div class="banner-text">
								<h4>{{__('cheap')}}</h4>
								<p>{{__('cheap-content')}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner mrg-none-xs">
							<div class="banner-img">
								<img src="img/banner/4.png" alt="banner" />
							</div>
							<div class="banner-text">
								<h4>{{__('user-friendly')}}</h4>
								<p>{{__('user-friendly-content')}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area-end -->
		<!-- slider-area-start -->
		<div class="slider-area">
			<div class="slider-active owl-carousel">
				<div class="single-slider pt-125 pb-130 bg-img" style="background-image:url(img/slider/1.png);">
				    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="slider-content slider-content-1 slider-animated-1">
                                    <h2>{{__('brand')}}</h2>
                                    <h1>{{__('slogan')}}</h1>
                                    <h3>{{__('quote1')}}</h3>
                                    <a href="book">{{__('readmore')}}</a>
                                </div>
                            </div>
                        </div>
				    </div>
				</div>
				<div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url(img/slider/2.jpg);">
				    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
				                <div class="slider-content slider-content-2 slider-animated-1">
                                    <h2>{{__('brand')}}</h2>
                                    <h1>{{__('slogan')}}</h1>
                                    <h3>{{__('quote2')}}</h3>
                                    <a href="book">{{__('readmore')}}</a>
                                </div>
                            </div>
                        </div>
				    </div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- product-area-start -->
		<div class="product-area pt-95 xs-mb">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title text-center mb-50">
							<h2>{{__('newbook')}}</h2>
						</div>
					</div>
				</div>
				<!-- tab-area-start -->
				<div class="tab-content">
					<div class="tab-pane active" id="Audiobooks">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            @for ($i = 0; $i < count($showNewBook); $i++)
                            <div class="product-wrapper">
                                @for ($j = 0; $j < 1; $j++)
                                <div class="product-img" data-thumb="{{$showNewBook[$i]->get('images')[$j]}}">
                                    <a href="detail/{{$showNewBook[$i]->getObjectId()}}">
                                        <img src="{{$showNewBook[$i]->get("images")[$j]}}" alt="woman" class="primary" />
                                    </a>
                                </div>
                                @endfor
                                <div class="product-details text-center">
                                    <h4><a href="detail/{{$showNewBook[$i]->getObjectId()}}">{{$showNewBook[$i]->get('title')}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>{{$showNewBook[$i]->get('promotionPrice')}} đ</li>
                                            <li class="old-price">{{$showNewBook[$i]->get('OriginPrice')}} đ</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a onclick="clientAddToCart('{{$showNewBook[$i]->getObjectId()}}')" title="{{__('addToCart')}}">
											<i class="fa fa-shopping-cart"></i>{{__('addToCart')}}
										</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="detail/{{$showNewBook[$i]->getObjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
				    </div>
			    </div>
		    </div>
		</div>
		<!-- banner-area-start -->
		<div class="banner-area-5 mtb-95">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner-img-2">
							<img src="img/banner/5.jpg" alt="banner" />
							<div class="banner-text">
								<h3>{{__('quote3')}}</h3>
								<h2>{{__('quote4')}}</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area-end -->
		<!-- bestseller-area-start -->
		<div class="bestseller-area pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="bestseller-content">
							<h1>{{__('bestseller')}}</h1>
							<h2>{{$listBestSellerName[0]}}</h2>
							<p>{{__('quote5')}}</p>
							<div class="social-author">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="banner-img-2">
							 <img src="img/banner/6.jpg" alt="banner" />
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="bestseller-active owl-carousel">
	                        @for ($i = 0; $i < count($allBookOfBestSeller); $i++)
								<div class="bestseller-total">
									<div class="single-bestseller mb-25">
	                                @for ($j = 0; $j < 1; $j++)
										<div class="bestseller-img" data-thumb="{{$allBookOfBestSeller[$i]->get("images")[$j]}}">
											<a href="detail/{{$allBookOfBestSeller[$i]->getObjectId()}}"><img src="{{$allBookOfBestSeller[$i]->get("images")[$j]}}" alt="woman"/></a>
										</div>
	                                @endfor
										<div class="bestseller-text text-center">
											<h3> <a href="detail/{{$allBookOfBestSeller[$i]->getObjectId()}}">{{$allBookOfBestSeller[$i]->get('title')}}</a></h3>
											<div class="price">
												<ul>
													<li><span class="new-price">{{$allBookOfBestSeller[$i]->get('promotionPrice')}} đ</span></li>
													<li><span class="old-price">{{$allBookOfBestSeller[$i]->get('OriginPrice')}} đ</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
	                        @endfor
						</div>
						<div class="bestseller-active owl-carousel">
	                        @for ($i = count($allBookOfBestSeller) -1 ; $i >= 0; $i--)
								<div class="bestseller-total">
									<div class="single-bestseller mb-25">
	                                @for ($j = 0; $j < 1; $j++)
										<div class="bestseller-img" data-thumb="{{$allBookOfBestSeller[$i]->get("images")[$j]}}">
											<a href="detail/{{$allBookOfBestSeller[$i]->getObjectId()}}"><img src="{{$allBookOfBestSeller[$i]->get("images")[$j]}}" alt="woman"/></a>
										</div>
	                                @endfor
										<div class="bestseller-text text-center">
											<h3> <a href="detail/{{$allBookOfBestSeller[$i]->getObjectId()}}">{{$allBookOfBestSeller[$i]->get('title')}}</a></h3>
											<div class="price">
												<ul>
													<li><span class="new-price">{{$allBookOfBestSeller[$i]->get('promotionPrice')}} đ</span></li>
													<li><span class="old-price">{{$allBookOfBestSeller[$i]->get('OriginPrice')}} đ</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
	                        @endfor
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- bestseller-area-end -->
		<!-- new-book-area-start -->
		<div class="new-book-area pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title bt text-center pt-100 mb-30 section-title-res">
							<h2>{{__('brand')}}</h2>
						</div>
					</div>
				</div>
				<div class="tab-active owl-carousel">
	                @for ($i = 0; $i < count($showAllBook); $i++)
	                    <div class="tab-total">
	                        <!-- single-product-start -->
	                        <div class="product-wrapper mb-40">
		                        @for ($j = 0; $j < 1; $j++)
		                            <div class="product-img" data-thumb="{{$showAllBook[$i]->get("images")[$j]}}">
		                                <a href="detail/{{$showAllBook[$i]->getObjectId()}}">
		                                    <img src="{{$showAllBook[$i]->get("images")[$j]}}" alt="woman" class="primary" />
		                                </a>
		                            </div>
		                        @endfor
	                            <div class="product-details text-center">
	                                <h4><a href="detail/{{$showAllBook[$i]->getObjectId()}}">{{$showAllBook[$i]->get('title')}}</a></h4>
	                                <div class="product-price">
	                                    <ul>
	                                        <li>{{$showAllBook[$i]->get('promotionPrice')}} đ</li>
	                                        <li class="old-price">{{$showAllBook[$i]->get('OriginPrice')}} đ</li>
	                                    </ul>
	                                </div>
	                            </div>
	                            <div class="product-link">
	                                <div class="product-button">
	                                    <a href="cart" title="Add to cart"><i class="fa fa-shopping-cart"></i>{{__('addToCart')}}</a>
	                                </div>
	                                <div class="add-to-link">
	                                    <ul>
	                                        <li><a href="detail/{{$showAllBook[$i]->getObjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                        <!-- single-product-end -->
	                        
	                    </div>
	                @endfor
                </div>
                <div class="tab-active owl-carousel">
	                 @for ($i = count($showAllBook) -1 ; $i >=0; $i--)
	                    <div class="tab-total">
	                        <!-- single-product-start -->
	                        <div class="product-wrapper mb-40">
		                        @for ($j = 0; $j < 1; $j++)
		                            <div class="product-img" data-thumb="{{$showAllBook[$i]->get("images")[$j]}}">
		                                <a href="detail/{{$showAllBook[$i]->getObjectId()}}">
		                                    <img src="{{$showAllBook[$i]->get("images")[$j]}}" alt="woman" class="primary" />
		                                </a>
		                            </div>
		                        @endfor
	                            <div class="product-details text-center">
	                                <h4><a href="detail/{{$showAllBook[$i]->getObjectId()}}">{{$showAllBook[$i]->get('title')}}</a></h4>
	                                <div class="product-price">
	                                    <ul>
	                                        <li>{{$showAllBook[$i]->get('promotionPrice')}} đ</li>
	                                        <li class="old-price">{{$showAllBook[$i]->get('OriginPrice')}} đ</li>
	                                    </ul>
	                                </div>
	                            </div>
	                            <div class="product-link">
	                                <div class="product-button">
	                                    <a href="cart" title="Add to cart"><i class="fa fa-shopping-cart"></i>{{__('addToCart')}}</a>
	                                </div>
	                                <div class="add-to-link">
	                                    <ul>
	                                        <li><a href="detail/{{$showAllBook[$i]->getObjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                        <!-- single-product-end -->
	                        
	                    </div>
	                @endfor
                </div>
			</div>
		</div>
		<!-- new-book-area-start -->
        <!-- testimonial-area-start -->
		<div class="testimonial-area ptb-100 bg">
			<div class="container">
				<div class="row">
					<div class="testimonial-active owl-carousel">
                    @for ($i = 0; $i < count($showContact); $i++)
						<div class="col-lg-12">
							<div class="single-testimonial text-center">
								<div class="testimonial-img">
									<a href="#"><i class="fa fa-quote-right"></i></a>
                                </div>
								<div class="testimonial-text">
									<p>{{$showContact[$i]->get('message')}}</p>
									<a href="#">{{$showContact[$i]->get('fullName')}}</a>
                                </div>
							</div>
                        </div>
                        @endfor
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial-area-end -->

		<!-- most-product-area-start -->
        <div class="most-product-area pt-90 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 xs-mb">
                        <div class="section-title-2 mb-30">
                            <h3>{{__('comic')}}</h3>
                        </div>
                        <div class="product-active-2 owl-carousel">
                            <div class="product-total-2">
                                @for ($i = 0; $i < count($showComicBook); $i++)
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="/detail/{{$showComicBook[$i][0]}}"><img src="{{$showComicBook[$i][4]}}" alt="book"/></a>
                                    </div>
                                    <div class="most-product-content">
                                        <h4><a href="/detail/{{$showComicBook[$i][0]}}">{{$showComicBook[$i][1]}}</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>{{$showComicBook[$i][2]}} đ</li>
                                                <li class="old-price">{{$showComicBook[$i][3]}}</li>
                                           </ul>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 xs-mb">
                        <div class="section-title-2 mb-30">
                            <h3>{{__('textBook')}}</h3>
                        </div>
                        <div class="product-active-2 owl-carousel">
                            <div class="product-total-2">
                            @for ($i = 0; $i < count($showTextBook); $i++)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="/detail/{{$showTextBook[$i][0]}}"><img src="{{$showTextBook[$i][4]}}" alt="book"/></a>
                                </div>
                                <div class="most-product-content">
                                    <h4><a href="/detail/{{$showTextBook[$i][0]}}">{{$showTextBook[$i][1]}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>{{$showTextBook[$i][2]}} đ</li>
                                            <li class="old-price">{{$showTextBook[$i][3]}}</li>
                                       </ul>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 xs-mb">
                        <div class="section-title-2 mb-30">
                            <h3>{{__('magazine')}}</h3>
                        </div>
                        <div class="product-active-2 owl-carousel">
                            <div class="product-total-2">
                            @for ($i = 0; $i < count($showMagazineBook); $i++)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="/detail/{{$showMagazineBook[$i][0]}}"><img src="{{$showMagazineBook[$i][4]}}" alt="book"/></a>
                                </div>
                                <div class="most-product-content">
                                    <h4><a href="/detail/{{$showMagazineBook[$i][0]}}">{{$showMagazineBook[$i][1]}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>{{$showMagazineBook[$i][2]}} đ</li>
                                            <li class="old-price">{{$showMagazineBook[$i][3]}}</li>
                                       </ul>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- most-product-area-end -->

		<!-- recent-post-area-start -->
		<div class="recent-post-area pt-95 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title text-center mb-30 section-title-res">
							<h2>{{__('topbestseller')}}</h2>
						</div>
					</div>
					<div class="post-active owl-carousel text-center">
                        @for($i= 0; $i < count($listBestSellerName); $i++)
                        @if($i = 0 )
                         <div class="col-lg-12">
							<div class="single-post">
								<div class="post-img">
									<a href="#"><img src="img/post/1.jpg" alt="post" /></a>
								</div>
								<div class="post-content">
									<h3><a href="#">{{$listBestSellerName[0]}}</a></h3>
								</div>
							</div>
						</div>
                        @endif
                        @if($i = 1 )
                         <div class="col-lg-12">
							<div class="single-post">
								<div class="post-img">
									<a href="#"><img src="img/post/2.jpg" alt="post" /></a>
								</div>
								<div class="post-content">
									<h3><a href="#">{{$listBestSellerName[1]}}</a></h3>
								</div>
							</div>
						</div>
                        @endif
                        @if($i = 2 )
                         <div class="col-lg-12">
							<div class="single-post">
								<div class="post-img">
									<a href="#"><img src="img/post/3.jpg" alt="post" /></a>
								</div>
								<div class="post-content">
									<h3><a href="#">{{$listBestSellerName[2]}}</a></h3>
								</div>
							</div>
						</div>
                        @endif
                        @if($i = 3 )
                         <div class="col-lg-12">
							<div class="single-post">
								<div class="post-img">
									<a href="#"><img src="img/post/4.jpg" alt="post" /></a>
								</div>
								<div class="post-content">
									<h3><a href="#">{{$listBestSellerName[3]}}</a></h3>
								</div>
							</div>
						</div>
                        @endif

                        @endfor
					</div>
				</div>
			</div>
		</div>
		<!-- recent-post-area-end -->
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

		<!-- social-group-area-start -->
		<!-- social-group-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		<!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="modal-tab">
                                    <div class="product-details-large tab-content">
                                        <div class="tab-pane active" id="image-1">
                                            <img src="img/product/quickview-l4.jpg" alt="" />
                                        </div>
                                        <div class="tab-pane" id="image-2">
                                            <img src="img/product/quickview-l2.jpg" alt="" />
                                        </div>
                                        <div class="tab-pane" id="image-3">
                                            <img src="img/product/quickview-l3.jpg" alt="" />
                                        </div>
                                        <div class="tab-pane" id="image-4">
                                            <img src="img/product/quickview-l5.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="product-details-small quickview-active owl-carousel">
                                        <a class="active" href="#image-1"><img src="img/product/quickview-s4.jpg" alt="" /></a>
                                        <a href="#image-2"><img src="img/product/quickview-s2.jpg" alt="" /></a>
                                        <a href="#image-3"><img src="img/product/quickview-s3.jpg" alt="" /></a>
                                        <a href="#image-4"><img src="img/product/quickview-s5.jpg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="modal-pro-content">
                                    <h3>Chaz Kangeroo Hoodie3</h3>
                                    <div class="price">
                                        <span>$70.00</span>
                                    </div>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Size*</label>
                                            <select class="select">
                                                <option value="">S</option>
                                                <option value="">M</option>
                                                <option value="">L</option>
                                            </select>
                                        </div>
                                        <div class="quickview-color-wrap">
                                            <label>Color*</label>
                                            <div class="quickview-color">
                                                <ul>
                                                    <li class="blue">b</li>
                                                    <li class="red">r</li>
                                                    <li class="pink">p</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="#">
                                        <input type="number" value="1" />
                                        <button>Add to cart</button>
                                    </form>
                                    <span><i class="fa fa-check"></i> In stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- Modal end -->

        <!-- Get CSS file -->
		@include('components.getjs')
		<script>
		$(document).ready(function(){
			var c_ = $('input[name="c_"]').val();
			if(c_ != "null"){
				$('#login-modal').modal('show');
			}
		});
		</script>
    </body>
</html>

