<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{__('loading')}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="notification" content="" title="" noticontent="" icon=""/>
        
		<!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body onload="starting();" class="product-details">
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
								<li><a href="{{$showdetail->getObjectId()}}" class="active">{{__('detailProduct')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- product-main-area-start -->
		<div class="product-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<!-- product-main-area-start -->
						<div class="product-main-area">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
									<div class="flexslider">
										<ul class="slides">
											@for ($i = 0; $i < count($showdetail->get('images')); $i++)
											<li data-thumb="{{$showdetail->get("images")[$i]}}">
											  <img src="{{$showdetail->get("images")[$i]}}" alt="woman" />
											</li>
											@endfor
										</ul>
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
									<div class="product-info-main">
										<div class="page-title">
											<h1>{{$showdetail->get('title')}}</h1>
										</div>
										<div class="product-info-stock-sku">
                                            <span>{{__('seller')}} : </span>
                                            <div class="product-attribute">
                                            @for ($i = 0; $i < count($users); $i++)
                                                <span class="author-link"><a>{{$users[$i]->get("yourName")}}</a></span>
                                            @endfor
                                            </div>
										</div>
										<div class="product-reviews-summary">
											<div class="reviews-actions">
												<a>{{__('cate')}}</a>
                                                @for ($i = 0; $i < count($cates); $i++)
												<a href="#" class="view">{{$cates[$i]->get("categoryName")}}</a>
                                                @endfor
											</div>
										</div>
										<div class="product-info-price">
											<div class="price-final">
												<span>{{$showdetail->get('promotionPrice')}} đ</span>
												<span class="old-price">{{$showdetail->get('OriginPrice')}} đ</span>
											</div>
										</div>
										<div class="product-add-form">
											<form action="#">
												<div class="quality-button">
													<input class="qty" type="number" min = 1 
                                                    max="{{$showdetail->get('quanlity')}}" 
                                                    value="{{$showdetail->get('quanlity')}}" 
                                                    onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"
                                                    onkeyup="if(this.value > {{$showdetail->get('quanlity')}}) this.value = {{$showdetail->get('quanlity')}};">
												</div>
												<a href="#">{{__('addToCart')}}</a>
											</form>
                                        </div>
									</div>
								</div>
							</div>	
						</div>
						<!-- product-main-area-end -->
						<!-- product-info-area-start -->
						<div class="product-info-area mt-80">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#Details" data-toggle="tab">{{__('description')}}</a></li>
								<li><a href="#Reviews" data-toggle="tab">{{__('aboutAuthor')}}</a></li>
							</ul>
							<div class="tab-content">
                                <div class="tab-pane active" id="Details">
                                    <div class="valu">
                                        <p>{{$showdetail->get('description')}}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Reviews">
                                    <div class="valu valu-2">
                                        <ul>
                                            <li>
                                                <div class="review-add">
                                                    <h3>{{__('basicInform')}}</h3>
                                                </div>
                                                <div class="review-left">
                                                    <div class="review-rating">
                                                        <span>{{__('name')}}</span>
                                                    </div></br>
                                                    <div class="review-rating">
                                                        <span>{{__('numberOfBookSold')}}</span>
                                                    </div>
                                                    <div class="review-rating">
                                                        <span>{{__('numberOfFeedback')}}</span>
                                                    </div>
                                                </div>
                                                <div class="review-right">
                                                    @for ($i = 0; $i < count($users); $i++)
                                                    <div class="review-content">
                                                        <span>{{$users[$i]->get("username")}}</span>
                                                    </div><br>
                                                    @endfor
                                                    <div class="review-content">
                                                        <span>{{$countbookOrdered}}</span>
                                                    </div><br>
                                                    <div class="review-content">
                                                        <span>{{$countReview}}</span><br>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <div class="review-add">
                                                    <h3>{{__('hotFeedback')}}</h3>
                                                </div>
                                                @for ($i = 0; $i < count($reviewAndRating); $i++)
                                                <div class="wrap-review">
                                                <div class="review-left">
                                                    <div class="review-rating hot">
                                                        <span>{{__('numberOfStar')}}</span><br>
                                                        @if($reviewAndRating[$i]->get("numberOfStar") == 1)
															<span class="fa fa-star"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
														@elseif($reviewAndRating[$i]->get("numberOfStar") == 2)
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
														@elseif($reviewAndRating[$i]->get("numberOfStar") == 3)
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star-o"></span>
															<span class="fa fa-star-o"></span>
														@elseif($reviewAndRating[$i]->get("numberOfStar") == 4)
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star-o"></span>
														@else($reviewAndRating[$i]->get("numberOfStar") == 5)
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
														@endif
                                                    </div>
                                                </div>
                                                <div class="review-right">
                                                    <div class="review-content-hot">
                                                        <span>{{$reviewAndRating[$i]->get("title")}}</span><br>
                                                        <span class="date-review">{{__('feedbackOn')}} <strong> {{$reviewAndRating[$i]->getCreatedAt()->format('d-m-Y')}}</strong>
                                            			</span><br>
                                                    </div><br>
                                                </div>
                                                </div>
                                                @endfor
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <div class="review-left">
                                                    <div class="review-rating">
                                                    <h3>{{__('feedbackSeller')}}</h3>
                                                    </div></br>
                                                </div>
                                                <div class="review-right">
                                                    <div class="review-content">
                                                        <button class="btnfeedb" type="button" data-toggle="modal" data-target="#model-feedback" >{{__('feedback')}}</button>
                                                    </div><br>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>	
						</div>
						<!-- product-info-area-end -->
						<!-- new-book-area-start -->
						<div class="new-book-area mt-60">
							<div class="section-title text-center mb-30">
								<h3>{{__('theSameAuthorBook')}}</h3>
							</div>
							<div class="tab-active-2 owl-carousel">
								<!-- single-product-start -->
                                @for ($i = 0; $i < count($bookSeller); $i++)
	                                @if ($bookSeller[$i]->getObjectId()!= $showdetail->getObjectId())
									<div class="product-wrapper detail-wrap">
										<div class="product-img">
											@for ($j = 0; $j < 1; $j++)
											<a href="#">
												<img src="{{$bookSeller[$i]->get("images")[$j]}}" alt="book" class="primary" />
											</a>
											@endfor
										</div>
										<div class="product-details text-center">
											<h4><a href="{{$bookSeller[$i]->getobjectId()}}">{{$bookSeller[$i]->get("title")}}</a></h4>
											<div class="product-price">
												<ul>
													<li>{{$bookSeller[$i]->get("promotionPrice")}} đ</li>
													<li class="old-price">{{$bookSeller[$i]->get("OriginPrice")}} đ</li>
												</ul>
											</div>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
	                                            <ul>
	                                                <li><a href="{{$bookSeller[$i]->getobjectId()}}" title="Details"><i class="fa fa-external-link"></i></a></li>
	                                            </ul>
	                                        </div>
										</div>	
									</div>
									@endif
                                @endfor
                                
								<!-- single-product-end -->	
							</div>
						</div>
						<!-- new-book-area-start -->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">
							<div class="left-title-2 mb-30">
								<h2>{{__('relateBook')}}</h2>
							</div>
							<div class="random-area mb-30">
								<div class="product-active-2 owl-carousel">
									<div class="product-total-2">
                                    @for ($i = 0; $i < count($bookCate); $i++)
	                                	@if ($bookCate[$i]->getObjectId()!= $showdetail->getObjectId())
										<div class="single-most-product bd mb-18">
											<div class="most-product-img">
												@for ($j = 0; $j < 1; $j++)
												<a href="#">
													<img src="{{$bookCate[$i]->get("images")[$j]}}" alt="book" class="primary" />
												</a>
												@endfor
											</div>
											<div class="most-product-content">
												<h4><a href="{{$bookCate[$i]->getobjectId()}}">{{$bookCate[$i]->get("title")}}</a></h4>
												<div class="product-price">
													<ul>
														<li>{{$bookCate[$i]->get("promotionPrice")}} đ</li>
                                                        <li class="old-price">{{$bookCate[$i]->get("OriginPrice")}} đ</li>
													</ul>
												</div>
											</div>
										</div>
										@endif
                                    @endfor
									</div>
								</div>
							</div>
							<div class="banner-area mb-30">
								<div class="banner-img-2">
									<a href="/book"><img src="../img/banner/33.jpg" alt="banner" /></a>
								</div>
							</div>
							<div class="left-title-2 mb-30">
								<h2>{{__('otherBook')}}</h2>
                                    <div class="random-area mb-30">
                                        <div class="product-active-2 owl-carousel">
                                            @for ($i = 0; $i < count($bookDifCate); $i++)
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                @for ($j = 0; $j < 1; $j++)
												<a href="#">
													<img src="{{$bookDifCate[$i]->get("images")[$j]}}" alt="book" class="primary" />
												</a>
												@endfor
                                            </div>
                                            <div class="most-product-content">
                                                
                                                <h4><a href="{{$bookDifCate[$i]->getobjectId()}}">{{$bookDifCate[$i]->get("title")}}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>{{$bookDifCate[$i]->get("promotionPrice")}} đ</li>
                                                        <li class="old-price">{{$bookDifCate[$i]->get("OriginPrice")}} đ</li>
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
			</div>
		</div>
		<!-- Modal area -->
		<div class="modal fade" id="model-feedback" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="closeFunction()" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Biểu mẩu đánh giá</h4>
                </div>
                <div class="modal-body">
                    <p>Cảm ơn bạn đã sử dụng sản phẩm của <a href="/">Chợ sách</a></p>
                    <p>Mọi thắc mắc hãy <a href="/contact">Tương tác</a> với chúng tôi</p>
                    <!-- for buyer -->
                    <form action=""; enctype='multipart/form-data' method="POST">
                    <p>Đánh giá người bán</p>

                    <div class="star-rating"><s><s><s><s><s></s></s></s></s></s></div>
                    <input id="show-result" name="showresult" class="show-result" style="display: none" ></input>
                    <div style="display: none" name="showresult" class="show-result">No stars selected yet.</div>
					<?php
                                $data = getCurrentUser();
                                $idUserGive = $data[1];
                    ?>
                    <button style="display: none" id="idUserGiveFeedBack" value="{{$idUserGive}}"></button>
                    @for ($i = 0; $i < count($users); $i++)
                    <button style="display: none" id="idUserBeFeedBack" value="{{$users[$i]->getObjectId()}}"></button>
                    @endfor
                    <p>Nhận xét người bán</p>
                    <textarea type="text" id="review" name="review" class="form-control"></textarea>
                    <button type="button" id="btnSendFeedback" class="btn btn-default btnrating" >Gửi đánh giá</button>
                    <form>
                        {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" onclick="closeFunction()" data-dismiss="modal">Đóng</button>
                  <a class="continue-experience" href="/">Tiếp tục trải nghiệm</a>
                </div>
              </div>
            </div>
        </div>
		<!-- product-main-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		<!-- Get CSS file -->
        @include('components.getjs')
    </body>
</html>
