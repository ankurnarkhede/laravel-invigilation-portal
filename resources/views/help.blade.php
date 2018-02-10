
{{--/**--}}
{{--* Created by IntelliJ IDEA.--}}
{{--* User: smartankur4u--}}
{{--* Date: 5/11/17--}}
{{--* Time: 10:06 AM--}}
{{--*/--}}



@extends('layouts.master')

@section('title')
    Help | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

    {{--schedule start--}}

    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">

                <h4 class="text_center">Help</h4>

                <ul class="collection with-header">
                    <li class="collection-header"><h5>Info</h5></li>
                    <li class="collection-item"><div>This Invigilation Scheduling Portal can be used for:</div>
                        <ul class="collection with-header">
                            <li class="collection-item"><div>Scheduling invigilation of faculty on required time and day.</div></li>
                            <li class="collection-item"><div>Sending notifications automatically and manually to the faculty about the invigilation.</div></li>
                        </ul>
                    </li>

                    <li class="collection-header"><h5>Rules</h5></li>
                    <li class="collection-item">
                        <ul class="collection with-header">
                            <li class="collection-item"><div>Go to <a href="{{ route('schedule') }}">SCHEDULE INVIGILATION</a> <a href="{{ route('schedule') }}" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                            <li class="collection-item"><div>Invigilation schedule can be added manually or by uploading a CSV(comma separated values) file.</div></li>
                            <li class="collection-item"><div>To add manually, fill the form with required details and submit.</div></li>
                            <li class="collection-item"><div>To upload a CSV file, upload it in the tab next to it.</div></li>
                            <li class="collection-item"><div>The format of the CSV file should be as specified in the below file.</div></li>
                            <li class="collection-item"><div><a href="{{ route('sample-csv') }}" target="_blank">DOWNLOAD SAMPLE CSV FILE</a><a href="{{ route('sample-csv') }}" class="secondary-content"><i class="material-icons">file_download</i></a></div></li>
                            <li class="collection-item"><div><a href="https://docs.google.com/spreadsheets/d/1rGdFDPtvTX_qTK1Pgj-G29Y5ndUcbmPpWFALit5E7p4/edit?usp=sharing" target="_blank">VIEW SAMPLE FILE IN GOOGLE SHEETS</a><a target="_blank" href="https://docs.google.com/spreadsheets/d/1rGdFDPtvTX_qTK1Pgj-G29Y5ndUcbmPpWFALit5E7p4/edit?usp=sharing" class="secondary-content"><i class="material-icons">send</i></a></div></li>


                        </ul>
                    </li>

                    <li class="collection-header red-text " ><h5>NOTE</h5></li>
                    <li class="collection-item">
                        <ul class="collection with-header">
                            <li class="collection-item"><div>The time and date of invigilation should be in the following format: </div></li>
                            <li class="collection-item"><div>Time: <span class="red-text">9:05AM - 12:00AM</span></div></li>
                            <li class="collection-item"><div>i.e.: hr:minAM/PM<span class="red-text">&lt;space&gt;</span>-<span class="red-text">&lt;space&gt;</span>hr:minAM/PM</div></li>
                            <li class="collection-item"><div>Date: 2017-11-25</div></li>
                            <li class="collection-item"><div>i.e.: <span class="red-text">YYYY-MM-DD</span></div></li>

                        </ul>
                    </li>


                </ul>


            </div>

        </div>
    </div>

    {{--schedule end--}}


    {{--schedule list--}}
    {{--<div class="row no-m-t no-m-b">--}}
        {{--<div class="col s12">--}}

        {{--</div>--}}
        {{--<div class="col s12 m12 l12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-content">--}}
                    {{--<h5 class="text_center">Scheduled Invigilations</h5>--}}
                    {{--<br>--}}
                    {{--<table id="example" class="display responsive-table datatable-example">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>id</th>--}}
                            {{--<th>Faculty Name</th>--}}
                            {{--<th>Faculty Contact</th>--}}


                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>id</th>--}}
                            {{--<th>Faculty Name</th>--}}
                            {{--<th>Faculty Contact</th>--}}

                        {{--</tr>--}}
                        {{--</tfoot>--}}
                        {{--<tbody>--}}


                        {{--@foreach($faculty as $fac)--}}

                            {{--<tr>--}}
                                {{--<td>{{ $fac->id }}</td>--}}
                                {{--<td>{{ $fac->fname }}</td>--}}
                                {{--<td>{{ $fac->mobile_number }}</td>--}}



                            {{--</tr>--}}

                        {{--@endforeach--}}


                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

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

