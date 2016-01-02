<?php
/**
 * Created by PhpStorm.
 * User: CreativePoint
 * Date: 30/12/2015
 * Time: 14:01
 */

namespace app\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use app\Http\Controllers\Utils;

class Projects
{
    public static function getAllProjects()
    {
        return DB::select('select p.title as p_name, u.name as u_name, c.name as c_name, p.downloads, p.likes, l.user_id as l_user, p.project_id
                            from Project p
                            inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id =p.category_id
                            left JOIN Likes as l
                            on (l.user_id = u.user_id and l.project_id = p.project_id)  group by p.project_id');
    }
    public static function getAllCategory(){
        return DB::select("select * from category");
    }
   public static function insertProject($title,$des,$cat,$c_date,$path,$like,$downloads,$views,$format,$userId){



       DB::insert("insert into project(title,description,project_path,upload_date,views
                     ,downloads,user_id,category_id,format_id, likes) values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
           array($title,$des,$path,$c_date,$views,$downloads,$userId,$cat,$format, $like));
   }

    public static function countLikes()
    {
        return DB::select("select count(like_id) as nr from likes")[0]->nr;
    }

    public static function countDownloads()
    {
        return DB::select("select sum(downloads) as nr from Project")[0]->nr;
    }

    public static function getFirstFormat()
    {
        return DB::select('select * from format FIRST ')[0]->format_id;
    }

    public static function getLatestProjects()
    {
        return DB::select("select  p.title as p_name, p.description as p_desc, u.name as u_name, c.name as c_name, p.downloads, p.likes, p.project_id from Project p
                            inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id = p.category_id

                           ORDER BY p.upload_date desc LIMIT 5 ");
    }

    public static function countProjects()
    {
        return DB::select("select count(project_id) as nr from Project")[0]->nr;
    }

    public static function getAllProjectsByCategory($cat)
    {
        return DB::select('select p.title as p_name, u.name as u_name, c.name as c_name, p.downloads, p.likes , l.user_id as l_user, p.project_id
                            from Project p
                            inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id =p.category_id
                            LEFT JOIN (Likes as l, Likes as l1)
                            on (l.user_id = u.user_id and l1.project_id = p.project_id)
                            where p.category_id=?
                            group by p.project_id', array($cat));
    }

    public static function getCategoryID($cat)
    {
        return DB::select("select category_id from Category where name=? LIMIT 1",array(str_replace("-"," ", $cat)))[0]->category_id;
    }

    public static function getProjectsProfile($id)
    {
        return DB::select("select p.title as p_name, p.description as p_desc, u.name as u_name, c.name as c_name from Project p
                            inner join User u on u.user_id = p.user_id inner join Category c on
                            c.category_id = p.category_id where p.user_id=? order by p.downloads asc ", array($id));
    }
    public static function countDownloadsUser($id)
    {
        return DB::select("select sum(downloads) as nr from Project where user_id=?",array($id))[0]->nr;
    }

    public static function countLikesUser($id)
    {
        return DB::select("select sum(likes) as nr from Project where user_id=?",array($id))[0]->nr;
    }

    public static function existLike($id,$u_id)
    {
        return DB::select("select * from Likes where user_id=? and project_id=?",array($u_id,$id));
    }

    public static function likeProject($id,$u_id)
    {
        DB::select("insert into Likes(user_id, project_id) values(?,?)",array($u_id,$id));
        DB::select("update Project set likes=(likes+1) where project_id=?",array($id));
    }

    public static function dislikeProject($id,$u_id)
    {
        DB::select("delete from Likes where user_id=? and project_id=?",array($u_id,$id));
        DB::select("update Project set likes=(likes-1) where  project_id=?",array($id));
    }

    public static function getProjectLikes($id)
    {
        return DB::select("select likes from Project where project_id=?",array($id))[0]->likes;
    }

    public static function isPremium($id)
    {
        $date = date("Y-m-d H:i:s");
        $res = DB::select("select * from Premium where user_id=? and end_date > ?",array($id, $date));
        return empty($res) ? 0 : 1;
    }

}
