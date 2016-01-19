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
        if (Utils::getSuperUser())
        {

            return;
        }
        Utils::isLogged();
        $projects = Projects::getAllProjects();
        return $this->returnView($projects,1,"");
    }

    public function getAdminView()
    {
//        $id = Utils::getUserID();
        $user = User::getUser(-1);
//        $user_number = User::getUserNumber();
//        $like_number = Projects::countLikes();
//        $download_number = Projects::countDownloads();
//        $projects_number = Projects::countProjects();
//        $cat = Projects::getAllCategory();
//        $latest_projects = Projects::getLatestProjects();
//        $map = $this->getMapp($map, $cat_name);
//        $premium = Projects::isPremium($id);
        return View::make('admin')
            ->with('details_header',$user)
//            ->with('total_users',$user_number)
//            ->with('projects', $projects)
//            ->with("category", $cat)
//            ->with("latest_pro", $latest_projects)
//            ->with("total_likes", $like_number)
//            ->with("total_downloads", $download_number)
//            ->with("total_projects", $projects_number)
//            ->with("premium", $premium)
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

    public function download($id)
    {
        $userId = Utils::getUserID();
        $u_id = Projects::getUserIdForProject($id);
        if($userId == $u_id){
            $this->downloadFinally($id);
        }
        $sh = Projects::hasUserAnyProject($userId);
        if(empty($sh))
        {
            //tregoji qe ska te drejte te shkarkoj
//            Redirect::to('home')->send();
        }else {
            $this->downloadFinally($id);
        }


//        Redirect::to('home')->send();
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
}
