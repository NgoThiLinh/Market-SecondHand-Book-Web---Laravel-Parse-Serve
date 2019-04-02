
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
    <body onload="onloadDelivery();" class="product-details">
		<!-- header-area-start -->
        <header>
        	@include('components.header')
		</header>
		<!-- header-area-end -->
        <!-- Modal after delivery  -->
        <div class="modal fade" id="model-thanks" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="closeFunction()" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Hoàn tất bán hàng</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn được cộng 100 điểm vào <a href="/profile/userInfor">Tài khoản</a> của mình cho mỗi lần giao dịch thành công.</p>
                    <p>Hãy tích lũy thật nhiều và <a href="/profile/userInfor">Quy đổi điểm</a> thành tiền để quá trình mua hàng thêm tiện lợi.</p>
                    <p>Cảm ơn bạn đã sử dụng sản phẩm của <a href="/">Chợ sách</a></p>
                    <p>Mọi thắc mắc hãy <a href="/contact">Tương tác</a> với chúng tôi</p>                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" onclick="closeFunction()" data-dismiss="modal">Đóng</button>
                  <a class="continue-experience" href="/">Tiếp tục trải nghiệm</a>
                </div>
              </div>
            </div>
        </div>
        <!-- Modal -->
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
                    <?php
                                $data = getCurrentUser();
                                $idUserGive = $data[1];
                    ?>
                    <button style="display: none" id="idUserGiveFeedBack" value="{{$idUserGive}}"></button>
                    @for ($i = 0; $i < count($users); $i++)
                    <button style="display: none" id="idUserBeFeedBack" value="{{$users[$i]->getObjectId()}}"></button>
                    @endfor
                    <p>Nhận xét người bán</p>
                    <div class="star-rating"><s><s><s><s><s></s></s></s></s></s></div>
                    <input id="show-result" name="showresult" class="show-result" style="display: none" ></input>
                    <div style="display: none" name="showresult" class="show-result">No stars selected yet.</div>

                    <p>Nhận xét người bán</p>
                    <textarea type="text" id="review" name="review" class="form-control"></textarea>
                    <button type="button" id="btnSendFeedback" class="btn btn-default btnrating" >Gửi đánh giá</button>
                        {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" onclick="closeFunction()" data-dismiss="modal">Đóng</button>
                  <a class="continue-experience" href="/">Tiếp tục trải nghiệm</a>
                </div>
              </div>
            </div>
        </div>
        <div class="breadcrumbs-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-menu">
                            <ul>
                                <li><a href="/">{{__('home')}}</a></li>
                                <li><a href="{{$order->getObjectId()}}" class="active">{{__('orderStatus')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-main-area mb-70">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button {{$buyerInforIdFromUser}} id="idOrder" style="display: none" value="{{$order->getObjectId()}}">{{$order->getObjectId()}}</button>
                       
                           <div class="progress-wrapper">
                              <div class="progress">
                                <div class="progress-track"></div>
                                <div id="step1" type="button"  class="progress-step first is-active">
                                  <button  id="btnNextStep1" class="btnNextStep" value="{{$order->get("receivedOrder")}}">{{__('receiveOrder')}}</button>
                                </div>
                                <div id="step2" type="button" class="progress-step second">
                                    <button  id="btnNextStep2" class="btnNextStep" value="{{$order->get("packagedOrder")}}" >{{__('packageOrder')}}</button>
                                </div>
                                <div id="step3" type="button" class="progress-step third">
                                    <button  id="btnNextStep3" class="btnNextStep" value="{{$order->get("inprogressOrder")}}" >{{__('inProgress')}}</button>
                                  
                                </div>
                                <div id="step4" class="progress-step forth ">
                                    <button  type="button" id="btnNextStep4" value="{{$order->get("shippedOrder")}}" data-toggle="modal" data-target="#model-thanks" class="btnNextStep" >{{__('shipped')}}</button>
                                  
                                </div>
                              </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-area mb-70">
                    <div class="container">
                        <div class="row">
                            <form action="#">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="your-order">
                                        <h5 class="numberOfOrder">{{__('order')}} <a href="#">#{{$order->getObjectId()}}</a>
                                        <p class="dayOrder">{{__('dayOrder')}}: {{$order->getCreatedAt()->format('d-m-Y')}}</p>
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
                                                                        <a href="#"><img src="{{$bookInfor->get("images")[$j]}}" alt="book" /></a>
                                                                    </div>
                                                                    @endfor
                                                                    <div class="cart-info">
                                                                        <input id="idBookdelivery" style="display: none" value= "{{$bookInfor->getObjectId()}}">
                                                                        <h5><a href="#">{{$bookInfor->get("title")}}</a></h5>
                                                                        <span class="item-price">{{$bookInfor->get("promotionPrice")}}</span><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="amount">{{__('quantity')}} : {{$order->get("quanlity")}}</span>
                                                        </td>
                                                        <td class="product-total">
                                                            @if($order->get("receivedOrder") == 1 && 
                                                                $order->get("packagedOrder") == 0 &&
                                                                $order->get("inprogressOrder") == 0 &&
                                                                $order->get("shippedOrder") == 0)
                                                                
                                                                <span class="amount">Đã nhận đơn hàng</span>
                                                                
                                                            @elseif($order->get("receivedOrder") == 1 && 
                                                                $order->get("packagedOrder") == 1 &&
                                                                $order->get("inprogressOrder") == 0 &&
                                                                $order->get("shippedOrder") == 0)
                                                                
                                                                <span class="amount">Đã đóng gói</span>
                                                                
                                                            @elseif($order->get("receivedOrder") == 1 && 
                                                                $order->get("packagedOrder") == 1 &&
                                                                $order->get("inprogressOrder") == 1 &&
                                                                $order->get("shippedOrder") == 0)
                                                            
                                                            <span class="amount">Đang giao hàng</span>
                                                            
                                                            @elseif($order->get("receivedOrder") == 1 && 
                                                                $order->get("packagedOrder") == 1 &&
                                                                $order->get("inprogressOrder") == 1 &&
                                                                $order->get("shippedOrder") == 1)
                                                            
                                                            <span class="amount">Đã giao hàng</span>
                                                            
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                

                            </form>
                        </div>

                    </div>
        </div><!-- footer-area-start -->
        <div class="checkout-area mb-70">
            <div class="container">
                <div class="row">
                    <form action="#">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="your-order">
                                <h3>{{__('sellerInfor')}}</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="">
                                                    <div class="cart-product">
                                                        <div class="single-cart">
                                                             @for ($i = 0; $i < count($users); $i++)
                                                            <div class="cart-info">
                                                                <h6>{{__('name')}}: {{$users[$i]->get("yourName")}}</h6>
                                                                <h6>Email : {{$users[$i]->get("emailAddress")}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    <h6>{{__('phone')}}: {{$users[$i]->get("phoneNumber")}}</h6>
                                                    <h6>{{__('address')}}: {{$users[$i]->get("address")}}</h6>

                                                </td>
                                                @endfor

                                            </tr>
                                            <tr class="cart_item"> 
                                            <td class="cart-product">
                                                <div class="single-cart">
                                                        <div class="cart-info">
                                                            <h5 class="mainColorOrange">{{__('orderTotal')}}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount mainColorOrange">{{$order->get("totalPrice")}} đ</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div class="collapses-group">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse">
                                                              {{__('note')}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse in" role="tabpanel">
                                                        <div class="panel-body">
                                                            <p>
                                                                {{__('noteForRecever')}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <?php
                                            $data = getCurrentUser();
                                            $idUserDeliveryPage = $data[1];
                                    ?>
                                    @if($idUserDeliveryPage != $userSellerIdFromUser)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-left">
                                            <div class="review-rating">
                                            <h4 >{{__('feedbackSeller')}}</h4>
                                            </div></br>
                                        </div>
                                        <div class="review-right">
                                            <div class="review-content">
                                                <button class="btnfeedb" type="button" data-toggle="modal" data-target="#model-feedback" >{{__('feedback')}}</button>
                                            </div><br>

                                        </div>
                                    </div>
                                    @elseif($idUserDeliveryPage == $userSellerIdFromUser)
                                    <div style="display: none" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-left">
                                            <div class="review-rating">
                                            <h4 >{{__('feedbackSeller')}}</h4>
                                            </div></br>
                                        </div>
                                        <div class="review-right">
                                            <div class="review-content">
                                                <button class="btnfeedb" type="button" data-toggle="modal" data-target="#model-feedback" >{{__('feedback')}}</button>
                                            </div><br>

                                        </div>
                                    </div>
                                    @endif
                                    <div class="order-button-payment">
                                        <a href="/"><input type="submit" value="{{__('continueShopping')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox-form">                     
                                <h3>{{__('receverInfor')}}</h3>
                                @for ($i = 0; $i < count($buyerInfor); $i++)

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout-form-list">
                                            <label><span class="title-infomation-shipping">{{__('name')}}</span> <span class="info-style">: {{$buyerInfor[$i]->get("yourName")}}</span></label>                                       
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label><span class="title-infomation-shipping">{{__('address')}}</span><span class="info-style">: {{$buyerInfor[$i]->get("address")}}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label><span class="title-infomation-shipping">{{__('Email')}}</span><span class="info-style">: {{$buyerInfor[$i]->get("emailAddress")}}</span></label>                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label><span class="title-infomation-shipping">{{__('phone')}}</span><span class="info-style">: {{$buyerInfor[$i]->get("phoneNumber")}}</span></label>                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center">
                                            <img src="https://static.shoplightspeed.com/shops/608796/files/009576329/fast-delivery-final01.gif" alt="">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- footer-area-start -->
        <footer>
            @include('components.footer')
        </footer>
         <?php
                $data = getCurrentUser();
                $idUserGive = $data[1];
        ?>
        @if($idUserGive == $userSellerIdFromUser)
        <!-- Delivery files -->
        <script src="{{ asset('js/deliveryforseller.js') }}"></script>
        @elseif($idUserGive == $buyerInforIdFromUser)
        <script src="{{ asset('js/deliveryforbuyer.js') }}"></script>
        @endif
        <!-- footer-area-end -->
        <!-- Get JS file -->
        @include('components.getjs')
    </body>
</html>