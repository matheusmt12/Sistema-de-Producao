<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function  login(Request $request)
    {
        $error = $request->get('error');
        return view('site.login', compact('error'));
    }

    public function loginAcesso(Request $request)
    {
        $rules = ['email' => 'required', 'password' => 'required'];
        $feedback = ['required' => 'o :attribute é requirido'];

        $request->validate($rules, $feedback);

        $user = new User();

        $exist = $user->where('email', $request->get('email'))
            ->where('password', $request->get('password'))
            ->first();
        if ($exist) {
            session_start();
            $_SESSION['name'] = $exist->name;
            $_SESSION['email'] = $exist->email;
            return redirect()->route('inicio');
        } else
            return redirect()->route('login', ['error' => '1']);
    }

    public function sair(){
        session_start();
        session_destroy();
        return redirect()->route('inicio');
    }
}
