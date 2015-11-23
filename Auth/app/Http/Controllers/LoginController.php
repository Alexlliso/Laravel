<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;

/**
 * Class loginController
 * @package App\Http\Controllers
 */
class loginController extends Controller
{
    /**
     * Process a login HTTP POST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) {
        //TODO
        //dd($request->all());
        //\Debugbar::info("postlogin");
        //echo "page";

        if ($this->login($request->email,$request->password)){
            //REDIRECT TO HOME
            //Session::set('authenticated',true);
            return redirect()->route('auth.home');
        }else{
            //REDIRECT BACK
            return redirect()->route('auth.login');
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin() {
        return view('login');
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    private function login($email, $password)
    {
        //TODO: Mirar be a la base de dades
        return true;
    }
}
