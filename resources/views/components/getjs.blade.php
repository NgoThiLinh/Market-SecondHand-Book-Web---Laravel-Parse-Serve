<?php
    notification();
?>
<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
		<!-- bootstrap js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- owl.carousel js -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<!-- meanmenu js -->
        <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
		<!-- wow js -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
		<!-- jquery.countdown.min.js -->
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
		<!-- jquery.flexslider.js -->
        <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
		<!-- chosen.jquery.min.js -->
        <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
		<!-- jquery.counterup.min.js -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
		<!-- waypoints.min.js -->
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
		<!-- plugins js -->
        <script src="{{ asset('js/plugins.js') }}"></script>
		<!-- main js -->
        <script src="{{ asset('js/main.js') }}"></script>
        <!-- Actions files -->
        <script src="{{ asset('js/actions.js') }}"></script>

        <script src='https://sp.zalo.me/plugins/sdk.js'></script>
        
        <div 
            class="zalo-chat-widget" 
            data-oaid="2445522973757062543" 
            data-welcome-message="Rất vui khi được hỗ trợ bạn!"
            data-autopopup="0"
            data-width="350" 
            data-height="420">
        </div>


        <script>
            var txt="{{ __('title') }}";
            var espera=100;
            var refresco=null;
            function rotulo_title() {
            document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresco=setTimeout("rotulo_title()",espera);
            }
            rotulo_title();

        </script>
<script src="https://cdn.rawgit.com/adriancooney/console.image/c9e6d4fd/console.image.min.js"></script>
<script>
    setTimeout(console.log.bind(console,'%c%s','color: red; background: yellow; font-size: 24px;','Let\'s stop your activity right now!'));
    setTimeout(console.log.bind(console,'%cThis function for developers. If you change or push something here. It will cause your data to be lost or incorrect.', 'color: red; font-weight: bold;'));

    function devOnLoading() {
        setTimeout("devOnLoading()",400);
            if (document.readyState === "complete") {
                preloader_.style.display = "none";
            }else{
                preloader_.style.display = "block";
            }
        }
        // devOnLoading();
</script>

<script>
    $(document).ready(function() {
        var preloader_ = document.getElementById("preloader");
        preloader_.style.display = "none";
    });
    </script>






