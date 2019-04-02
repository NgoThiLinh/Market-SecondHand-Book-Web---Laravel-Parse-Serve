<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Koparion – Book Shop HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body onload="starting()" class="about">
        <header>
            @include('components.header')
		</header>
		<!-- about-main-area-start -->
        <div class="breadcrumbs-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-menu">
                            <ul>
                                <li><a href="/">{{__('home')}}</a></li>
                                <li><a href="/about" class="active">{{__('Giới thiệu về chúng tôi')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="about-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
						<div class="about-img">
							<a href="#"><img src="img/logo/sach.jpg" alt="man" /></a>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<div class="about-content">
							<h4>CHÚNG TÔI LÀ AI?</h4>
							<p>Nếu bạn đang tìm kiếm một trang web để mua bán và trao đổi sách cũ thì Chợ Sách là một sự lựa chọn hiệu quả dành cho bạn. Chợ Sách của chúng tôi là nơi để các bạn có nhu cầu đọc và mua sách hoặc trao đổi sách mình đã đọc mà mình cảm thấy hay và ý nghĩa muốn chia sẽ cho các bạn đọc khác có thể đọc được và nếu các bán cảm thấy tủ sách của mình đã kín bạn có thể bán những cuốn sách đó hoặc là mua những sách mới khác. Vô cùng nhiều thể loại Chợ sách có thể đáp ứng được cho các bạn đọc.</p>
							<div class="check-text">
							<ul>
								<li><a href="#"><i class="fa fa-check"></i>Hàng bảo đảm chất lượng</a></li>
								<li><a href="#"><i class="fa fa-check"></i>Dễ dàng trao đổi giữa người bán và mua</a></li>
								<li><a href="#"><i class="fa fa-check"></i>Đóng gói hàng cẩn thận, đảo bảo</a></li>
								<li><a href="#"><i class="fa fa-check"></i>Thông tin khách hàng được bảo mật</a></li>
								<li><a href="#"><i class="fa fa-check"></i>Giao dịch dễ dàng tại Chợ Sách</a></li>
							</ul>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- about-main-area-end -->
		<!-- our-mission-area-start -->
		<div class="our-mission-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="single-misson">
							<center><a href=""><img src="img/logo/service.png" alt="man" width="40%" height="40%" /></a>
								<div class="text-about">
									<h4 class="text-about">Dịch vụ của chúng tôi</h4></center>
								</div>
									<p>Đến với Chợ Sách ngay hôm nay để mua hàng online giá rẻ và trải nghiệm dịch vụ chăm sóc khách hàng tuyệt vời tại đây.</p>					
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="single-misson">
							<center><a href=""><img src="img/logo/logo1.png" alt="man" width="40%" height="40%" /></a>
								<div class="text-about">
									<h4 class="text-about">Nhiệm vụ của chúng tôi</h4></center>
								</div>
								<p>Các hoạt động giao dịch thanh toán tại Chợ Sách luôn được đảm bảo diễn ra nhanh chóng, an toàn. đặc biệt là Chợ Sách đều là những sản phẩm chính hãng, đầy đủ tem nhãn, bảo hành từ nhà bán hàng.</p>
						
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="single-misson">
							<center><a href=""><img src="img/logo/giaodich.png" alt="man" width="40%" height="40%"/></a>
								<div class="text-about">
									<h4 class="text-about">Sứ mệnh của chúng tôi</span></h4></center>
								</div>
								<p> Là một kênh bán hàng uy tín, Chợ Sách luôn cam kết mang lại cho khách hàng những trải nghiệm mua sắm online giá rẻ, an toàn và tin cậy. Mọi thông tin về người bán và người mua đều được bảo mật tuyệt đối.</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- our-mission-area-end -->
		<!-- counter-area-start -->
		<div class="counter-area ptb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-counter text-center" >
							<center>
								<div class="circle">
									<h2 class="counter">99</h2>
								</div>
							</center>						
							<div class="sub-text">
								<span>Số lần giao dịch</span>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-counter text-center">
							<center>
								<div class="circle">
									<h2 class="counter">333</h2>
								</div>
							</center>
							<div class="sub-text">
								<span>Người sử dụng</span>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-counter text-center">
							<center>
								<div class="circle">
									<h2 class="counter">500</h2>
								</div>
							</center>
							<div class="sub-text">
								<span>Số lượng sách bán</span>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-counter text-center">
							<center>
								<div class="circle">
									<h2 class="counter">734</h2>
								</div>
							</center>
							<div class="sub-text">
								<span>Số lần truy cập</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- counter-area-end -->
		<!-- team-area-start -->
		<div class="slider-area">
			<div class="team-title text-center mb-50">
				<h2>Bộ sưu tập</h2>
			</div>
			<div style="    margin-bottom: 20px;" class="tab-content">
					<div class="tab-pane active" id="Audiobooks">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            <div class="image-tab">                                	                  
                                <img src="img/product/1 - Copy.jpg" alt="book" class="primary"/>                     	
                            </div>
                            <!-- single-product-end -->
                            <!-- single-product-start -->
                            <div class="image-tab">                                  
                                <img src="img/product/2 - Copy.jpg" alt="book" class="primary" />	
                            </div>
                            <!-- single-product-end -->
                            <!-- single-product-start -->
                            <div class="image-tab">  
                                <img src="img/product/3 - Copy.jpg" alt="book" class="primary" />
                            </div>
                            <!-- single-product-end -->
                            <!-- single-product-start -->
                            <div class="image-tab">
                                <img src="img/product/5 - Copy.jpg" alt="book" class="primary" />
                            </div>
                            <!-- single-product-end -->
                            <!-- single-product-start -->
                            <div class="image-tab">
                                <img src="img/product/6 - Copy.jpg" alt="book" class="primary" />                                
                            </div>
                            <!-- single-product-end -->
                            <!-- single-product-start -->
							<div class="image-tab">
                                <img src="img/product/7 - Copy.jpg" alt="book" class="primary" /> 
                            </div>
                            <!-- single-product-end -->
                        </div>
					</div>
					
				</div>
		</div>
		
		<!-- skill-area-start -->
		
		
		<!-- skill-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		
		
		<!-- Get CSS file -->
        @include('components.getjs')
    </body>
</html>
