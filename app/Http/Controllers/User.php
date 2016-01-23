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
        return DB::select('select * from User  inner join Login l on l.user_id = User.user_id where User.user_id=?', array($id));
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

    public static function checkPassword($id, $old)
    {
        return DB::select("select password from login where user_id=? and password=?",array($id,md5($old)));
    }

    public static function newPassword($id, $new)
    {
        DB::select("Update Login set password=? where user_id=?",array(md5($new),$id));
    }

    public static function getAllUser()
    {
        return DB::select("select * from USER ");
    }

    public static function checkUsername($usr, $id)
    {
        return DB::select("select username from Login where username=? and user_id<>?",array($usr,$id));
    }

    public static function getUserFromProject($id)
    {
        return DB::select("select u.*, p.title as p_name from Project p inner join User u on u.user_id = p.user_id where p.project_id =? ", array($id));
    }

    public static function sendRequestToDownload($id1, $id2, $proj)
    {
        DB::select("insert into Request(sender_id,reciever_id,project_id,status) VALUES(?,?,?,?)", array($id1,$id2,$proj,0));
    }
}