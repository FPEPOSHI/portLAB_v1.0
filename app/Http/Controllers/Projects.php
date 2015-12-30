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
        return DB::select('select p.title as p_name, u.name as u_name, c.name as c_name, p.downloads, p.like, p.project_id from Project p inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id =p.category_id ');
    }
    public static function getAllCategory(){
        return DB::select("select * from category");
    }
   public static function insertProject($title,$des,$cat,$c_date,$path,$like,$downloads,$views,$format,$userId){



       DB::insert("insert into project(title,description,project_path,upload_date,views
                     ,downloads,user_id,category_id,format_id) values( ?, ?, ?, ?, ?, ?, ?, ?, ?)",
           array($title,$des,$path,$c_date,$views,$downloads,$userId,$cat,$format));
   }
}
