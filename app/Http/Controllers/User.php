<?php
/**
 * Created by PhpStorm.
 * User: CreativePoint
 * Date: 26/12/2015
 * Time: 17:11
 */

namespace app\Http\Controllers;
use DB;

class User
{
    public static function getUser($id)
    {
        return DB::select('select * from User where user_id=?', array($id));
    }

    public static function getUserNamber()
    {
        return DB::select('select count(user_id) as nr from User')[0]->nr;
    }

}