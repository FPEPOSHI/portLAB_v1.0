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
        DB::select("insert into Request(sender_id,reciever_id,project_id,status) VALUES(?,?,?,?)", array($id2,$id1,$proj,0));
    }

    public static function getNotification($id)
    {
        $res = User::getNotificationSender($id);
        $res1 =  DB::select("select distinct(rr.request_id), s.name as s_name, r.user_id as r_id, r.name as r_name
                    , p.title as p_name,rr.request_id as id, rr.status, p.project_id as p_id
                    from Request rr
                     inner join User s on s.user_id = rr.sender_id
                     inner join User r on r.user_id = rr.reciever_id
                     inner join Project p on p.project_id = rr.project_id
                     where  rr.reciever_id=? and status=0",array($id));
        return array_merge($res,$res1);
    }
    public static function getNotificationSender($id)
    {
        return DB::select("select distinct(rr.request_id), s.name as s_name, r.user_id as r_id, r.name as r_name
                    , p.title as p_name,rr.request_id as id, rr.status, p.project_id as p_id
                    from Request rr
                     inner join User s on s.user_id = rr.sender_id
                     inner join User r on r.user_id = rr.reciever_id
                     inner join Project p on p.project_id = rr.project_id
                     where  rr.sender_id=? and status=1",array($id));
    }
    public static function comfirmOrRejectRequest($id, $int)
    {
        DB::select("update Request set status=? where request_id=?",array($int,$id));
    }

    public static function cRequest($i,$sen)
    {
        DB::select("update Request set status=2 where project_id=? and sender_id=?",array($i,$sen));
    }

    public static function isRequested($id, $getUserID)
    {
        return DB::select('select * from Request where project_id=? and sender_id=? and status<>0',array($id,$getUserID));
    }
}