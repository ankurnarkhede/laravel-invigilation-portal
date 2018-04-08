
{{--/**--}}
 {{--* Created by IntelliJ IDEA.--}}
 {{--* User: smartankur4u--}}
 {{--* Date: 5/11/17--}}
 {{--* Time: 10:06 AM--}}
 {{--*/--}}



@extends('layouts.master')

@section('title')
    Schedule Invigilation | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

    {{--schedule start--}}

    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">

                <h4 class="text_center">Schedule Invigilation</h4>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s6"><a class="active" href="#manual">Add Invigilation</a></li>
                            <li class="tab col s6"><a  href="#upload">Upload a File</a></li>

                        </ul>
                    </div>

                    {{--by manually--}}
                    <div id="manual" class="col s12">
                        <h5 class="text_center">Add Invigilation</h5>
                        <span></span>
                        <form class="col s12" action="{{ route('schedule-manually') }}" enctype="multipart/form-data" method="POST" >

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input name="fac_name" id="fac_name" type="text" class="validate" required="required">
                                    <label for="fac_name">Name of Faculty</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone</i>
                                    <input maxlength="10" name="fac_contact" id="fac_contact" type="number" class="validate" required="required">
                                    <label for="fac_contact">Contact Number</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        @foreach($exams as $exam)
                                            <option value="{{ $exam->exam_name }}">{{ $exam->exam_name }}</option>

                                        @endforeach

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_dept" required="required"  >
                                        <option value="" disabled  selected>Select Department</option>


                                        <option value="CSE">CSE</option>
                                        <option value="EXTC">EXTC</option>
                                        <option value="CHEM">CHEM</option>
                                        <option value="INFT">INFT</option>
                                        <option value="INST">INST</option>
                                        <option value="MECH">MECH</option>
                                        <option value="PROD">PROD</option>
                                        <option value="TEXT">TEXT</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="ELEC">ELEC</option>



                                    </select>
                                    <label>Department</label>
                                </div>
                            </div>


                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range</i>
                                    <label for="date">Date</label>
                                    <input name="date" id="date" type="text" class="datepicker">
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">access_time</i>
                                    <label for="time">Time</label>
                                    <input name="time" id="time" type="text" class="timepicker">

                                    <span class=""><div>Time format: <span class="red-text">13:00 - 15:30</span></div></span>


                                </div>
                            </div>


                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                            <button class="btn waves-effect waves-light" type="submit" name="add">Add
                                <i class="material-icons right">send</i>
                            </button>
                        </form>










                    </div>

                    {{--by file upload--}}
                    <div id="upload" class="col s12">
                        <h5 class="text_center">Add Invigilation</h5>
                        <span></span>
                        <form class="col s12" action="{{ route('schedule-upload') }}" enctype="multipart/form-data" method="POST" >



                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required" id="select_exam"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        @foreach($exams as $exam)
                                            <option value="{{ $exam->exam_name }}">{{ $exam->exam_name }}</option>

                                        @endforeach

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_dept" required="required"  >
                                        <option value="" disabled  selected>Select Department</option>


                                        <option value="CSE">CSE</option>
                                        <option value="EXTC">EXTC</option>
                                        <option value="CHEM">CHEM</option>
                                        <option value="INFT">INFT</option>
                                        <option value="INST">INST</option>
                                        <option value="MECH">MECH</option>
                                        <option value="PROD">PROD</option>
                                        <option value="TEXT">TEXT</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="ELEC">ELEC</option>



                                    </select>
                                    <label>Department</label>
                                </div>
                            </div>


                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload CSV File</span>
                                    <input type="file" name="csv" id="csv">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="csv_file" name="csv_file" class="file-path validate" type="text">
                                </div>

                            </div>


                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                            <button class="btn waves-effect waves-light" type="submit" name="add">Add
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
















                    </div>
                </div>

            </div>

        </div>
    </div>

    {{--schedule end--}}


    {{--Delete start--}}

    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">

                <h4 class="text_center">Delete Invigilation</h4>

                <div class="row">

                    {{--by manually--}}
                    <div id="manual" class="col s12">
                        <span></span>
                        <form class="col s12" action="{{ route('delete-bulk') }}" enctype="multipart/form-data" method="POST" >

                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        @foreach($exams_delete as $exam_delete)
                                            <option value="{{ $exam_delete->exam }}">{{ $exam_delete->exam }}</option>

                                        @endforeach

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>


                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_dept" required="required"  >
                                        <option value="" disabled  selected>Select Department</option>

                                        @foreach($dept_delete as $dept)
                                            <option value="{{ $dept->dept }}">{{ $dept->dept }}</option>

                                        @endforeach

                                    </select>
                                    <label>Department</label>
                                </div>
                            </div>





                            <button class="btn waves-effect waves-light" type="submit" name="add">Delete
                                <i class="material-icons right">delete</i>
                            </button>
                        </form>


                    </div>


                </div>

            </div>

        </div>
    </div>

    {{--delete end--}}





    {{--schedule list--}}
    <div class="row no-m-t no-m-b">
        <div class="col s12">

        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">Scheduled Invigilations</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Faculty Name</th>
                            <th>Contact</th>
                            <th>Dept</th>
                            <th>Exam</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approve</th>
                            <th>SMS 1</th>
                            <th>SMS 2</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Faculty Name</th>
                            <th>Contact</th>
                            <th>Dept</th>
                            <th>Exam</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approved</th>
                            <th>SMS 1</th>
                            <th>SMS 2</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                        $count=0;
                        ?>

                        @foreach($schedules as $schedule)
                            <?php
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td>{{ $schedule->fac_name }}</td>
                                <td>{{ $schedule->fac_phone }}</td>
                                <td>{{ $schedule->dept }}</td>
                                <td>{{ $schedule->exam }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>{{ $schedule->time_text }}</td>
                                <td>
                                    <form method="post" action="{{ route('invigilation-status') }}">
                                        <input type="text" name="schedule_id" id="schedule_id" class="display_none" value="{{ $schedule->id }}">
                                        <input type="text" name="schedule_approve" id="schedule_approve" class="display_none" value="{{ $schedule->approve }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">


                                    @if( $schedule->approve !=0)
                                        <span class="green-text ">Yes</span>

                                        <button class="btn waves-effect waves-light" type="submit" name="approve_change">Disapprove</button>

                                    @else
                                        <span class="red-text ">No</span>

                                        <button class="btn waves-effect waves-light" type="submit" name="approve_change">Approve</button>

                                    @endif

                                    </form>

                                </td>
                                <td>
                                    @if( $schedule->sent_1 !=0)
                                        <span class="green-text ">Sent</span>
                                    @else
                                        <span class="red-text ">Not Sent</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $schedule->sent_2 !=0)
                                        <span class="green-text ">Sent</span>
                                    @else
                                        <span class="red-text ">Not Sent</span>
                                    @endif
                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--user list ends--}}






    <script>
        var token='{{ Session::token() }}';

    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>

@endsection

