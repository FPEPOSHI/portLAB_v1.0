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

class Projects
{
    public static function getAllProjects()
    {
        return DB::select('select p.title as p_name, u.name as u_name, c.name as c_name, p.downloads, p.likes, p.project_id from Project p inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id =p.category_id ');
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
                            inner join User u on u.user_id = p.user_id inner join Category c on c.category_id = p.category_id
                           ORDER BY p.upload_date desc LIMIT 5 ");
    }

    public static function countProjects()
    {
        return DB::select("select count(project_id) as nr from Project")[0]->nr;
    }
}
