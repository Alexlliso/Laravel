<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use stdClass;

/**
 * @property  email
 */
class RegisterController extends Controller
{

    private $email;
    private $name;

    public function getRegister()
    {
        //echo "Aqui va el registre";
        return view('register');
    }

    public function postRegister(Request $request)
    {
        //dd(Input::all());

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' =>
                'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->password = bcrypt(
            $request->get('password'));
        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('auth.login');

        //User::create(Input::all());
        //User::create($request->all());

    }

    public function sendRegisterEmail(){

        $emailData = new stdClass();
        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "Welcome user" . $this->name;
        $emailData->footer = "footer here";
        $emailData->header = "header here";

        //$data['name'] = "HOLA";
        $data['name'] = $this->name;

        \Mail::queue('emails.message', $data, function($message) use ($emailData){
            $message->from(env('CONTACT MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);
        });
    }

}
