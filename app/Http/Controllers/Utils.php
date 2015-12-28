<?php
/**
 * Created by PhpStorm.
 * User: CreativePoint
 * Date: 26/12/2015
 * Time: 16:10
 */

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Requests;
use Illuminate\Support\Facades\Session;

use Redirect;

class Utils
{

    public static function isLogged()
    {
         
        if(!session()->has('user_id')){
            Redirect::to('login')->send();
        }
    }

    public static function logOut()
    {

        session()->forget("user_id");
        session()->forget("role");
        session()->flush();
        Redirect::to('login')->send();
    }

    public static function getUserID()
    {
        return session()->get('user_id', '4');
    }

    public static function setUser($user, $role)
    {
        session(['user_id' => $user]);
        session(['role' => $role]);
    }

}