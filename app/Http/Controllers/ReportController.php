<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 31/3/18
 * Time: 5:59 PM
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

use Illuminate\Support\Facades\Response  as FacadeResponse;




class ReportController extends Controller
{


    public function getReports()
    {


        $exams = schedule::select('exam')->distinct()->orderBy('created_at', 'desc')->get();
        $dates = schedule::select('date')->distinct()->orderBy('created_at', 'desc')->get();
        $times = schedule::select('time_text')->distinct()->orderBy('created_at', 'desc')->get();

        return view('reports', ['user' => Auth::user(), 'exams' => $exams, 'dates' => $dates, 'times' => $times]);
    }





    public function postGetReport(Request $request)
    {

//        validation
        $this->validate($request, [
            'select_exam' => 'required',
            'select_date' => 'required',
            'select_time' => 'required'

        ]);

        $select_exam = trim($request['select_exam']);
        $select_date = trim($request['select_date']);
        $select_time = trim($request['select_time']);

        $file_name=$select_exam.'___'.$select_date.'___'.$select_time;

        $schedule1 = schedule::where('exam', '=', $select_exam)
            ->where('date', '=', $select_date)
            ->where('time_text', '=', $select_time)
            ->orderBy('dept','asc')
            ->get();



        switch($request['submitbutton']) {

            case 'excel':
                return view('generate-report',
                    ['user' => Auth::user(),
                        'schedule' => $schedule1, 'exam'=>$select_exam, 'date'=>$select_date, 'time'=>$select_time, 'file_name'=>$file_name ]);

                break;

            case 'print':
                return view('print-report',
                    ['user' => Auth::user(),
                        'schedule' => $schedule1, 'exam'=>$select_exam, 'date'=>$select_date, 'time'=>$select_time, 'file_name'=>$file_name ]);

                break;

            default:
                return view('generate-report',
                    ['user' => Auth::user(),
                        'schedule' => $schedule1, 'exam'=>$select_exam, 'date'=>$select_date, 'time'=>$select_time, 'file_name'=>$file_name ]);
                break;

        }


    }







}


?>