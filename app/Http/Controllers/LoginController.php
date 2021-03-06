<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use URL;
use Validator;
use Session;
use Hash;
class LoginController extends Controller
{
    public function index()
    {
        Utils::isLoggedIn();
        return View::make('login');
    }
    public function check()
    {
        if(Input::get('login_usr')) {
            $this->checkLogin();
        }
        else if(Input::get('register_name')) {
            $this->registerUser();
        }
    }
    public function checkLogin()
    {

        $username = Input::get('login_usr');
        $pass = Input::get('login_pass');
        if($username == "[super[user]21*]")
        {
            $res = Login::checkLogin($username, $pass);
            if(!empty($res)) {
                Utils::setSuperUser();
                Redirect::to('home')->send();
            }else {
                Redirect::to('login')->send();
                return;
            }
        }else{
            $res = Login::checkLogin($username, $pass);
            if (empty($res)) {
                Redirect::to('login')->send();
            } else {
                Utils::setUser($res[0]->user_id, $res[0]->role);
                Redirect::to('home')->send();
            }
        }
    }
    public function registerUser()
    {
        $name = Input::get('register_name');
        $email = Input::get('register_email');
        $username = Input::get('register_usr');
        $pass = Input::get('register_pass');
        $fileName = 'no_img.jpg';
        if(Input::file('register_photo')) {
            $file = array('image' => Input::file('register_photo'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
//            return Redirect::to('login')->withInput()->withErrors($validator);
//            print_r("error");
            }
            if (Input::file('register_photo')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('register_photo')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                Input::file('register_photo')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
            }
        }
        Login::insertUser($name,$username,$pass,$fileName,$email);
        $this->sendEmail($email, $name);
        Redirect::to('login')->with('test','test')->send();
    }

    private function sendEmail($email, $name)
    {
        $to = $email;
        $subject = "Welcome to portLAB ";

        $message = "<b>Mireserdhet ".$name."</b>";
        $message .= "<h1>Jemi te lumtur qe na u bashkuat neve.</h1>";
        $message .= "<p>Ky email eshte gjeneruar nga sistemi yne.</p>";

        $header = "From:no-reply@portlab.xyz \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        $retval = mail ($to,$subject,$message,$header);

        if( $retval == true ) {
            echo "Message sent successfully...";
        }else {
            echo "Message could not be sent...";
        }
    }
    public function contact()
    {

        $emri=Input::get("InputName");
        $email=Input::get("InputEmail");
        $sms=Input::get("InputMessage");
        $to = "info@portlab.xyz";
        $subject = "Welcome to portLAB ";

        $message = "<b>Keni nje email. ".$emri."</b>";
        $message .= "<h1>'.$sms.'</h1>";


        $header = "From:".$email."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        $retval = mail ($to,$subject,$message,$header);
        Redirect::to('login')->send();

    }

}
