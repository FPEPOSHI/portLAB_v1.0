<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use Redirect;

class AdminController extends Controller
{
    public function getUser()
    {
        $id = $_GET['i'];
        $prem = Projects::isPremium($id);
        $project = Projects::getAllProjectsById($id);

        $t = '<div class="row">
              <div class="row">
            <div class="col-md-12">';
        if ($prem) {
            $t .= ' <label><input type="checkbox" value="" disabled checked> Premium</label> ';
        } else {
            $t .= ' <label><input type="checkbox" value=""> Premium</label> ';
        }


        $t .= '<div class="row">
             <div class="col-md-12">';

        $t .= '<table id="tab2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Emer projekti</th>
                            <th>Kategoria</th>
                            <th>Like</th>
                            <th>Download</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>';
        for ($i = 0; $i < count($project); $i++){
            $t .= '<tr data-id="{!! $users[$i]->user_id !!}" )">
                                <td>'.$project[$i]->p_name.'</td>
                                <td>'.$project[$i]->c_name.'</td>
                                <td>'.$project[$i]->l_user.'</td>
                                <td>'.$project[$i]->p_down.'</td>
                               <td><button type="submit" onclick="d_p(' . $project[$i]->project_id . ')" id ="delete"  class="btn btn-danger">Delete</td>
                            </tr>';
    }


        $t.= ' </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>';
        return $t;

    }

    public function deleteProjectA()
     {
         $id = $_GET['i'];
         Projects:: deleteProjectById($id);
         Redirect::to("home")->send();

     }


}




