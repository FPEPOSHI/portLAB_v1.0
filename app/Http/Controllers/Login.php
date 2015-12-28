<?php
/**
 * Created by PhpStorm.
 * User: CreativePoint
 * Date: 26/12/2015
 * Time: 13:08
 */

namespace App\Http\Controllers;

use DB;
class Login
{
    public static function checkLogin($usr, $pass)
    {
        return DB::select("select user_id, role from Login where username=? and password=?", array($usr, $pass));
    }

    public static function insertUser($name, $username, $pass, $photo, $email)
    {
        DB::insert(' insert into Login(username, password, role) VALUES (?,?,?)', array($username, $pass, 2));
        $id = DB::select('SELECT user_id from Login where username=? and password=? and role=2 ',array($username, $pass));
        DB::insert(' insert into User(name, email, photo, user_id) values(?,?,?,?)'
            , array($name, $email, $photo,$id[0]->user_id));
    }
}