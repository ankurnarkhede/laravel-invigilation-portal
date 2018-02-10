<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 7/11/17
 * Time: 11:17 PM
 */



date_default_timezone_set('Asia/Kolkata');

// Then call the date functions
$date_curr = date('Y-m-d');
$date_curr_time=strtotime($date_curr);

$time_curr=date('H:i:s');
$time_curr_time=strtotime($time_curr);

//echo 'Date: '.$date_curr.' Time:'.$time_curr;

$timestamp= date('Y-m-d H:i:s');
echo "<br/>timestamp:".$timestamp;

$timestamp_time=strtotime($timestamp);

$date="2017-11-21";
$time="17:00:00";

$datetime=$date.' '.$time;
echo "<br/>datetime tomm= ".$datetime;
$datetime_time=strtotime($datetime);


echo "<br/>DIFFERENCE= ".round(abs($datetime_time-$timestamp_time) / 60,2). " minute";

echo "<br/>DIFFERENCE2= ".round(abs(strtotime("2017-11-21 00:00:00")-strtotime("2017-11-20 00:00:00")) / 60,2). " minute";


//if (((strtotime($date_time)-strtotime($date_curr_time))/(60*60*24))<=1){
//    echo "<br/>date is equal";
//
//}

if (round(abs($datetime_time-$timestamp_time) / 60,2)<1400){
    echo "---------working--------";
}


//echo round(abs($time-$time_curr_time) / 60,2). " minute";
//if((round(abs($time-$time_curr_time) / 60,2))<60){
//    echo "diff seems working";
//}

















