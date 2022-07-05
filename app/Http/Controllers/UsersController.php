<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    public function top(){

        $users = Users::all();

        return view('top')->with([
            'users' => $users
        ]);
    }

    public function register(){
        return view('login/register');
    }

    public function signin(){
        return view('/home');
    }


    public function usersRegister(Request $request){

        $users = new Users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->grade = "user";
        $users->gender = "man";
        $users->age = 20;
        $users->track_record= 10;
        $users->contact= "自宅";
        $users->business = $request->business;
        $users ->save();

        return redirect('login/signin');

    }
}