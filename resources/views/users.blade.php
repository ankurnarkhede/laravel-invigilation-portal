

@extends('layouts.master')

@section('title')
    Add User | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

    {{--ADD USER--}}
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            <div class="row card darken-1 card_form_padding">
                <h5 class="text_center">Add User</h5>
                <span></span>
                <form class="col s12" action="{{ route('add_user') }}" enctype="multipart/form-data" method="POST" >

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name" id="name" type="text" class="validate" required="required">
                            <label for="name">Name</label>
                        </div>
                    </div>

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input name="email" id="email" type="text" class="validate" required="required">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">security</i>
                            <input name="password" id="password" type="text" class="validate" required="required">
                            <label for="password">Password</label>
                        </div>
                    </div>


                    <div class="bottom0 row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">list</i>
                            <select name="select_type" required="required"  >
                                <option value=""  selected>Select Type</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>

                            </select>
                            <label>Admin/User</label>
                        </div>
                    </div>


                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                    <button class="btn waves-effect waves-light" type="submit" name="add_user">Add User
                        <i class="material-icons">person_add</i>
                    </button>
                </form>
            </div>

        </div>
    </div>

    {{--add user ends--}}

    {{--users list--}}
    <div class="row no-m-t no-m-b">

        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h5 class="text_center">User Log</h5>
                    <br>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            {{--<th>Edit</th>--}}


                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            {{--<th>Edit</th>--}}

                        </tr>
                        </tfoot>


                        <tbody>

                        <?php
                        $count=0;
                        ?>
                        @foreach($users as $u)
                            <?php
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->type }}</td>
                                <td style="font-weight: bold;">
                                    <form method="post" action="{{ route('user-status') }}">
                                        <input type="text" name="user_id" id="user_id" class="display_none" value="{{ $u->id }}">
                                        <input type="text" name="user_status" id="user_status" class="display_none" value="{{ $u->status }}">

                                        @if(  $u->status !=0)
                                            <span class="green-text ">Approved</span>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                                            <button class="btn waves-effect waves-light" type="submit" name="approve_change">Disapprove</button>

                                        @else
                                            <span class="red-text ">Disapproved</span>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                                            <button class="btn waves-effect waves-light" type="submit" name="approve_change">Approve</button>

                                        @endif

                                    </form>

                                </td>
                                {{--<td>--}}
                                    {{--<button href="#user_edit_{{ $user->id }}" id="user_edit" class="modal-trigger btn waves-effect waves-light col s12" name="user_edit">Edit</button>--}}
                                {{--</td>--}}

                                {{--modal declare--}}
                                {{--<div id="user_edit_{{ $user->id }}" class="modal ">--}}
                                    {{--<div class="modal-content">--}}
                                        {{--<h4>Edit Post</h4>--}}
                                        {{--<form id="user_edit_form_{{ $user->id }}" class="col s12" action="{{ route('add_user') }}" enctype="multipart/form-data" method="POST" >--}}
                                            {{--<input type="hidden"  value="{{ $user->id }}" name="user_id" id="user_id" type="text" class=" validate " required="required">--}}

                                            {{--<div class="bottom0 row">--}}
                                                {{--<div class="input-field col s12">--}}
                                                    {{--<i class="material-icons prefix">account_circle</i>--}}
                                                    {{--<input value="{{ $user->name }}" name="name" id="name" type="text" class="">--}}
                                                    {{--<label for="name">Name</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="bottom0 row">--}}
                                                {{--<div class="input-field col s12">--}}
                                                    {{--<i class="material-icons prefix">email</i>--}}
                                                    {{--<input value="{{ $user->email }}" name="email" id="email" type="text" class="">--}}
                                                    {{--<label for="email">Email</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="bottom0 row">--}}
                                                {{--<div class="input-field col s12">--}}
                                                    {{--<i class="material-icons prefix">security</i>--}}
                                                    {{--<input value="{{ $user->password_text }}" name="password" id="password" type="password" class="" >--}}
                                                    {{--<label for="password">Password</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            {{--<div class="bottom0 row">--}}
                                                {{--<div class="input-field col s12">--}}
                                                    {{--<i class="material-icons prefix">list</i>--}}
                                                    {{--<select name="select_type" id="select_type"   >--}}
                                                        {{--<option value="{{ $user->type }}"  selected>{{ $user->type }}</option>--}}
                                                        {{--<option value="admin">Admin</option>--}}
                                                        {{--<option value="user">User</option>--}}

                                                    {{--</select>--}}
                                                    {{--<label>Admin/User</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="bottom0 row">--}}
                                                {{--<div class="input-field col s12">--}}
                                                    {{--<i class="material-icons prefix">list</i>--}}
                                                    {{--<select name="select_status" id="select_status"   >--}}
                                                        {{--<option value="{{ $user->status }}"  selected>{{ $user->status }}</option>--}}
                                                        {{--<option value="1">Active</option>--}}
                                                        {{--<option value="0">Disable</option>--}}

                                                    {{--</select>--}}
                                                    {{--<label>Admin/User</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}

                                            {{--<input onclick="user_save()"  name="user_save" id="user_save" type="button" class="float_r modal-action waves-effect btn waves-effect waves-light"   value="Save">--}}
                                        {{--</form>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--modal ends--}}

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

    <script scr="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>



    {{--//code.jquery.com/jquery-1.12.4.js--}}
    {{--https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js--}}
    {{--https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js--}}
    {{--//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js--}}
    {{--//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js--}}
    {{--//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js--}}
    {{--//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js--}}
    {{--//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js--}}
    {{--//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js--}}




@endsection

