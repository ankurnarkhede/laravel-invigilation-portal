<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 4/11/17
 * Time: 5:43 PM
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

require "fun.php";


class SMSController extends Controller{

    public function getSMS(){
        $sms=SMS_log::orderBy('created_at', 'desc')->get();
//        $sms=DB::table('s_m_s_logs')->orderBy('created_at', 'desc')->get();


        return view('sms',  ['user'=>Auth::user(), 'sms'=>$sms]);
    }

    public function getHelp(){
//        $conn = mysqli_connect("127.0.0.1","root","","onlinylh_faculty_profile");
////        $faculty = DB::connection('faculty')->select('select * from main_details');
//        $faculty=mysqli_query($conn,'select * from main_details');
        return view('help',  ['user'=>Auth::user() ]);
    }

    public function postSendSMS(Request $request){
    //        validation
        $this -> validate($request, [
            'phone' => 'required|max:13',
            'sms_text' => 'required|max:140'

        ]);

        $phone=$request['phone'];
        $sms_text=$request['sms_text'];


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

        // GET USER IP ADDRESS
//        $ip=get_ip();
        $ip= \Request::ip();


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



        curl_close($ch);

        //        save logs
        $user=Auth::user();
        $user_name=$user->name;


        $sms=new SMS_log();
        $sms->sent_to=$phone;
        $sms->from=$user_name;
        $sms->sms_text=$sms_text;
        $sms->ip=$ip;
        $sms->success=$success;
        $sms->request_id=$output;


        if ($sms->save()){
            return redirect()->route('sms')->with(['result'=>$result]);
        }



//        save logs over
        return redirect()->route('sms')->with(['result'=>$result]);


    }


    public function getSchedule(){
        $schedule=schedule::orderBy('created_at', 'desc')->get();
        $exams=exam::orderBy('created_at', 'desc')->get();
        return view('schedule',  ['user'=>Auth::user(), 'schedules'=>$schedule, 'exams'=>$exams]);
    }



    public function postScheduleManually (Request $request){

        $this -> validate($request, [
            'fac_name' => 'required',
            'fac_contact' => 'required|max:15',
            'select_exam'=> 'required',
            'date'=> 'required',
            'time'=> 'required'
        ]);

        $fac_name=$request['fac_name'];
        $fac_contact=$request['fac_contact'];
        $select_exam=$request['select_exam'];
        $date=$request['date'];
        $time_text=$request['time'];
//        processing on time

        $time=date("H:i", strtotime(substr( $time_text, 0, strpos( $time_text, " " ))));

//        time processing end

        $sent_1=0;
        $sent_2=0;
        $approve=1;


        $schedule = new schedule();
        $schedule->exam=trim($select_exam);
        $schedule->date=trim($date);
        $schedule->time=trim($time);
        $schedule->time_text=trim($time_text);
        $schedule->fac_name=trim($fac_name);
        $schedule->fac_phone=trim($fac_contact);
        $schedule->approve=$approve;
        $schedule->sent_1=$sent_1;
        $schedule->sent_2=$sent_2;

        if ($schedule->save()){
            $result="Invigilation of ".$fac_name." scheduled at $date $time";
            return redirect()->route('schedule')->with(['result'=>$result]);
        }


        return redirect()->route('schedule')->with(['result'=>"Failed to save. Please contact the administrator!"]);


    }

