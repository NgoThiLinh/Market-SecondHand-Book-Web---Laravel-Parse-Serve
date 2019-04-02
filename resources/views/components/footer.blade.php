<!-- footer-top-start -->
<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-top-menu bb-2">
								<nav>
									<ul>
										<li><a href="/">{{__('home')}}</a></li>
										<li><a href="/book">{{__('category')}}</a></li>
										<li><a href="/about">{{__('aboutus')}}</a></li>
										<li><a href="/contact">{{__('contact')}}</a></li>
                                        <li><a href="/policy">{{__('policy')}}</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-top-start -->
			<!-- footer-mid-start -->
			<div class="footer-mid ptb-50">
				<div class="container">
					<div class="row">
				        <div class="col-lg-8 col-md-8 col-sm-12">
				            <div class="row">
				                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-footer br-2 xs-mb">
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="footer-mid-menu">
                                            <ul>
                                                <li>
                                                    <a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
												        {{__($categories[$i]->get('categoryName'))}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endfor
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-footer br-2 xs-mb">
                                    @for ($i = 4; $i < 8; $i++)
                                        <div class="footer-mid-menu">
                                            <ul>
                                                <li>
                                                    <a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
												        {{__($categories[$i]->get('categoryName'))}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endfor
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-footer br-2 xs-mb">
                                    @for ($i = 8; $i < 12; $i++)
                                        <div class="footer-mid-menu">
                                            <ul>
                                                <li>
                                                    <a key= "{{$categories[$i]->getObjectId()}}" href="{{ url('/category') }}/{{$categories[$i]->getObjectId()}}">
												        {{__($categories[$i]->get('categoryName'))}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endfor
                                    </div>
                                </div>
				            </div>
				        </div>
				        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="single-footer mrg-sm">
                                <div class="footer-title mb-20">
                                    <h3>{{__('contact')}}</h3>
                                </div>
                                <div class="footer-contact">
                                    <p><span>Điện thoại:</span> (+1)866-540-3229</p>
                                    <p><span>Email:</span>  chosach@gmail.com</p>
                                    <div class="link-follow">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="hidden-sm"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                </div>
                            </div>
				        </div>
					</div>
				</div>
			</div>
			<!-- footer-mid-end -->
			<!-- footer-bottom-start -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row bt-2">
						<div class="copy-right-area">
							<p>Copyright ©<a href="/">Brighten Team</a>. All Right Reserved.</p>
						</div>						
					</div>
				</div>
			</div>
			<!-- footer-bottom-end -->