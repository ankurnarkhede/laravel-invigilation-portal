
<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="no" name="msapplication-tap-highlight">
        <meta content="OnlineSGGS Invigilation Portal " name="description">
        <meta content="SGGS, SGGSIE&T, Invigilation, notifications, invigilation scheduling, schedule, OnlineSGGS, onlinesggs, sggs, invigilation, INVIGILATION, portal, PORTAL, Portal, invigilation portal,Shri Guru Gobind Singhji Institute of Engineering and Technology, nanded, vishnupuri," name="keywords">
        <meta name="author" content="Ankur Narkhede" />
        <meta http-equiv="cache-control" content="no-cache" />


        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Favicons-->
        <link rel="icon" type="image/png" href="assets/images/sggs_logo.png" sizes="32x32" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    <?php

            include "assets/analytics.php";

    ?>

<!-- Styles -->
<style>

</style>
</head>
<body>
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main class="mn-inner inner-active-sidebar">
    <div class="middle-content" style="width:100% !important;">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>


<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>
</html>
