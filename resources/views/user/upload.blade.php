<?php
    if (!function_exists('dataLog')) {
        include('../actions/actions.php');
    }
?>
<?php
    $data = getCurrentUser();
    if ($data[1] == "null"){
        header("Location: /", true, 301);
        exit();
    }
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{__('loading')}}</title>
        <meta name="_token" content="{{csrf_token()}}" /> 
		<meta name="notification" content="" title="" noticontent="" icon=""/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- Get favicon -->
        @include('components.getfavicon')
        <!-- Get CSS file -->
        @include('components.getcss')
    </head>
    <body onload="starting()" class="checkout">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
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
								<li><a href="/upload" class="active">{{__('upload')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- entry-header-area-start -->
		<div class="entry-header-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="entry-header-title">
							<h2>{{__('enterBookInformation')}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area-end -->
		<!-- coupon-area-area-start -->
		<!-- coupon-area-area-end -->
		<!-- checkout-area-start -->
		<div class="checkout-area mb-70">
			<div class="container">
				<div class="row">
					<form action="#">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="your-order">
								<div class=row>
                                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('bookName')}}</h5>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="checkout-form-list">
                                                    <input id="bookName" type="text" placeholder="{{__('bookName')}}...">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('price')}}</h5>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="checkout-form-list">
                                                    <input id="bookPrice" type="number" placeholder="{{__('price')}}...">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('discount')}}</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="checkout-form-list">
                                                    <input id="dev_discount" type="number" value ="0" placeholder="0">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="checkout-form-list">
                                                    <h4 class="dev_mark">(%)</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                               <img class="dev-img-right " src="http://pkkalda.ee/wp-content/uploads/2018/07/nool.png" alt="">
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="checkout-form-list">
                                                    <input type="number" id="bookDiscount" value="0" type="number" >
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('description')}}</h5>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="checkout-form-list">
                                                    <textarea id="description" 
                                                    placeholder="{{__('description')}}..." rows="7" style="width: -webkit-fill-available;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('category')}}</h5>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="checkout-form-list">
                                                <select id="category" class="upload-categories-select">
                                                    <option value="">{{__('category')}}</option>
                                                    @for ($i = 0; $i < count($categories); $i++)
                                                        <option value="{{__($categories[$i]->getObjectId())}}">{{__($categories[$i]->get('categoryName'))}}</option>
                                                    @endfor
                                                </select>
                                                {{ csrf_field() }}		
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="uploadtitle">{{__('number')}}</h5>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="checkout-form-list">
                                                    <input id="bookNumber" type="number" placeholder="{{__('number')}} ... ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="dropzone" class="dropzone">
                                                    <div class="info"></div>
                                                </div>
                                            </div>
                                            <script>
                                                var client_ID = '4409588f10776f7';
                                                (function(root, factory) {
                                                    "use strict";
                                                    if (typeof define === 'function' && define.amd) {
                                                        define([], factory);
                                                    } else if (typeof exports === 'object') {
                                                        module.exports = factory();
                                                    } else {
                                                        root.Imgur = factory();
                                                    }
                                                }(this, function() {
                                                    "use strict";
                                                    var Imgur = function(options) {
                                                        if (!this || !(this instanceof Imgur)) {
                                                            return new Imgur(options);
                                                        }

                                                        if (!options) {
                                                            options = {};
                                                        }

                                                        if (!options.clientid) {
                                                            throw 'Provide a valid Client Id here: https://api.imgur.com/';
                                                        }

                                                        this.clientid = client_ID;
                                                        this.endpoint = 'https://api.imgur.com/3/image';
                                                        this.callback = options.callback || undefined;
                                                        this.dropzone = document.querySelectorAll('.dropzone');
                                                        this.info = document.querySelectorAll('.info');

                                                        this.run();
                                                    };

                                                    Imgur.prototype = {
                                                        createEls: function(name, props, text) {
                                                            var el = document.createElement(name),
                                                                p;
                                                            for (p in props) {
                                                                if (props.hasOwnProperty(p)) {
                                                                    el[p] = props[p];
                                                                }
                                                            }
                                                            if (text) {
                                                                el.appendChild(document.createTextNode(text));
                                                            }
                                                            return el;
                                                        },
                                                        insertAfter: function(referenceNode, newNode) {
                                                            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                                                        },
                                                        post: function(path, data, callback) {
                                                            var xhttp = new XMLHttpRequest();

                                                            xhttp.open('POST', path, true);
                                                            xhttp.setRequestHeader('Authorization', 'Client-ID ' + this.clientid);
                                                            xhttp.onreadystatechange = function() {
                                                                if (this.readyState === 4) {
                                                                    if (this.status >= 200 && this.status < 300) {
                                                                        var response = '';
                                                                        try {
                                                                            response = JSON.parse(this.responseText);
                                                                        } catch (err) {
                                                                            response = this.responseText;
                                                                        }
                                                                        callback.call(window, response);
                                                                    } else {
                                                                        throw new Error(this.status + " - " + this.statusText);
                                                                    }
                                                                }
                                                            };
                                                            xhttp.send(data);
                                                            xhttp = null;
                                                        },
                                                        createDragZone: function() {
                                                            var p1, p2, input;

                                                            p1 = this.createEls('p', {}, 'Drop and drap image file here or click here to choose the image file (Kéo thả tập tin ảnh vào đây hoặc nhấp vào đây để chọn ảnh');
                                                            input = this.createEls('input', { type: 'file', className: 'dev-input', accept: 'image/*' });

                                                            Array.prototype.forEach.call(this.info, function(zone) {
                                                                zone.appendChild(p1);
                                                            }.bind(this));
                                                            Array.prototype.forEach.call(this.dropzone, function(zone) {
                                                                zone.appendChild(input);
                                                                this.status(zone);
                                                                this.upload(zone);
                                                            }.bind(this));
                                                        },
                                                        loading: function() {
                                                            var div, table, img;

                                                            div = this.createEls('div', { className: 'loading-modal' });
                                                            table = this.createEls('table', { className: 'loading-table' });
                                                            img = this.createEls('img', { 
                                                                className: 'loading-image', 
                                                                src: 'https://lkp.dispendik.surabaya.go.id/assets/loading.gif' 
                                                                });

                                                            div.appendChild(table);
                                                            table.appendChild(img);
                                                            document.body.appendChild(div);
                                                        },
                                                        status: function(el) {
                                                            var div = this.createEls('div', { className: 'status' });

                                                            this.insertAfter(el, div);
                                                        },
                                                        matchFiles: function(file, zone) {
                                                            var status = zone.nextSibling;

                                                            if (file.type.match(/image/) && file.type !== 'image/svg+xml') {
                                                                document.body.classList.add('loading');
                                                                status.classList.remove('bg-success', 'bg-danger');
                                                                status.innerHTML = '';

                                                                var fd = new FormData();
                                                                fd.append('image', file);

                                                                this.post(this.endpoint, fd, function(data) {
                                                                    document.body.classList.remove('loading');
                                                                    typeof this.callback === 'function' && this.callback.call(this, data);
                                                                }.bind(this));
                                                            } else {
                                                                status.classList.remove('bg-success');
                                                                status.classList.add('bg-danger');
                                                                status.innerHTML = 'Định dạng không hợp lệ (Invalid archive)';
                                                            }
                                                        },
                                                        upload: function(zone) {
                                                            var events = ['dragenter', 'dragleave', 'dragover', 'drop'],
                                                                file, target, i, len;

                                                            zone.addEventListener('change', function(e) {
                                                                if (e.target && e.target.nodeName === 'INPUT' && e.target.type === 'file') {
                                                                    target = e.target.files;

                                                                    for (i = 0, len = target.length; i < len; i += 1) {
                                                                        file = target[i];
                                                                        this.matchFiles(file, zone);
                                                                    }
                                                                }
                                                            }.bind(this), false);

                                                            events.map(function(event) {
                                                                zone.addEventListener(event, function(e) {
                                                                    if (e.target && e.target.nodeName === 'INPUT' && e.target.type === 'file') {
                                                                        if (event === 'dragleave' || event === 'drop') {
                                                                            e.target.parentNode.classList.remove('dropzone-dragging');
                                                                        } else {
                                                                            e.target.parentNode.classList.add('dropzone-dragging');
                                                                        }
                                                                    }
                                                                }, false);
                                                            });
                                                        },
                                                        run: function() {
                                                            var loadingModal = document.querySelector('.loading-modal');

                                                            if (!loadingModal) {
                                                                this.loading();
                                                            }
                                                            this.createDragZone();
                                                        }
                                                    };

                                                    return Imgur;
                                                }));

                                                var data_images = [];

                                                var feedback = function(res) {
                                                    if (res.success === true) {
                                                        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
                                                        var dev_img = document.createElement("img");
                                                        dev_img.setAttribute("src", get_link);
                                                        dev_img.setAttribute("class", "col-lg-4 dev-img-upload dev-fix-img");
                                                        document.getElementById("image-uploaded").appendChild(dev_img);
                                                        data_images.push(get_link);
                                                    }
                                                };

                                                new Imgur({
                                                    clientid: client_ID,
                                                    callback: feedback
                                                });
                                            </script>
                                            <div id="image-uploaded">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span id="remove" class="btn btn-danger remove"> {{__('delete')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dev-right">
										<input id="upload" type="button" value="Upload">
                                    </div>
                                </div>
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
        <script>
            document.getElementById('bookDiscount').disabled = true;
            document.getElementById('dev_discount').disabled = true;
            function render() {
                setTimeout("render()",400);

                var discount_input = document.getElementById("bookPrice").value;
                if (discount_input == ""){
                    document.getElementById('dev_discount').disabled = true;
                    // $("#dev_discount").val(0);
                    // $("#bookDiscount").val(0);
                }else{
                    document.getElementById('dev_discount').disabled = false;
                    var percentDiscount = document.getElementById("dev_discount").value;

                    var rootPrice = parseInt(discount_input, 10);
                    var percentDiscount_ = parseInt(percentDiscount, 10);

                    var result = ((100 - percentDiscount_)/100)*rootPrice;
                    $("#bookDiscount").val(result);
                }

                var number_of_elements = countElements(document.getElementById('image-uploaded'), false);
                var upload_remove_button = document.getElementById("remove"); 
                

                if(number_of_elements < 1){
                    upload_remove_button.style.display = "none";
                }else{
                    upload_remove_button.style.display = "flow-root";
                }
            }
            render();
        </script>  
    </body>
</html>
