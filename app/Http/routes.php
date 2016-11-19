<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@getLogin');

Route::post('/login', 'LoginController@postLogin');

Route::get('/logout', 'RegisterController@getLogout');

Route::get('/register', 'RegisterController@getRegister');

Route::post('/register', 'RegisterController@postRegister');

Route::get('/home', 'RiskManageController@showAllRisk');

Route::get('/createrisk', 'PageSkipController@toCreateRisk');

Route::post('/createrisk', 'RiskManageController@createRisk');

Route::get('/createpm', 'ProjectManagerController@createPM');

Route::get('/createrisktype', 'PageSkipController@toCreateRiskType');

Route::post('/createrisktype', 'RiskManageController@createrisktype');

Route::get('/createproject', 'PageSkipController@toCreateProject');

Route::post('/createproject', 'ProjectController@createProject');

Route::get('/myrisk', 'PageSkipController@toMyRisk');

Route::post('/updateriskcondition/{id}', 'RiskManageController@updateRiskCondition');

Route::post('/updaterisktracker/{id}', 'RiskManageController@updateRiskTracker');

Route::get('/createRiskManagePlan', 'PageSkipController@toCreateManagePlan');

Route::post('/createRiskManagePlan', 'RiskManagePlanController@createManagePlan');

Route::get('/statistic', 'StatisticController@show_bar_chart');

Route::post('/statistic', 'StatisticController@show_bar_chart');



//web homework
//Route::get('/login', 'LoginController@getLogin');
//
//Route::post('/login', 'LoginController@postLogin');
//
//Route::get('/logout', 'RegisterController@getLogout');
//
//Route::get('/register', 'RegisterController@getRegister');
//
//Route::post('/register', 'RegisterController@postRegister');
//
//Route::get('/home', 'HomepageController@showActs');
//
//Route::get('/health', 'HealthController@showAllActivities');
//
//Route::get('/advice', 'HealthController@showAdvice');
//
//Route::post('/activity', 'HomepageController@store');
//
//Route::post('/activity1', 'HomepageController@store1');
//
//Route::post('/join/{id}', 'HomepageController@join');
//
//Route::get('/joinActs', 'HealthController@showAllJoinActivities');
//
//Route::get('/quit/{id}', 'HealthController@quitActivities');
//
//Route::get('/showInfo', 'HomepageController@showInfo');
//
//Route::get('/setInfo', 'HomepageController@setInfo');
//
//Route::post('/setInfo', 'HomepageController@saveInfo');
//
//Route::post('/advice', 'HealthController@postAdvice');
//
//Route::get('/deleteAdvice/{id}', 'HealthController@deleteAdvice');
//
//Route::get('/import', 'HealthController@import');
//
//Route::post('/importHealth', 'HealthController@importHealthData');
//
//Route::get('/userManage', 'AdminController@adminPage');
//
//    Route::post('/modifyUser/{id}', 'AdminController@modifyUser');
//
//Route::get('/reply', 'HealthController@showReply');
//
//Route::post('/reply/{id}', 'HealthController@reply');
//
//Route::get('/statistic', 'StatisticController@showCharts');
//
//Route::post('/modifyAct/{id}', 'HealthController@updateAct');

