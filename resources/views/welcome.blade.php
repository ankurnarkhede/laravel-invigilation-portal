<!DOCTYPE html>

<html lang="en">
<head>



    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="no" name="msapplication-tap-highlight">
    <meta content="OnlineSGGS Invigilation Portal " name="description">
    <meta content="SGGS, SGGSIE&T, Invigilation, notifications, invigilation scheduling, schedule, OnlineSGGS, onlinesggs, sggs, invigilation, INVIGILATION, portal, PORTAL, Portal, invigilation portalShri Guru Gobind Singhji Institute of Engineering and Technology, nanded, vishnupuri," name="keywords">
    <meta name="author" content="Ankur Narkhede" />


    <title>Login | SGGSIE&T Invigilation</title>
    <!-- Favicons-->
    <link rel="icon" type="image/png" href="assets/images/sggs_logo.png" sizes="32x32" />

    <meta content="#00bcd4" name="msapplication-TileColor">
    <meta content="login_page/images/favicon/mstile-144x144.png" name="msapplication-TileImage"><!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="login_page/css/materialize.min.css" media="screen,projection" rel="stylesheet" type="text/css">
    <link href="login_page/css/style.min.css" media="screen,projection" rel="stylesheet" type="text/css"><!-- Custome CSS-->
    <link href="login_page/css/custom/custom.min.css" media="screen,projection" rel="stylesheet" type="text/css">
    <link href="login_page/css/layouts/page-center.css" media="screen,projection" rel="stylesheet" type="text/css"><!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="login_page/js/plugins/prism/prism.css" media="screen,projection" rel="stylesheet" type="text/css">
    <link href="login_page/js/plugins/perfect-scrollbar/perfect-scrollbar.css" media="screen,projection" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/style.css?no-cache=<?php echo time(); ?>" rel="stylesheet" type="text/css">


    {{--analytics--}}
    <?php

    include "assets/analytics.php";

    ?>

    <script>

        $(document).ready(function(){
            $("#login_btn").click(function(){
                $("#signup").fadeOut();
                $("#login").fadeIn();

            });
        });

        $(document).ready(function(){
            $("#signup_btn").click(function(){
                $("#login").fadeOut();
                $("#signup").fadeIn();

            });
        });


    </script>


    <style>

    </style>
</head>

<body class="cyan">
<!-- Start Page Loading -->


<div id="loader-wrapper">
    <div id="loader">
    </div>


    <div class="loader-section section-left">
    </div>


    <div class="loader-section section-right">
    </div>
</div>
<!-- End Page Loading -->


<div class="row" id="login-page">

    <div class="col s12 z-depth-5 card-panel">
        <form action="{{ route('signin') }} " class="login-form" enctype="multipart/form-data" method="post" style="width: 400px;">
            <div class="row" style="margin-bottom: 0px;">
                <div class="input-field col s12 center">
                    <img alt="" class="circle responsive-img valign profile-image-login" src="assets/images/sggs.png" style="width: unset;">

                    <p class="center login-form-text">SGGSIE&T INVIGILATION</p>


                    <p class="center" style="color: #e74c3c; font-weight: bold;">
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6">
                            <a class="active" href="#login" id="login_btn">ADMIN LOGIN</a>
                        </li>

                    </ul>
                </div>

                <div class="col s12">
                    {{--@if(Session::has('result'))--}}
                        {{--<div>--}}
                            {{--<p class="text_center red-text text-bold">--}}
                                {{--{{ Session::get('result') }}--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--@if(count($errors)>0)--}}
                        {{--<div>--}}
                            {{--<ul>--}}
                                {{--@foreach($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </div>


                <div class="col s12" id="login">
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i> <input id="email" name="email" type="text"> <label class="center-align" for="email">Email or Phone</label>
                        </div>
                    </div>


                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"></i> <input id="password" name="password" type="password"> <label for="password">Password</label>
                        </div>
                    </div>


                    <input type="hidden" name="_token" value="{{ Session::token() }}">


                    <div class="row">
                        <div class="input-field col s12" type="submit">
                            <button class="btn waves-effect waves-light col s12" name="login_submit" type="submit">LogIn</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <p class="text_center">Developed by <a href="https://www.linkedin.com/in/ankurnarkhede">Ankur Narkhede</a></p>

    </div>
</div>
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
<script src="login_page/js/plugins/jquery-1.11.2.min.js" type="text/javascript">
</script> <!--materialize js-->

<script src="login_page/js/materialize.min.js" type="text/javascript">
</script> <!--prism-->

<script src="login_page/js/plugins/prism/prism.js" type="text/javascript">
</script> <!--scrollbar-->

<script src="login_page/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript">
</script> <!--plugins.js - Some Specific JS codes for Plugin Settings-->

<script src="login_page/js/plugins.min.js" type="text/javascript">
</script> <!--custom-script.js - Add your own theme custom JS-->

<script src="login_page/js/custom-script.js" type="text/javascript">
</script>
</body>
</html>