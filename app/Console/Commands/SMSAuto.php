<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\schedule;


class SMSAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send sms notifications cron';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "inside sms auto handle";

        require "sms_fun.php";

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

        return;


    }
}
