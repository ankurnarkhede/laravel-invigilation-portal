<?php
///**
// * Created by IntelliJ IDEA.
// * User: smartankur4u
// * Date: 8/11/17
// * Time: 7:37 AM
// */
use App\exam;
use App\schedule;
use App\schedule_temp;
use App\SMS_log;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Null_;




function SendSMS($fac_name, $fac_phone, $time_text, $exam, $date){

    $sms_text="Dear ".$fac_name.
        ",\nYour invigilation is scheduled at ".$time_text.
        " on ".$date.
        " for ".$exam.".".
        "\nThank You!";

    $phone=$fac_phone;

//        send sms code

    # code...

    /*Send SMS using PHP*/

    //Your authentication key
    $authKey = "";

    //Multiple mobiles numbers separated by comma
    $mobileNumber = $phone;

    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "";

    //Your message to send, Add URL encoding here.
    $message = urlencode($sms_text);

    //Define route
    // $route = "default";
    $route = 4;
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";

    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));


    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    //get response
    $output = curl_exec($ch);




    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
        $result= "Error sending SMS. Please contact the administrator!";
        $success=0;
    }
    else
    {

        $success=1;
        $result= "SMS sent to ".$phone." successfully!";

    }

    //        save logs

    // GET USER IP ADDRESS
//    $ip= \Request::ip();
    $ip="127.0.0.1";

//    $user=Auth::user();
//    $user_name=$user->name;


    $user_name='Auto';

    $sms=new SMS_log();
    $sms->sent_to=$phone;
    $sms->from=$user_name;
    $sms->sms_text=$sms_text;
    $sms->ip=$ip;
    $sms->success=$success;
    $sms->request_id=$output;


    curl_close($ch);

    if ($sms->save()){

        return true;
    }

    return false;




}

?>