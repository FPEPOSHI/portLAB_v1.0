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
class LoginController extends Controller
{
    public function index()
    {
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
        $res = Login::checkLogin($username, $pass);
        if(empty($res))
        {
            Redirect::to('login')->send();
        }else{
            Utils::setUser($res[0]->user_id,$res[0]->role);
            Redirect::to('home')->send();
        }
    }
    public function registerUser()
    {
        $name = Input::get('register_name');
        $email = Input::get('register_email');
        $username = Input::get('register_usr');
        $pass = Input::get('register_pass');
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
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('register_photo')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
        }
        Login::insertUser($name,$username,$pass,$fileName,$email);
        Redirect::to('login')->send();
    }
}
