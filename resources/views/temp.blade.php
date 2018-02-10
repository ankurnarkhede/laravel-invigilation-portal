

@extends('layouts.master')

@section('title')
    Add User | SGGSIE&T Invigilation
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>

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
        <div class="col s12">

        </div>
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
                            <th>Password Reset</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Password Reset</th>
                            <th>Status</th>

                        </tr>
                        </tfoot>


                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td></td>
                                <td style="font-weight: bold;">{{ $user->status }} </td>


                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--user list ends--}}


    <div class="row no-m-t no-m-b">
        <div class="col s12">

        </div>
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
                            <th>Time</th>
                            <th>Password Used</th>
                            <th>Login Success</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Time</th>
                            <th>Password Used</th>
                            <th>Login Success</th>

                        </tr>
                        </tfoot>
                        <tbody>




                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bold;">  </td>


                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script>

    </script>

    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/pages/table-data.js"></script>

@endsection

