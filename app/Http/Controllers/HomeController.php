<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    public function index()
    {
        Utils::isLogged();
        $id = Utils::getUserID();
        $user = User::getUser($id);
        $user_number = User::getUserNumber();
        $cat = Projects::getAllCategory();
        $projects = Projects::getAllProjects();
        return View::make('home')
            ->with('details',$user)
            ->with('total_users',$user_number)
            ->with('projects', $projects)
            ->with("category", $cat)
            ;
    }

    public function newproject(){
        $t = Input::get("title");
        $d = Input::get("description");
        $c = Input::get("category");
        $format = 1;
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
}
