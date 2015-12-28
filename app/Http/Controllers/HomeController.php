<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use View;

class HomeController extends Controller
{
    public function index()
    {
//        Utils::isLogged();
        $id = Utils::getUserID();
        $user = User::getUser($id);
        $user_number = User::getUserNamber();
        return View::make('home')
            ->with('details',$user)
            ->with('total_users',$user_number)
            ;
    }
    public function logout()
    {
        Utils::logOut();
    }
}
