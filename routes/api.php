<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/test', function () {
//    return response('Test API', 200)
//        ->header('Content-Type', 'application/json');
//});
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@process_login')->name('login');
Route::post('/register', 'App\Http\Controllers\AccountController@store')->name('register');

// sanctum
//Route::post('/tokens/create', function (Request $request) {
//    $token = $request->user()->createToken($request->token_name);
//    return ['token' => $token->plainTextToken];
//});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('updateprofile', [
        'as' => 'updateprofile',
        'uses' => 'App\Http\Controllers\AccountController@update'
    ]);
    Route::post('updateteam/teamid={teamid}', [
        'as' => 'updateteam',
        'uses' => 'App\Http\Controllers\TeamController@update'
    ]);
    Route::get('viewprofile/id={id}', [
        'as' => 'viewprofile',
        'uses' => 'App\Http\Controllers\AccountController@viewprofile'
    ]);
    Route::get('destroyprofile/id={id}', [
        'as' => 'destroyprofile',
        'uses' => 'App\Http\Controllers\AccountController@destroy'
    ]);
    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'App\Http\Controllers\Auth\LoginController@logout'
    ]);
    Route::get('eventview/id={id}', [
        'as' => 'eventview',
        'uses' => 'App\Http\Controllers\EventsController@viewEvent'
    ]);
    Route::get('teamview/id={id}', [
        'as' => 'teamview',
        'uses' => 'App\Http\Controllers\TeamController@viewTeam'
    ]);
    Route::get('deleteevent/id={id}', [
        'as' => 'deleteevent',
        'uses' => 'App\Http\Controllers\EventsController@destroy'
    ]);
    Route::get('tournamentview/id={id}', [
        'as' => 'tournamentview',
        'uses' => 'App\Http\Controllers\TournamentController@viewTournament'
    ]);
    Route::post('tournament_leave', 'App\Http\Controllers\TournamentController@leave')->name('tournament_leave');
    Route::post('tournament_participate', 'App\Http\Controllers\TournamentController@participate')->name('tournament_participate');
    Route::post('/createevent', 'App\Http\Controllers\EventsController@store')->name('createevent');
    Route::post('/createteam', 'App\Http\Controllers\TeamController@store')->name('createteam');
    Route::post('/getOngoingEvents', 'App\Http\Controllers\EventsController@getOngoingEvents')->name('getOngoingEvents');
    Route::get('/notifications', 'App\Http\Controllers\AccountController@viewNotifications')->name('notifications');
    Route::post('/eventparticipate', 'App\Http\Controllers\EventsController@participate')->name('eventparticipate');
    Route::post('/eventleave', 'App\Http\Controllers\EventsController@leave')->name('eventleave');
    Route::post('team_leave', 'App\Http\Controllers\TeamController@leave')->name('team_leave');
    Route::post('team_participate', 'App\Http\Controllers\TeamController@participate')->name('team_participate');
    Route::post('team_join_request', 'App\Http\Controllers\TeamController@joinRequest')->name('team_join_request');
    Route::get('/team_list', 'App\Http\Controllers\TeamController@viewTeamList')->name('team_list');
    Route::post('/team_search', 'App\Http\Controllers\TeamController@search')->name('team_search');
    Route::get('/tournament_list', 'App\Http\Controllers\TournamentController@viewTournamentList')->name('tournament_list');
    Route::post('/tournament_search', 'App\Http\Controllers\TournamentController@search')->name('tournament_search');

    //not tested yet
    Route::post('kick_user', [
        'as' => 'kick_ser',
        'uses' => 'App\Http\Controllers\TeamController@kick'
    ]);
    Route::get('/LeaderBoard', 'App\Http\Controllers\TournamentController@LeaderBoard')->name('LeaderBoard');
});
