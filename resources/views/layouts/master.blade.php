
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="no" name="msapplication-tap-highlight">
        <meta content="OnlineSGGS Invigilation Portal " name="description">
        <meta content="SGGS, SGGSIE&T, Invigilation, notifications, invigilation scheduling, schedule, OnlineSGGS, onlinesggs, sggs, invigilation, INVIGILATION, portal, PORTAL, Portal, invigilation portal,Shri Guru Gobind Singhji Institute of Engineering and Technology, nanded, vishnupuri," name="keywords">
        <meta name="author" content="Ankur Narkhede" />
        <meta http-equiv="cache-control" content="no-cache" />


        <title>@yield('title')</title>
        <!-- Favicons-->
        <link rel="icon" type="image/png" href="assets/images/sggs_logo.png" sizes="32x32" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        {{--analytics--}}
    <?php

            include "assets/analytics.php";

    ?>

<!-- Styles -->
<style>

</style>
</head>
<body>
@include('includes.header')

<main class="mn-inner inner-active-sidebar">
    <div class="middle-content" style="width:100% !important;">
        @yield('content')
    </div>
</main>


@include('includes.footer')


</body>
</html>
