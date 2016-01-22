<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Support\Facades\Input;
use Form;
use Redirect;
use Validator;
class ProfileController extends Controller
{
    public function index()
    {
        Utils::isLogged();
        $id = Utils::getUserID();
        $user = User::getUser($id);
        return $this->getView($id, $user, $user);
    }

    public function  getProjectById($id)
    {
        Utils::isLogged();
        $id_h = Utils::getUserID();
        if (empty(Projects::checkUserProject($id_h, $id))) {
            $user_h = User::getUser($id_h);
            $pro = Projects::getProjectsProfile($id_h);
            return View::make("error404")
                ->with('details_header', $user_h)
                ->with('projects', $pro);
        }
        $user_h = User::getUser($id_h);
        $th = Projects::getProjectbyId($id);
        $category = Projects::getAllCategory();
        $pro = Projects::getProjectsProfile($id_h);
        return View::make("edit")
            ->with('details_header', $user_h)
            ->with('projects', $pro)
            ->with('pro_details', $th)
            ->with('category', $category);

    }

    public function edit($id)
    {
        Utils::isLogged();
        $id_h = Utils::getUserID();
        $res = Projects::checkUserProject($id_h, $id);
        if (empty($res)) {
            $user_h = User::getUser($id_h);
            $pro = Projects::getProjectsProfile($id_h);
            return View::make("error404")
                ->with('details_header', $user_h)
                ->with('projects', $pro);
        }
        $t1 = Input::get("pro-title-e");
        $d1 = Input::get("description1");
        $c1 = Input::get("category1");
        Projects::getProjectedit($t1, $d1, $c1, $id);
        Redirect::to('profile')->send();
    }

    public function editSettings()
    {
        $id = Utils::getUserID();
        $em = Input::get("emer");
        $emm = Input::get("email");
        $per = Input::get("username");

        if (Input::file('foto')) {
            $file = array('image' => Input::file('foto'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                //  return Redirect::to('login')->withInput()->withErrors($validator);
                //  print_r("error");
            }
            // else{
            if (Input::file('foto')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('foto')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                Input::file('foto')->move($destinationPath, $fileName); // uploading file to given path

            }

            Projects::getProjectsettings($em, $emm, $fileName, $per, $id);
        } else {
            Projects::getProjectsettingsNoPhoto($em, $emm, $per, $id);

        }

        Redirect::to('profile')->send();
    }

    public function checkPassword()
    {
        $new = $_GET['f1'];
        $old = $_GET['f'];
        $id = Utils::getUserID();
        $res = User::checkPassword($id, $old);
        if (!empty($res)) {
            User::newPassword($id, $new);
            //bej update ketu
            return 1;
        }
        return 0;
    }

    public function viewUsr($usr)
    {
        Utils::isLogged();
        $id = User::getUserIDByName($usr);
        if ($id === -1) {
            Utils::isLogged();
            $id_h = Utils::getUserID();
            $user_h = User::getUser($id_h);
            $pro = Projects::getProjectsProfile($id_h);
            return View::make("error404")
                ->with('details_header', $user_h)
                ->with('projects', $pro);
        }
        $id_h = Utils::getUserID();
        if ($id == $id_h)
            return $this->index();
        $user = User::getUser($id);
        $user_h = User::getUser($id_h);
        return $this->getView($id, $user, $user_h);
    }

    public function getView($id, $user, $user_h)
    {
        $pro = Projects::getProjectsProfile($id);
        $down = Projects::countDownloadsUser($id);
        $like = Projects::countLikesUser($id);
        return View::make("profile")
            ->with('details_header', $user_h)
            ->with('details', $user)
            ->with('projects', $pro)
            ->with('usr_down', $down)
            ->with('usr_like', $like)
            ->with('n_pro', count($pro));
    }

    public function editPass()
    {
        // return 1;
        print_r(Input::get('pass1'));
    }

    public function getProjectToUpdate()
    {
        $id = $_GET['i'];


        Utils::setProjectID($id);
        $pro_details = Projects::getProjectbyId($id);
        $category = Projects::getAllCategory();
        $t = '<div class="row">
        <div class="col-md-12">';
        $t .= Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off', 'id' => 'editProjectForm', 'role' => 'form', 'route' => array('edit', $pro_details[0]->project_id)));

        $t .= '<div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="' . $pro_details[0]->title . '"
                           name="pro-title-e" placeholder="Title"/>
                </div>
            </div>
             <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control"
                           name="description1" placeholder="Description">' . $pro_details[0]->description . '</textarea>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="Category" >Category</label>
                <div class="col-sm-10">
                    <select  name="category1" class="form-control">';
        foreach ($category as $cat) {
            if ($pro_details[0]->category_id == $cat->category_id) {
                $t .= '<option selected value="' . $cat->category_id . '"> ' . $cat->name . ' </option>';
            } else {
                $t .= '<option value="' . $cat->category_id . '">' . $cat->name . ' </option>';
            }

        }
        $t .= '</select>
                </div>

            </div>
            <div class="modal-footer">

            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <input type="button" onclick="d_p_u(' . $pro_details[0]->project_id . ')" id="delete" value="Delete" class="btn btn-m btn-danger pull-left" >

                    </input>
                    <button type="submit" id="update" class="btn btn-primary pull-right" >
    Update
                    </button>
                </div>
            </div>
            </div>';
        $t .= Form::close();

        $t .= '</div>
    </div>';
        return $t;
    }


}
