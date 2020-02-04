<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {

        $msg = "Some message";

        if(Auth::check()) {
            $user = Auth::user();
            $msg = "You are logged in as {$user->name}";
            $info = "You created your account at {$user->created_at}";
        }
        return view('welcome', ['msg' => $msg,
                                'info' => $info
                                ]);
    }
}
