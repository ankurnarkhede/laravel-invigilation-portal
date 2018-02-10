




<!DOCTYPE html>

<html lang="en">
<head>


    <meta http-equiv="cache-control" content="no-cache" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
    <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css?no-cache=<?php echo time(); ?>" rel="stylesheet" type="text/css">



    <style type="text/css">

        /*@media (max-width: 480 px) {*/
            /*.title_phone{*/
                /*font-size: 90%;*/
            /*}*/

        /*}*/


    </style>


</head>

<body>

{{--loader s--}}
@include('includes.loader')

{{--loader e--}}


<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">
        <nav class="cyan darken-1">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>


                <div class="header-title col s12 m8">
                    <span class="chapter-title title_phone">SGGSIE&T - INVIGILATION</span>
                </div>
            </div>
        </nav>
    </header>


    <aside class="side_nav_width side-nav white fixed" id="slide-out" style="width: 240px;">
        <div class="side-nav-wrapper">
            <div class="sidebar-profile">
                <div class="sidebar-profile-image">
                    <img alt="" class="circle" src="assets/images/profile-image.png" style="width: 80px; height: 80px;   ">
                </div>


                <div class="sidebar-profile-info">

                    <p>{{ $user->name }}</p>
                    <span> {{ $user->type }}</span>

                </div>
            </div>


            <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey  " href="{{ route('schedule') }}"><i class="material-icons">add_circle</i>Schedule Invigilation</a>
                </li>

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey  " href="{{ route('sms') }}"><i class="material-icons">sms</i>Send SMS</a>
                </li>

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey  " href="{{ route('SMS-auto-send') }}"><i class="material-icons">sms</i>Send SMS Automatically</a>
                </li>

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey  " href="{{ route('users') }}"><i class="material-icons">account_circle</i>Users</a>
                </li>

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey  " href="{{ route('help') }}"><i class="material-icons">help</i>Help</a>
                </li>

                <li class="no-padding  ">
                    <a class="waves-effect waves-grey " href="{{ route('logout') }}"><i class="material-icons">exit_to_app</i>Log Out</a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- header e -->

    <!-- <main class="mn-inner inner-active-sidebar">
        <div class="middle-content" style="width:100% !important;">
        </div>
    </main> -->





		