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
        Session::forget("project_id_profile_u");
        Session::forget("superuser");
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



    public static function setSuperUser()
    {
        Session::set('superuser',1);
        Session::set('role',1);

    }
    public static function getSuperUser()
    {
        if(Session::has('superuser'))
            return true;
        return false;
    }
    public static function setProjectID($p_id)
    {
        Session::set('project_id_profile_u',$p_id);

    }
    public static function getProjectID()
    {
        return Session::get('project_id_profile_u');
    }


}