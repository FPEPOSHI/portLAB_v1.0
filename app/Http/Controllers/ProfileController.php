<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class ProfileController extends Controller
{
    public function index()
    {
        Utils::isLogged();
        $id = Utils::getUserID();
        $user = User::getUser($id);
        return $this->getView($id,$user,$user);
    }

    public function viewUsr($usr)
    {
        Utils::isLogged();
        $id = User::getUserIDByName($usr);
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
}
