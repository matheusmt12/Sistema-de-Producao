<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function  login(){
        return view('site.login');
    }

    public function loginAcesso(Request $request){
        $rules = ['email' => 'required', 'password' => 'required'];
        $feedback = ['required' => 'o :attribute é requirido'];

        $request->validate($rules , $feedback);

        $user = new User();

        $exist = $user->where('email', $request->get('email'))->where('password', $request->get('password'))->first();
        dd($exist);

    }
}
