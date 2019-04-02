<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">       

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/educate-custon-icon.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('js/admin/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


   <!-- x-editor CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/admin/editor/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/editor/datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/editor/bootstrap-editable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/editor/x-editor-style.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/data-table/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/data-table/bootstrap-editable.css') }}">
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    @include('admin.components.leftsidebar')
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.menubar')
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Categories table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" 
                                        data-toggle="table" 
                                        data-pagination="true" 
                                        data-search="true" 
                                        data-show-columns="true" 
                                        data-show-pagination-switch="true" 
                                        data-show-refresh="true" 
                                        data-key-events="true" 
                                        data-show-toggle="true" 
                                        data-resizable="true" 
                                        data-cookie="true"
                                        data-cookie-id-table="saveId" 
                                        data-show-export="true" 
                                        data-click-to-select="true" 
                                        data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id" key>STT</th>
                                                <th data-field="name" data-editable="true">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @for ($i = 0; $i < count($categories); $i++)
                                        <tr>
                                            <td></td>
                                            <td>{{$i}}</td>
                                            <td>{{__($categories[$i]->get('categoryName'))}}</td>
                                        </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/admin/data-table/bootstrap-editable.css') }}">


    <!-- jquery
		============================================ -->
        <script src="{{ asset('js/admin/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('js/admin/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('js/admin/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('js/admin/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('js/admin/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('js/admin/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('js/admin/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('js/admin/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/admin/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
   <script src="{{ asset('js/admin/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/admin/metisMenu/metisMenu-active.js') }}"></script>
    <!-- data table JS
		============================================ -->
    <script src="{{ asset('js/admin/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/tableExport.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/data-table-active.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/bootstrap-table-editable.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ asset('js/admin/data-table/bootstrap-table-export.js') }}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{ asset('js/admin/editable/jquery.mockjax.js') }}"></script>
    <script src="{{ asset('js/admin/editable/mock-active.js') }}"></script>
    <script src="{{ asset('js/admin/editable/select2.js') }}"></script>
    <script src="{{ asset('js/admin/editable/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/editable/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('js/admin/editable/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/admin/editable/xediable-active.js') }}"></script>
    <!-- Chart JS
		============================================ -->
    <script src="{{ asset('js/admin/chart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/admin/peity/peity-active.js') }}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{ asset('js/admin/tab.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('js/admin/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('js/admin/main.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('js/admin/tawk-chat.js') }}"></script>
</body>

</html>