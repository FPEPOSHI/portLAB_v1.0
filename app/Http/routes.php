<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', array('as'=>'login', 'uses'=>'LoginController@index'));
Route::get('/contact', array('as'=>'contact', 'uses'=>'LoginController@contact'));
Route::post('/login', array('as'=>'log_user', 'uses'=>'LoginController@check'));
Route::get('/home', array('as'=>'home', 'uses'=>'HomeController@index'));
Route::get('/home/download/{id}', array('as'=>'download', 'uses'=>'HomeController@download'));
Route::get('/home/logout', array('as'=>'logout', 'uses'=>'HomeController@logout'));
Route::post("/home", array("as"=>"newproject", "uses"=>"HomeController@newproject"));
Route::get("/home/category/{cat}", array("as"=>"bycategory", "uses"=>"HomeController@byCategory"));
Route::get("/profile", array("as"=>"profile", "uses"=>"ProfileController@index"));
Route::get("/profile/{usr}", array("as"=>"usr_profile", "uses"=>"ProfileController@viewUsr"));
Route::get("/home/project/like/{id}", array("as"=>"like", "uses"=>"HomeController@like"));
Route::post("/profile/update/{id}", array("as"=>"edit", "uses"=>"ProfileController@edit"));
//Route::get("/profile/edit/{id}", array("as"=>"edit_p", "uses"=>"ProfileController@getProjectById"));
Route::post("/profile/editp", array("as"=>"edit_pass", "uses"=>"ProfileController@editPass"));
Route::post("/profile/editus", array("as"=>"edit_us", "uses"=>"ProfileController@editSettings"));
Route::get("/profile/ch/P", array("as"=>"edit_pc", "uses"=>"ProfileController@checkPassword"));
Route::get("/profile/pro/update", array("as"=>"edit_proj", "uses"=>"ProfileController@getProjectToUpdate"));
Route::get("/profile/pro/delete", array("as"=>"delete-p", "uses"=>"ProfileController@deleteProject"));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
    Route::get('/login', array('as'=>'login', 'uses'=>'LoginController@index'));
    Route::get('/contact', array('as'=>'contact', 'uses'=>'LoginController@contact'));
    Route::post('/login', array('as'=>'log_user', 'uses'=>'LoginController@check'));
    Route::get('/home', array('as'=>'home', 'uses'=>'HomeController@index'));
    Route::get('/home/download/{id}', array('as'=>'download', 'uses'=>'HomeController@download'));
    Route::get('/home/logout', array('as'=>'logout', 'uses'=>'HomeController@logout'));
    Route::post("/home", array("as"=>"newproject", "uses"=>"HomeController@newproject"));
    Route::get("/home/category/{cat}", array("as"=>"bycategory", "uses"=>"HomeController@byCategory"));
    Route::get("/profile", array("as"=>"profile", "uses"=>"ProfileController@index"));
    Route::get("/profile/{usr}", array("as"=>"usr_profile", "uses"=>"ProfileController@viewUsr"));
    Route::get("/home/project/like/{id}", array("as"=>"like", "uses"=>"HomeController@like"));
    Route::post("/profile/update/{id}", array("as"=>"edit", "uses"=>"ProfileController@edit"));
//    Route::get("/profile/edit/{id}", array("as"=>"edit_p", "uses"=>"ProfileController@getProjectById"));
    Route::post("/profile/editp", array("as"=>"edit_pass", "uses"=>"ProfileController@editPass"));
    Route::post("/profile/editus", array("as"=>"edit_us", "uses"=>"ProfileController@editSettings"));
    Route::get("/profile/ch/P", array("as"=>"edit_pc", "uses"=>"ProfileController@checkPassword"));
    Route::get("/profile/pro/update", array("as"=>"edit_proj", "uses"=>"ProfileController@getProjectToUpdate"));
    Route::get("/profile/pro/delete", array("as"=>"delete-p", "uses"=>"ProfileController@deleteProject"));



});
