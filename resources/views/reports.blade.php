<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 31/3/18
 * Time: 4:04 PM
 */



?>


{{--/**--}}
{{--* Created by IntelliJ IDEA.--}}
{{--* User: smartankur4u--}}
{{--* Date: 5/11/17--}}
{{--* Time: 10:06 AM--}}
{{--*/--}}



@extends('layouts.master')

@section('title')
    Reports | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

    <script>
        $(document).ready(function(){
            $("#excel").click(function(){
                $("#report-form").attr("action", "get-report/");
                $("#report-form").submit();

            });
        });

        $(document).ready(function(){
            $("#print").click(function(){
                $("#report-form").attr("action", "http://localhost/onlinylh/invigilation_lara_5.4/public/print-report/");
                $("#report-form").submit();

            });
        });
    </script>



    {{--Report form start--}}

    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div style="margin-bottom: 25%" class="row card darken-1 card_form_padding">

                <h4 class="text_center">Reports</h4>

                <div class="row">

                    <div id="manual" class="col s12">
                        <span></span>
                        <form id="report-form" class="col s12" action="{{ route('get-report') }}" enctype="multipart/form-data" method="POST" >

                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_exam" required="required"  >
                                        <option value="" disabled  selected>Select Exam</option>

                                        @foreach($exams as $exam)
                                            <option value="{{ $exam->exam }}">{{ $exam->exam }}</option>

                                        @endforeach

                                    </select>
                                    <label>Exam Name</label>
                                </div>
                            </div>


                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_date" required="required"  >
                                        <option value="" disabled  selected>Select Date</option>

                                        @foreach($dates as $date)
                                            <option value="{{ $date->date }}">{{ $date->date }}</option>

                                        @endforeach

                                    </select>
                                    <label>Date</label>
                                </div>
                            </div>

                            <div class="bottom0 row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <select name="select_time" required="required"  >
                                        <option value="" disabled  selected>Select Time</option>

                                        @foreach($times as $time)
                                            <option value="{{ $time->time_text }}">{{ $time->time_text }}</option>

                                        @endforeach

                                    </select>
                                    <label>Time</label>
                                </div>
                            </div>





                            <button class="btn waves-effect waves-light" value="excel"   id="excel" name="submitbutton">Get Excel File
                                <i class="material-icons right">assignment</i>
                            </button>
                            <button class="btn waves-effect waves-light" value="print"  id="print" name="submitbutton"> Print
                                <i class="material-icons right">print</i>
                            </button>
                        </form>


                    </div>


                </div>

            </div>

        </div>
    </div>

    {{--report form end--}}





    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>

@endsection


