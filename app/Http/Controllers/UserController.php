<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 3/11/17
 * Time: 11:40 AM
 */


namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller{


    public function postAddUser(Request $request){

        $this -> validate($request, [
            'email' => 'required|unique:users|email',
            'name' => 'required|max:50',
            'password'=> 'required|min:4',
            'select_type'=> 'required'
        ]);

        $email=$request['email'];
        $name=$request['name'];
        $password=bcrypt($request['password']);
        $password_text=$request['password'];
        $type=$request['select_type'];
        $status=1;


        $user = new User();
        $user->email=$email;
        $user->name=$name;
        $user->password=$password;
        $user->password_text=$password_text;
        $user->type=$type;
        $user->status=$status;

        $user->save();

        return redirect()->route('users');


    }


    public function postSignIn(Request $request){

        $this -> validate($request, [
            'email' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt(['email'=> $request['email'], 'password'=> $request['password'], 'status'=>1])){
            return redirect()->route('schedule');

        }
        return redirect()->back()->with(['result'=>"Invalid Email or Password!"]);

//        return redirect()->route('temp');
    }

    public function getUsers(){
        $users=User::orderBy('created_at', 'asc')->get();
        return view('users',  ['user'=>Auth::user(), 'users'=>$users]);
    }

    public function postUserEdit(Request $request){

//        $this->validate($request, [
//            'email' => 'required|email',
//            'name' => 'required|max:15',
//            'password'=> 'required|min:4',
//            'select_type'=> 'required'
//        ]);

        $user_id=$request['name'];
        $user=User::where('id', $user_id)->first();
//        if (Auth::user() != $user->user){
//            return redirect()->back();
//        }

        $user->email=$request['email'];
        $user->name=$request['name'];
        $user->password=bcrypt($request['password']);
        $user->password_text=$request['password'];
//        $user->type=$request['select_type'];
//        $user->status=$request['select_status'];

        $user->update();
        return response()->json(['msg'=>'lollol'], 200);
    }


    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');

    }

    public function postUserStatus(Request $request){
        //        validation
        $this -> validate($request, [
            'user_id' => 'required',
            'user_status' => 'required'

        ]);

        $u_id=$request['user_id'];
        $u_status=$request['user_status'];

        $user=User::where('id', $u_id)->first();
        if ($u_status!=0){
            $user->status=0;
        }
        else{
            $user->status=1;
        }
        $user->update();




        return redirect()->back()->with(['result'=>"Status changed successfully!"]);


    }






}






