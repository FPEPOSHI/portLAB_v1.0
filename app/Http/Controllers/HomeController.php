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
use DB;
class HomeController extends Controller
{
    public function index()
    {
        if (Utils::getSuperUser())
        {
            $users = User::getAllUser();
            return View::make('admin')
                ->with("users",$users);

        }else {
            Utils::isLogged();
            $projects = Projects::getAllProjects();
            return $this->returnView($projects, 1, "");
        }
    }

    public function getAdminView()
    {
        return View::make('admin')
            ;
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
        $notification = User::getNotification($id);
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
            ->with("notification", $notification)
            ->with("user_id", $id)
            ->with("success", Input::get('success'))
            ;

    }

    public function viewmore()
    {
        $lastid = $_GET['i'];
        $viewmore = Projects::viewMore($lastid,Utils::getUserID());
        $t = '';
        foreach ($viewmore as $pro) {
            $t .= '
                    <input type="hidden" value="'.$pro->project_id.'">

                    <div class="col-lg-4 col-xs-6" >
                    <!-- small box -->
                    <div class="small-box custom-bg-projects" data-id=" $pro->project_id ">
                        <div class="inner">
                            <h4>' . $pro->p_name . '</h4>
                            <p data-id="'.str_replace(" ","-",$pro->c_name).'" id="v_c_project">' . $pro->c_name . '</p>
                            <p data-id="'. str_replace(" ","-",$pro->u_name) .'" id="u_p_project">' . $pro->u_name . '</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="small-box-footer">
                            <div class="row">
                            <div class="col-sm-6">
                                <p>' . $pro->downloads . '</p>';
            $t .= ' <a href="javascript: downPro('. $pro->project_id.')" style="text-decoration:none;color:white"><i id="d-ppp" data-id="' . $pro->project_id . ' ", class="fa fa-download"> Download</i></a>
                            </div>';
            $t .= '<div class="col-sm-6">
                                <p id="l-p-i'.$pro->project_id.'">'. $pro->likes .'</p>';
            if ($pro->l_user) {
                $t .= ' <div id="like-p" onclick="likePro('. $pro->project_id .')"  data-id="' . $pro->project_id . '"><i id="like-p-' . $pro->project_id . '"  class="fa fa-thumbs-o-up">Liked</i></div>';
            }else {
                $t .= ' <div id="like-p" onclick="likePro('. $pro->project_id .')" data-id="' . $pro->project_id . '"><i id="like-p-' . $pro->project_id . '"  class="fa fa-thumbs-o-up">Like</i></div>';
            }

            $t .= '</div>
                            </div>
                        </div>
                    </div>
                </div>';


        }
        $t .='';


        return $t;
    }
    public function byCategory($cat)
    {
        Utils::isLogged();
        $cat_id = Projects::getCategoryID($cat);
        $projects = Projects::getAllProjectsByCategory($cat_id,Utils::getUserID());
        return $this->returnView($projects,2, $cat);
    }

    public function paySuccess()
    {
        try {
            if (!$_GET["i"]) {
                Redirect::to('home')->send();
            } else {
                $c_date = date('Y-m-d H:i:s');
                $e_date = date('Y-m-d H:i:s', strtotime("2047-01-20 09:51:40"));
                DB::select("insert into Premium(start_date, end_date, user_id) values(?,?,?)"
                    , array($c_date, $e_date, Utils::getUserID()));
                Redirect::to('home')->with("success")->send();
            }
        }catch (\Exception $e)
        {
            Redirect::to('home')->send();
        }


    }

    public function sendRequest()
    {
        if(isset($_GET['p']))
        {
            $pr = $_GET['p'];
            $id1 = Projects::getUserIdForProject($pr);
            User::sendRequestToDownload($id1,Utils::getUserID(),$pr);
            return 1;
        }
    }

    public function payError()
    {
        Redirect::route('home')->with("success")->send();
    }


    public function newproject(){
        $t = Input::get("title");
        $d = Input::get("description");
        $c = Input::get("category");
//        $file = Input::get("projectfile");
        $path = $this->uploadFileToServer();
        $format = Projects::getFirstFormat($path["ext"]);
        $like = 0;
        $download = 0;
        $views = 0;
        $c_date = date('Y-m-d H:i:s');
        $userId = Utils::getUserID();
         Projects::insertProject($t,$d,$c,$c_date,$path["filename"],$like,$download,$views,$format,$userId);
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
        return Projects::getProjectLikes($id);
//        return Projects::getProjectLikes($id);
    }

    private function uploadFileToServer()
    {
        $folder = "detyra/";
//        $temp = explode(".", Input::file("projectfile"));
//        $newfilename = round(microtime(true)) . '.' . end($temp);
//        $db_path = "$folder" . $newfilename;
//        $listtype = array(
//                '.doc' => 'application/msword',
//                '.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
//                '.rtf' => 'application/rtf',
//                '.pdf'=>'application/pdf');
//            if (is_uploaded_file(Input::file("projectfile"))) {
//                if ($key = array_search(Input::file("projectfile"), $listtype)) {
//                    if (move_uploaded_file(Input::file("projectfile"), "$folder" . $newfilename)) {
//                        return $newfilename;
//                    }
//                } else {
////                    echo "File Type Should Be .Docx or .Pdf or .Rtf Or .Doc";
//                    return "bosh";
//
//                }
//            }
        if (!empty($_FILES["projectfile"])) {
            $myFile = $_FILES["projectfile"];

            if ($myFile["error"] !== UPLOAD_ERR_OK) {
                return "error";
            }

            $listtype = array(
                '.doc' => 'application/msword',
                '.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                '.rtf' => 'application/rtf',
                '.pdf'=>'application/pdf');
            if ($key = array_search($_FILES["projectfile"], $listtype)) {
                return "lesh";
            }

            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

            // don't overwrite an existing file
            $i = 0;
            $parts = pathinfo($name);
            while (file_exists($folder . $name)) {
                $i++;
                $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
            }
            // preserve file from temporary directory
            $success = move_uploaded_file($myFile["tmp_name"],
                $folder . $name);
            if (!$success) {
                return "error";
            }
            // set proper permissions on the new file
            chmod($folder . $name, 0644);
            return array("filename"=>$name, "ext"=>$parts["extension"]);
        }
    }

