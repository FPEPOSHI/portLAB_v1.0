<?php
/**
 * Created by PhpStorm.
 * User: CreativePoint
 * Date: 30/12/2015
 * Time: 14:01
 */

namespace app\Http\Controllers;
use DB;

class Projects
{
    public static function getAllProjects()
    {
        return DB::select('select p.name as p_name, u.name as u_name, c.name as c_name, p.downloads, p.like, p.project_id from Project p inner join User u on u.user_id = p.user_id
                            inner join Category c on c.category_id =p.category_id ');
    }

}