<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Support\Facades\Input;
use Form;
use Redirect;
class ProfileController extends Controller
{
    public function index()
    {
        Utils::isLogged();
        $id = Utils::getUserID();
        $user = User::getUser($id);
        return $this->getView($id,$user,$user);
    }

    public function  getProjectById($id)
    {
        Utils::isLogged();
        $id_h = Utils::getUserID();
        if(empty(Projects::checkUserProject($id_h, $id)))
        {
            $user_h = User::getUser($id_h);
            $pro = Projects::getProjectsProfile($id_h);
            return View::make("error404")
                ->with('details_header',$user_h)
                ->with('projects',$pro)
                ;
        }
        $user_h = User::getUser($id_h);
        $th = Projects::getProjectbyId($id);
        $category = Projects::getAllCategory();
        $pro = Projects::getProjectsProfile($id_h);
        return View::make("edit")
            ->with('details_header',$user_h)
            ->with('projects',$pro)
            ->with('pro_details',$th)
            ->with('category',$category)
            ;

    }
    public function edit($id){
        $t1 = Input::get("pro-title-e");
        $d1 = Input::get("description1");
        $c1 = Input::get("category1");
        Projects::getProjectedit($t1,$d1,$c1,$id);
     Redirect::to('profile')->send();
    }
    public function viewUsr($usr)
    {
        Utils::isLogged();
        $id = User::getUserIDByName($usr);
        if($id === -1)
        {
                Utils::isLogged();
                $id_h = Utils::getUserID();
                $user_h = User::getUser($id_h);
                $pro = Projects::getProjectsProfile($id_h);
                return View::make("error404")
                    ->with('details_header',$user_h)
                    ->with('projects',$pro)
                    ;
        }
        $id_h = Utils::getUserID();
        if($id == $id_h)
            return $this->index();
        $user = User::getUser($id);
        $user_h = User::getUser($id_h);
        return $this->getView($id,$user,$user_h);
    }

    public function getView($id,$user, $user_h)
    {
        $pro = Projects::getProjectsProfile($id);
        $down = Projects::countDownloadsUser($id);
        $like = Projects::countLikesUser($id);
        return View::make("profile")
            ->with('details_header',$user_h)
            ->with('details',$user)
            ->with('projects',$pro)
            ->with('usr_down',$down)
            ->with('usr_like',$like)
            ;
    }

    public function editPass()
    {
        return 1;
    }
}
