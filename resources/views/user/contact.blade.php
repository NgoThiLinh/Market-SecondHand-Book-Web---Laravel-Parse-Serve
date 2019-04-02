
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact us</title>
        <meta id="description" content="">
        <meta id="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="notification" content="" title="" noticontent="" icon=""/>
        <!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body class="product-details">
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
                                <li><a href="/contact" class="active">{{__('contact')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- googleMap-area-start -->
		<div class="map-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="googleMap"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- googleMap-end -->
		<!-- contact-area-start -->
		<div class="contact-area mb-70";>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="contact-info">
							<h4>{{__('contactinfor')}}</h4>
							<ul>
								<div class="icon-contact">
								<li>									
									<i class="fa fa-map-marker" style="font-size:25px; color:#f07c29" ></i>
									<span>{{'address'}}</span>
									101B Lê Hữu Trác, Sơn Trà, Đà Nẵng 							
								</li>
								<li>
									<i class="fa fa-mobile" style="font-size:25px; color:#f07c29" ></i>
									<span>{{'phone'}}</span>
									(+1)866-540-3229 
								</li>
								<li>
									<i class="fa fa-envelope" style="font-size:16px; color:#f07c29" ></i>
									<span>Email</span>
									<a href="#">chosach@gmail.com</a>
								</li>
							</div>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="contact-form">
							<h4>{{__('contactform')}}</h4>
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input id="name" type="text" placeholder="Họ Và Tên" style="background-color: white">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input id="email" type="email" placeholder="Email" style="background-color: white">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form-3">
                                            <input id="subject" type="text" placeholder="Tiêu đề" style="background-color: white">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                         <div class="single-form-3">
                                            <textarea id="message" placeholder="Nội dung" style="background-color: white"></textarea>
                                            <div class="sub-button">
                                             <center><button class="btncontact" id="btncontact"  type="button">{{__('submit')}}</button></center>
                                        	</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- contact-area-end -->
		<!-- footer-area-start -->
		<footer>
            @include('components.footer')
		</footer>
		<!-- footer-area-end -->
		
		
	    <!-- Get CSS file -->
        @include('components.getjs')
        <!-- ajax-mail js -->
        <script src="js/ajax-mail.js"></script>
		<!-- googleapis -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
		<script>
			/* Google Map js */
			function initialize() {
			  var mapOptions = {
				zoom: 15,
				scrollwheel: false,
				center: new google.maps.LatLng(16.0682589,108.2155171)
			  };

			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);

			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				animation:google.maps.Animation.BOUNCE,
				icon: 'img/map.png',
				map: map
			  });

			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
    </body>
</html>


