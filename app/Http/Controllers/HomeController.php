<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use URL;
class HomeController extends Controller
{
    public function index()
    {
        Utils::isLogged();
        $projects = Projects::getAllProjects();
        return $this->returnView($projects,1,"");
    }

    public  function returnView($projects, $map, $cat_name)
    {
        $id = Utils::getUserID();
        $user = User::getUser($id);
        $user_number = User::getUserNumber();
        $like_number = Projects::countLikes();
        $download_number = Projects::countDownloads();
        $projects_number = Projects::countProjects();
        $cat = Projects::getAllCategory();
        $latest_projects = Projects::getLatestProjects();
        $map = $this->getMapp($map, $cat_name);
        $premium = Projects::isPremium($id);
        return View::make('home')
            ->with('details_header',$user)
            ->with('total_users',$user_number)
            ->with('projects', $projects)
            ->with("category", $cat)
            ->with("latest_pro", $latest_projects)
            ->with("total_likes", $like_number)
            ->with("total_downloads", $download_number)
            ->with("total_projects", $projects_number)
            ->with("map", $map)
            ->with("premium", $premium)
            ;

    }

    public function byCategory($cat)
    {
        Utils::isLogged();
        $cat_id = Projects::getCategoryID($cat);
        $projects = Projects::getAllProjectsByCategory($cat_id);
        return $this->returnView($projects,2, $cat);
    }


    public function newproject(){
        $t = Input::get("title");
        $d = Input::get("description");
        $c = Input::get("category");
        $format = Projects::getFirstFormat();
        $path = "hhjjj";
        $like = 0;
        $download = 0;
        $views = 0;
        $c_date = date('Y-m-d H:i:s');
        $userId = Utils::getUserID();
         Projects::insertProject($t,$d,$c,$c_date,$path,$like,$download,$views,$format,$userId);
        Redirect::to('home')->send();
    }
    public function logout()
    {
        Utils::logOut();
    }

    private function getMapp($map, $cat)
    {
        $str = "";
        switch($map){
            case 1:
                $str .= '
            <li><a href="'.URL::route("home").'"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Projects</li>';
                break;
            case 2:
                $str .= '
            <li><a href="'.URL::route("home").'"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">'.str_replace("-"," ",$cat).'</li>';
                break;
        }
        return $str;
    }

    public function like($id)
    {
        $u_id = Utils::getUserID();
        $exist = Projects::existLike($id,$u_id);
        if(!empty($exist)) {
            Projects::dislikeProject($id,$u_id);
        }else {
            Projects::likeProject($id,$u_id);
        }
        return array("likes"=>1, "text"=>"liked");
//        return Projects::getProjectLikes($id);
    }
}
