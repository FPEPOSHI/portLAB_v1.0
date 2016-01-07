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

    public static function getUserNumber()
    {
        $res = DB::select('select count(user_id) as nr from User');

        return $res[0]->nr;
    }

    public static function getUserIDByName($usr)
    {
        $res = DB::select("select user_id from User where name=? LIMIT 1",array(str_replace("-"," ",$usr)));
        if(empty($res))
        {
            return -1;
        }
        return $res[0]->user_id;
    }

}