<?php
    if (!function_exists('dataLog')) {
        include('../actions/actions.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{csrf_token()}}" /> 
    <meta name="notification" content="" title="" noticontent="" icon=""/> 
    <title>Admin login</title>
    <link rel='stylesheet prefetch' href="{{ asset('css/log/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dev.css') }}">
</head>

<body>
    <div class='brand'>
        <a href="{{ url('/') }}" target='_blank'>
            <img src='../img/logo/logo.png'>
        </a>
    </div>
    <div class='login'>
        <div class='logo'>
            <a href="{{ url('/') }}" target='_blank'>
                <img src='../img/logo/logo.png'>
            </a>
        </div>
        <div class='login_title'>
            <span>{{__('loginAdminTitle')}}</span>
        </div>
        <div class='login_fields'>
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
                    </div>
                    <input placeholder="{{__('userNameOrEmail')}}" id="userName" type='text'>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__password'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
                    </div>
                    <input placeholder="{{__('password')}}" id="password" type='password'>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__submit'>
                    <input type='submit' id="loginSubmit" value="{{__('login')}}">
                    <div class='forgot'>
                        <a>{{__('forgetPassword')}}</a>
                    </div>
                </div>
        </div>
        
        <div class='success'>
            <h2>Authentication Success</h2>
            <p>Welcome back</p>
        </div>
        <div class='disclaimer'>
            <p>{{__('loginWarning1')}} <a style="color: cornflowerblue;" href="#">{{__('condition')}}</a> {{__('loginWarning2')}}</p>
        </div>
    </div>
    <div class='authent'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/puff.svg'>
        <p>{{__('loading')}}</p>
    </div>
    <div class='love'>
        <p>Bult with <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/love_copy.png" /> by
            <a href='#' target='_blank'> Brighten TEAM </a>
        </p>
    </div>

    <?php
        notification();
    ?>

   

    <script src="{{ asset('js/log/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/log/jquery.min.js') }}"></script>
    <script src="{{ asset('js/log/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/log/index.js') }}"></script>
    <script src="{{ asset('../js/actions.js') }}"></script>


    <script>
    
</script>
    
</body>

</html>
