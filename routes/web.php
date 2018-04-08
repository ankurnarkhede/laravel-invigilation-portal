<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {

        return view('welcome');

    })->name('home')->middleware('guest');;



    Route::post('/add_user', [
        'uses' => 'UserController@postAddUser',
        'as' => 'add_user',
        'middleware' => 'auth_login'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/users', [
        'uses' => 'UserController@getUsers',
        'as'=>'users',
        'middleware' => 'auth_login'
    ]);

    Route::post('/user-edit', [
        'uses' => 'UserController@postUserEdit',
        'as'=>'user-edit',
        'middleware' => 'auth_login'
    ]);

    Route::get('/sms', [
        'uses' => 'SMSController@getSMS',
        'as'=>'sms',
        'middleware' => 'auth_login'
    ]);

    Route::post('/send-sms', [
        'uses' => 'SMSController@postSendSMS',
        'as'=>'send-sms',
        'middleware' => 'auth_login'
    ]);

    Route::get('/schedule', [
        'uses' => 'SMSController@getSchedule',
        'as'=>'schedule',
        'middleware' => 'auth_login'
    ]);

    Route::post('/schedule-manually', [
        'uses' => 'SMSController@postScheduleManually',
        'as'=>'schedule-manually',
        'middleware' => 'auth_login'
    ]);

    Route::post('/schedule-upload', [
        'uses' => 'SMSController@postScheduleUpload',
        'as'=>'schedule-upload',
        'middleware' => 'auth_login'
    ]);

    Route::get('/SMS-auto-send', [
        'uses' => 'SMSController@getSMSAutoSend',
        'as'=>'SMS-auto-send',
        'middleware' => 'auth_login'
    ]);

    Route::get('/help', [
        'uses' => 'SMSController@getHelp',
        'as'=>'help',
        'middleware' => 'auth_login'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    Route::post('/invigilation-status', [
        'uses' => 'SMSController@postInvigilationStatus',
        'as' => 'invigilation-status',
        'middleware' => 'auth_login'
    ]);

    Route::post('/user-status', [
        'uses' => 'UserController@postUserStatus',
        'as' => 'user-status',
        'middleware' => 'auth_login'
    ]);

    Route::get('/sample-csv', [
        'uses' => 'SMSController@getSampleCSV',
        'as' => 'sample-csv',
        'middleware' => 'auth_login'
    ]);

    Route::post('/delete-bulk', [
        'uses' => 'SMSController@postDeleteBulk',
        'as'=>'delete-bulk',
        'middleware' => 'auth_login'
    ]);

    Route::get('/reports', [
        'uses' => 'ReportController@getReports',
        'as'=>'reports',
        'middleware' => 'auth_login'
    ]);

    Route::post('/get-report', [
        'uses' => 'ReportController@postGetReport',
        'as'=>'get-report',
        'middleware' => 'auth_login'
    ]);






});







