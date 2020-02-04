<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {

        $msg = "Log in and create some projects";
        // $info = "You are successfully logged out";

        if(Auth::check()) {
            $user = Auth::user();
            // $info = "You created your account at {$user->created_at}";
            // $msg = "You are logged in as {$user->name}";
            return view('userWelcome', ['user' => $user]);
        }
        return view('welcome', ['msg' => $msg,
                                // 'info' => $info
                                ]);
    }
}
