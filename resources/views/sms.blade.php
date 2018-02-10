

@extends('layouts.master')

@section('title')
    Send SMS | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

    {{--send sms--}}
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1" style="padding: 2% 0 0 1%;">
                <h5 class="text_center">Send SMS</h5>
                <span style="color: red"></span>
                <span style="color: green"></span>
                <span style="color: green"></span>
                <form style="padding: 1% 0 5% 1%;" class="col s12" action="{{ route('send-sms') }}" enctype="multipart/form-data" method="POST" >

                    <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone" name="phone" type="number" class="validate">
                        <label for="phone">Phone Number</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">textsms</i>
                        <textarea id="sms_text" name="sms_text" class="materialize-textarea"></textarea>
                        <label for="textarea1">Message</label>
                    </div>


                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                    <button class="btn waves-effect waves-light" type="submit" name="send_sms">Send SMS

                    </button>
                </form>
            </div>

        </div>
    </div>
    {{--send sms end--}}

    {{--users list--}}
    <div class="row no-m-t no-m-b">
        <div class="col s12">

        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">SMS Log</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Sent To</th>
                            <th>Sent By</th>
                            <th>Msg</th>
                            <th>Time</th>
                            <th>Request ID</th>
                            <th>Success</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Sent To</th>
                            <th>Sent By</th>
                            <th>Msg</th>
                            <th>Time</th>
                            <th>Request ID</th>
                            <th>Success</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $count=0;
                        ?>

                        @foreach($sms as $sms)
                            <?php
                            $count++;
                            ?>
                            <tr>
                            <td><?php echo $count ?></td>
                            <td>{{ $sms->sent_to }}</td>
                            <td>{{ $sms->from }}</td>
                            <td>{{ $sms->sms_text }}</td>
                            <td>{{ $sms->created_at }}</td>
                            <td>{{ $sms->request_id }}</td>
                            <td style="font-weight: bold;">{{ $sms->success }}</td>

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
        url_user_edit = '{{ route('user-edit') }}';
    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>

@endsection

