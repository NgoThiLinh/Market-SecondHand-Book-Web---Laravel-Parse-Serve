
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
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="profile-card col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a target="_blank" href="#">
                                        <img src="https://png.pngtree.com/svg/20161229/_username_login_1172579.png" class="hoverZoomLink">
                                    </a>

                                    <h4 class="profile-name">{{$currentUserInfor->yourName}}</h4>
                                    <ul class="nav profile-option">
                                        <li>
                                            <a href="/profile/userInfor" class="profile-muli-option active " id= "profileinformation-button">
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
                                            <a href="/profile/entermoney" class="profile-muli-option">
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
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 profileBordermain"  id = "profileinformation">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('yourName')}} <span class="required">*</span></label>
                                        <input id="nameEdit" type="text" value="{{$currentUserInfor->yourName}}" placeholder="{{__('yourName')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('address')}} <span class="required">*</span></label>
                                        <input id="addressEdit" type="text" value="{{$currentUserInfor->address}}" placeholder="{{__('streetAddress')}}">
                                    </div>
                                </div>
                                @for ($i = 0 ; $i< count($paymentInfor);$i++ )

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div style="margin-left: -15px" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>{{__('score')}} <span class="required">*</span></label> 
                                            <input type="number" id="moneyCurrent" style="display: none" value="{{$paymentInfor[$i]->moneyAccount}}">
                                            <input type="number" readonly id="scoreExchange" type="email" value="{{$paymentInfor[$i]->score}}" ">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6">
                                        <p style="float: left;margin-top: 30px;">Điểm sẽ được quy đổi thành tiền. <br>
                                        VD: 10.000 Điểm = 10.000 VND </p>
                                    </div>
                                     <div class="col-lg-3 col-md-3col-sm-3 col-xs-6">

                                    <input type="button" id="btnExchangeScore" style="margin-top: 30px;float: right;" class="changeInfor mainBackgroundColorGreen exchange" value="{{__('exchangeScore')}}">
                                    {{ csrf_field() }}
                                </div>
                                    </div>
                                </div>
                                
                                @endfor
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('emailAddress')}} <span class="required">*</span></label>                                       
                                        <input id="emailAddressEddit" type="email" value="{{$currentUserInfor->emailAddress}}" placeholder="{{__('emailAddressEdit')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>{{__('phone')}}  <span class="required">*</span></label>                                     
                                        <input id="phoneNumberEdit" type="number" value="{{$currentUserInfor->phoneNumber}}" placeholder="{{__('phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                   <input type="button" id="btnChangeInfor" class="changeInfor mainBackgroundColorGreen" value="{{__('changeInformation')}}">
                                    </input>
                                </div>
                                <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="checkout-form-list create-acc"> 
                                        <label class="forget">{{__('forgetPassword')}}?</label>
                                    </div>
                                </div>  -->                             
                            </div>
                        </div>
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
