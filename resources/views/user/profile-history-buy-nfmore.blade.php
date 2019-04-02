
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
                                            <a href="/profile/historybuy" class="profile-muli-option active">
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Đơn hàng chưa hoàn tất <strong>({{$numberOfBookBuyOfSellerNotFinish}})</strong></h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="toolbar-sorter">
                                        <select id="sorter" class="sorter-options" data-role="sorter">
                                            <option selected="selected" value="1"> {{__('5latest')}} </option>
                                            <option value="2"> {{__('10latest')}} </option>
                                            <option value="3"> {{__('15latest')}} </option>
                                            <option value="3"> {{__('all')}} </option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                @if(count($arayObjectOrderBuyOfUserNotFinish) == 0)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>
                                    Chưa có đơn hàng nào
                                    </p>
                                </div>  
                                @elseif(count($arayObjectOrderBuyOfUserNotFinish) > 0)
                                @for($i=0;$i<count($arayObjectOrderBuyOfUserNotFinish);$i++)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="your-order">
                                    <h5 class="numberOfOrder">{{__('order')}} <a href="/delivery/{{$arayObjectOrderBuyOfUserNotFinish[$i]->getObjectId()}}">#{{$arayObjectOrderBuyOfUserNotFinish[$i]->getObjectId()}}</a>
                                        <a class= "detail" href="/delivery/{{$arayObjectOrderBuyOfUserNotFinish[$i]->getObjectId()}}">{{__('orderDetail')}}</a>
                                    <p class="dayOrder">{{__('dayOrder')}}: {{$arayObjectOrderBuyOfUserNotFinish[$i]->getCreatedAt()->format('d-m-Y')}}</p>
                                    </h5>
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="">
                                                        <div class="cart-product">
                                                            <div class="single-cart">
                                                                @for ($j = 0; $j < 1; $j++)
                                                                <div class="cart-img">
                                                                    <a href="#"><img src="{{$arryBookBuyByUserAfterFoundInOrder[$i]->get("images")[$j]}}" alt="book" /></a>
                                                                </div>
                                                                @endfor
                                                                <div class="cart-info">
                                                                    <input id="idBookdelivery" style="display: none" value= "{{$arryBookBuyByUserAfterFoundInOrder[$i]->getObjectId()}}">
                                                                    <h5><a href="#">{{$arryBookBuyByUserAfterFoundInOrder[$i]->get("title")}}</a></h5>
                                                                    <span class="item-price">{{$arryBookBuyByUserAfterFoundInOrder[$i]->get("promotionPrice")}}</span><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{__('quantity')}} : {{$arayObjectOrderBuyOfUserNotFinish[$i]->get("quanlity")}}</span>
                                                    </td>
                                                    <td class="product-total">
                                                                @if($arayObjectOrderBuyOfUserNotFinish[$i]->get("receivedOrder") == 1 && 
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("packagedOrder") == 0 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("inprogressOrder") == 0 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("shippedOrder") == 0)
                                                                    
                                                                    <span class="amount">Đã nhận đơn hàng</span>
                                                                 @elseif($arayObjectOrderBuyOfUserNotFinish[$i]->get("receivedOrder") == 0 && 
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("packagedOrder") == 0 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("inprogressOrder") == 0 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("shippedOrder") == 0)
                                                                    
                                                                    <span class="amount">Chưa nhận đơn hàng</span>   
                                                                @elseif($arayObjectOrderBuyOfUserNotFinish[$i]->get("receivedOrder") == 1 && 
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("packagedOrder") == 1 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("inprogressOrder") == 0 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("shippedOrder") == 0)
                                                                    
                                                                    <span class="amount">Đã đóng gói</span>
                                                                    
                                                                @elseif($arayObjectOrderBuyOfUserNotFinish[$i]->get("receivedOrder") == 1 && 
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("packagedOrder") == 1 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("inprogressOrder") == 1 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("shippedOrder") == 0)
                                                                
                                                                <span class="amount">Đang giao hàng</span>
                                                                
                                                                @elseif($arayObjectOrderBuyOfUserNotFinish[$i]->get("receivedOrder") == 1 && 
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("packagedOrder") == 1 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("inprogressOrder") == 1 &&
                                                                    $arayObjectOrderBuyOfUserNotFinish[$i]->get("shippedOrder") == 1)
                                                                
                                                                <span class="amount">Đã giao hàng</span>
                                                                
                                                                @endif
                                                            </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                @endfor
                                @endif                        
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
