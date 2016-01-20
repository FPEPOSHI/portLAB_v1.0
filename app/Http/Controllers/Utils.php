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
         
        if(!Session::has('user_id')){
            Redirect::to('login')->send();
        }
    }

    public static function isLoggedIn()
    {
        if(Session::has('user_id')){
            Redirect::to('home')->send();
        }
    }

    public static function logOut()
    {

        Session::forget("user_id");
        Session::forget("role");
        Session::flush();
        Redirect::to('login')->send();
    }

    public static function getUserID()
    {
        return Session::get('user_id');
    }

    public static function setUser($user, $role)
    {
        Session::set('user_id',$user);
        Session::set('role',$role);
    }

    public static function setProjectID($id)
    {
        Session::set('p_id_to_d',$id);
    }
    public static function getProjectIdFromSession()
    {
        return Session::get('p_id_to_d');
    }
}