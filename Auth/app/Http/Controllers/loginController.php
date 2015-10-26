<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function postLogin(Request $request) {
        //TODO
        //dd($request->all());
        //\Debugbar::info("Entra a postlogin");
        //echo "pagina";

        if ($this->login($request->email,$request->password)){
            //REDIRECT TO HOME
            return redirect()->route('auth.home');
        }else{
            //REDIRECT BACK
            return redirect()->route('auth.login');
        }
    }

    public function getLogin() {
        return view('login');
    }

    private function login($email, $password)
    {
        //TODO: Mirar be a la base de dades
        return true;
    }
}