    public function confirmRequest()
    {
        if (isset($_GET['i'])) {
            $id = $_GET['i'];
            $s = $_GET['j'];
            if($s == 0)
            {
                User::comfirmOrRejectRequest($id,2);
            }else{
                User::comfirmOrRejectRequest($id,1);
            }
        }
    }
    public function downloadP()
    {
        $id = $_GET['p'];
        $this->downloadFinally($id);

    }
    public function downloadPFinally()
    {
        $id = $_GET['p'];
        User::cRequest($_GET['p'],Utils::getUserID());
        $this->downloadFinally($id);

    }
    public function request()
    {
        Utils::isLogged();
        if(isset($_GET['p']))
        {
            $id = $_GET['p'];
            $is = User::isRequestedOnce($id,Utils::getUserID());
            $user = User::getUserFromProject($id);
            $t = '';
            if(empty($is)) {
            $t .= '<h4>Send a request to <a href="">'.$user[0]->name.'</a> to download project:<u> '.$user[0]->p_name.'</u> </h4>';
            $t .='<h5>Owner will be noticed for your request.</h5>';
            $t .='<p id="after-request-p"></p>';
                $t .= '<div class="modal-footer">
                        <button  onclick="sendReq(' . $id . ')" id="after-request-p-btn" class="btn btn-primary" >
                            Send Request
                        </button>
                    </div>';
            }else{
                $t .='<h5>You have requested once.</h5>';
                $t .= '<div class="modal-footer">
                        <button id="after-request-p-btn" data-dismiss="modal" class="btn" >
                            Sit down and wait.
                        </button>
                    </div>';
            }
            return $t;
        }else{
          Redirect::to('home')->send();

        }
    }
    public function download()
    {
        //Utils::isLogged();
        if(isset($_GET['p'])) {
            $id = $_GET['p'];
            $userId = Utils::getUserID();
            $u_id = Projects::getUserIdForProject($id);
            if ($userId == $u_id) {
                return '/home/download/p?p='.$_GET['p'];
//                $this->downloadFinally($id);
            }
            $premium = Projects::isPremium(Utils::getUserID());
            if ($premium == 1) {
                return '/home/download/p?p='.$_GET['p'];
//                $this->downloadFinally($id);
            }
            $isrequested = User::isRequested($id,Utils::getUserID());
            if(!empty($isrequested)){
                return '/home/download/p?p='.$_GET['p'];
            }
            $sh = Projects::hasUserAnyProject($userId);
            if (empty($sh)) {
                return 2;
            } else {
                return 1;
            }
        }else{
            Redirect::to('home')->send();
        }
    }

    public function downloadFinally($id)
    {
        $res = Projects::downloadProject($id);
        $filename = "detyra/" . $res[0]->file;
        header("Content-disposition: attachment; filename=" . $filename);
        header("Content-type: application/" . $res[0]->ext);
        readfile($filename);
        Projects::addDownloads($id);
    }

    public function searchProject()
    {
        $s = $_GET["s"];
        $search = Projects::search($s,Utils::getUserID());

        $t = ' <ul class="users-list clearfix">';
        foreach ($search as $pro) {
            $t .= ' <div class="col-lg-4 col-xs-6" >
                    <!-- small box -->
                    <div class="small-box custom-bg-projects" data-id=" $pro->project_id ">
                        <div class="inner">
                            <h4>' . $pro->p_name . '</h4>
                            <p data-id="'.str_replace(" ","-",$pro->c_name).'" id="v_c_project">' . $pro->c_name . '</p>
                            <p data-id="'.str_replace(" ","-",$pro->u_name) .'" id="u_p_project">' . $pro->u_name . '</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="small-box-footer">
                            <div class="row">
                            <div class="col-sm-6">
                                <p>' . $pro->downloads . '</p>';
            $t .= ' <a href="javascript: downPro('. $pro->project_id.')" style="text-decoration:none;color:white"><i id="d-ppp" data-id="' . $pro->project_id . ' ", class="fa fa-download"> Download</i></a>
                            </div>';
            $t .= '<div class="col-sm-6">
                                <p id="l-p-i'.$pro->project_id.'">'. $pro->likes .'</p>';
            if ($pro->l_user) {
                $t .= ' <div id="like-p" onclick="likePro('. $pro->project_id .')"  data-id="' . $pro->project_id . '"><i id="like-p-' . $pro->project_id . '"  class="fa fa-thumbs-o-up">Liked</i></div>';
            }else {
                $t .= ' <div id="like-p" onclick="likePro('. $pro->project_id .')" data-id="' . $pro->project_id . '"><i id="like-p-' . $pro->project_id . '"  class="fa fa-thumbs-o-up">Like</i></div>';
            }

                           $t .= '</div>
                            </div>
                        </div>
                    </div>
                </div>';


        }
       $t .=' </ul>';


            return $t;
        }

}