    public function postScheduleUpload (Request $request){

        $result="Error in Uploading. Please contact the administrator!";

        $this -> validate($request, [

            'select_exam'=> 'required',
            'csv_file'=> 'required'

        ]);

//        taking post values
        $select_exam=$request['select_exam'];

        $user=Auth::user();
        $username=$user->name;
        $file=$request->file('csv');
        $filename=$username.'-'.$request['select_exam'].'-'.$request['csv_file'].'.csv';
        if ($file){
            Storage::disk('local')->put($filename, File::get($file));

//            saving file in db
            $line_count=0;
            $date=[];
            $time=[];
            $cols_count=0;

            if (($handle = fopen ( '../storage/app/'.$filename, 'r' )) !== FALSE) {
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $line_count++;

//                    count cols
                    if($line_count==1){
                        for ($i=0; !empty($data[$i]); $i+=1){
                            $cols_count++;
                        }

                    }
//take date in array
                    if($line_count==1){
                        for ($i=3; !empty($data[$i]); $i+=1){
                            $date[$i]=$data[$i];
                        }

                    }

//                    take time in array
                    if($line_count==2){
                        for ($i=3; !empty($data[$i]); $i+=1){
                            $time[$i]=$data[$i];
                        }

                    }

//continue till main data doesnt start...requires index at data[0] in csv
                    if(!is_numeric($data[0])){
                        continue;
                    }


//                  data save logic in table
                    for ($i=3; $i<$cols_count; $i++){
                        if((trim($data[$i])=='y') || (trim($data[$i])=='Y')){
                            $schedule = new schedule();

                            $schedule->exam=trim($select_exam);
                            $schedule->date=trim($date[$i]);
//                            $schedule->time=$time[$i];


//        processing on time
                            $time_text=trim($time[$i]);

                            $schedule->time_text=trim($time_text);

                            $time_format=date("H:i", strtotime(substr( $time_text, 0, strpos( $time_text, " " ))));
                            $schedule->time=trim($time_format);
//        time processing end


                            $schedule->fac_name=trim($data[1]);
                            $schedule->fac_phone=trim($data[2]);
                            $schedule->approve=1;
                            $schedule->sent_1=0;
                            $schedule->sent_2=0;

                            if ($schedule->save()){
                                $result="Invigilation scheduled!";
                            }
                        }

                    }


                }
                fclose ( $handle );
            }




//            saving file end

            return redirect()->route('schedule')->with(['result'=>$result]);

        }

        return redirect()->route('schedule')->with(['result'=>'ERROR! Please contact Administrator!']);

    }


    public function getSMSAutoSend(){

        $schedule1=schedule::orderBy('created_at', 'desc')
            ->where('approve', '<>', '0')
            ->where('sent_1', '<>', 1)
            ->get();

        $schedule2=schedule::orderBy('created_at', 'desc')
            ->where('approve', '<>', '0')
            ->where('sent_2', '<>', 1)
            ->get();

//        $schedule=schedule::orderBy('created_at', 'desc')
//            ->where(
//                ['approve', '<>', 0],
//                ['sent_1', '<>', 1]
//            )
//            ->orwhere(
//                ['approve', '<>', 0],
//                ['sent_2', '<>', 1]
//            )
//            ->get();

//        $schedule=schedule::orderBy('created_at', 'desc')
//
//            ->get();


//        get current date time
        date_default_timezone_set('Asia/Kolkata');

// Then call the date functions
        $date_curr = date('Y-m-d');
        $time_cur=date('H:i:s');

        $time_curr=strtotime($time_cur);
        $timestamp= date('Y-m-d H:i:s');

//        date time taken end

//        sending for 1 day b4
        foreach ($schedule1 as $sch){
            //        for < 1 day

            $date_time_invi=$sch->date.' '.$sch->time;

            if (round(abs(strtotime($date_time_invi)-strtotime($timestamp)) / 60,2)<1440){
//                    sending sms

                if(SendSMS($sch->fac_name, $sch->fac_phone, $sch->time_text,$sch->exam, $sch->date)){

//                        change status
                    $sch_update=schedule::where('id', $sch->id)->first();

                    $sch_update->sent_1=1;

                    $sch_update->update();

                }

            }

        }


        foreach ($schedule2 as $sch){

//            for <45mins
            if ($sch->date==$date_curr){
                if ((round(abs(strtotime($sch->time)-$time_curr) / 60,2))<45){


//                    sending sms
                    if(SendSMS($sch->fac_name, $sch->fac_phone, $sch->time_text,$sch->exam, $sch->date)){

//                        change status
                        $sch_update=schedule::where('id', $sch->id)->first();

                        $sch_update->sent_2=1;

                        $sch_update->update();

                    }

                }
            }



        }

        return redirect()->route('schedule')->with(['result'=>"SMS Sent!"]);



    }


    public function postInvigilationStatus(Request $request){
        //        validation
        $this -> validate($request, [
            'schedule_id' => 'required',
            'schedule_approve' => 'required'

        ]);

        $sch_id=$request['schedule_id'];
        $sch_approve=$request['schedule_approve'];

        $schedule=schedule::where('id', $sch_id)->first();
        if ($sch_approve!=0){
            $schedule->approve=0;
        }
        else{
            $schedule->approve=1;
        }
        $schedule->update();




        return redirect()->route('schedule')->with(['result'=>"Status changed successfully!"]);


    }

    public function getSampleCSV(){
        $path = storage_path('csvs/Invigilation_Schedule_sample.csv');

        return response()->download($path);
    }



}