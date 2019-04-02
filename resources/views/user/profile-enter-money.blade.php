
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
    <body onload="starting()" class="checkout">
        <header>
        	@include('components.header')
		</header>
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="/">{{__('home')}}</a></li>
								<li><a href="/profile/userInfor" class="active">{{__('profile')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="entry-header-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="entry-header-title">
							<h2>{{__('yourInformation')}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="checkout-area mb-70">
			<div class="container">
				<div class="row">
                    <form action="#">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="profile-card col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a target="_blank" href="#">
                                        <img src="https://png.pngtree.com/svg/20161229/_username_login_1172579.png" class="hoverZoomLink">
                                    </a>

                                    <h4 class="profile-name">{{$currentUserInfor->yourName}}</h4>
                                    <ul class="nav profile-option">
                                        <li>
                                            <a href="/profile/userInfor" class="profile-muli-option " id= "profileinformation-button">
                                                <i class=""></i>
                                                {{__('accountInformation')}}
                                            </a>
                                        </li>
                                        @for ($i = 0 ; $i< count($paymentInfor);$i++ )
                                        @if($paymentInfor[$i]->get("freeTrial") == 0 && $paymentInfor[$i]->get("sellerActive") == 0)
                                        <li>
                                            <a href="/profile/entermoney" class="profile-muli-option ">
                                                <i class=""></i>
                                                {{__('uploadBook')}}
                                            </a>
                                        </li>
                                        @elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 1)
                                        <li>
                                            <a href="/upload" class="profile-muli-option ">
                                                <i class=""></i>
                                                {{__('uploadBook')}}
                                            </a>
                                        </li>
                                        @elseif($paymentInfor[$i]->get("freeTrial") == 1 && $paymentInfor[$i]->get("sellerActive") == 0)
                                        <li>
                                            <a href="/profile/entermoney" class="profile-muli-option ">
                                                <i class=""></i>
                                                {{__('uploadBook')}}
                                            </a>
                                        </li>
                                        @endif
                                        @endfor
                                        <li>
                                            <a href="/profile/historysell" class="profile-muli-option ">
                                                <i class=""></i>
                                                {{__('historyForSell')}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/profile/historybuy" class="profile-muli-option">
                                                <i class=""></i>
                                                {{__('historyForBuy')}}
                                            </a>
                                        </li>
                                        <li id = "moneyaccount">
                                            <a href="/profile/entermoney" class="profile-muli-option active">
                                                <i class=""></i>
                                                {{__('Tài khoản')}}
                                            </a>
                                        </li>
                                        @for ($i = 0 ; $i< count($paymentInfor);$i++ )
                                        @if($paymentInfor[$i]->get("sellerActive") == 1 )
                                        <li id = "moneyaccount">
                                            <a href="/profile/stopactive" class="profile-muli-option">
                                                <i class=""></i>
                                                {{__('stopActive')}}
                                            </a>
                                        </li>
                                        @elseif($paymentInfor[$i]->get("sellerActive") == 0 )
                                        <li id = "moneyaccountActiveAgain">
                                            <a id="activeAccount" class="profile-muli-option ">
                                                <i class=""></i>
                                                {{__('activeAccount')}}
                                            </a>
                                        </li>
                                        @endif
                                        @endfor
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 profileBordermain" id = "moneyaccountform">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('yourName')}}</label>										
                                        <input readonly type="text" value="{{$currentUserInfor->yourName}}" placeholder="{{__('yourName')}}">
                                    </div>
                                </div>
                                @for ($i = 0 ; $i< count($paymentInfor);$i++ )
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('moneyInAccount')}}</label>
                                        <input readonly type="number" id="userMoney" value = "{{$paymentInfor[$i]->get("moneyAccount")}}">Đơn vị : VND</input>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="checkout-form-list">
                                        <label>{{__('wayToEnterMoney')}}</label>
                                        <select class="form-control">
                                          <option>&#xf0d6 {{__('cardphone')}}</option>
                                          <option>&#xf19c {{__('bankAccnount')}}</option>
                                          <option>&#xf1f1 Master Card</option>
                                          <option>&#xf1f4 PayPal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('enterMoney')}}<span class="required">*</span></label>
                                        <input type="number" id="moneyenter" type="text" placeholder="Ví dụ: 60.000 VND"></input>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">	
                                        <label>{{__('noteEnterMoney')}}</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <input type="button" id="btnEnterMoney" name = "btnmoney" class="enterMoney mainBackgroundColorGreen" value="{{__('enterMoney')}}">
                                {{ csrf_field() }}
                                </div>
                                @endfor

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
