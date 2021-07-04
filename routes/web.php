<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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


Route::get('/', function () {
    return view('welcome');
});
Route::resource('account', AccountController::class);
Route::resource('survey', SurveyController::class);
Route::resource('tournament', TournamentController::class);
Route::resource('events', EventsController::class);
Route::resource('team', TeamController::class);
Route::resource('admin', AdminController::class);


Route::group(['middleware' => ['auth']], function () {

    // admin related routes
    Route::get('/admin_events', 'App\Http\Controllers\AdminController@events')->name('admin_events');
    Route::get('/admin_reports', 'App\Http\Controllers\AdminController@reports')->name('admin_reports');
    Route::get('/admin_surveys', 'App\Http\Controllers\AdminController@surveys')->name('admin_surveys');
    Route::get('/admin_create_surveys', 'App\Http\Controllers\AdminController@create_surveys')->name('admin_create_surveys');
    Route::post('/createsurvey', 'App\Http\Controllers\AdminController@createsurvey')->name('createsurvey');
    Route::get('addQuestionsPage/id={id}', [
        'as' => 'addQuestionsPage',
        'uses' => 'App\Http\Controllers\AdminController@addQuestionsPage'
    ]);
    Route::get('/admin_tournaments', 'App\Http\Controllers\AdminController@tournaments')->name('admin_tournaments');
    Route::get('/admin_create_tournaments', 'App\Http\Controllers\AdminController@create_tournaments')->name('admin_create_tournaments');
    Route::post('/createtournament', 'App\Http\Controllers\AdminController@createtournament')->name('createtournament');

    Route::get('answers/id={id}', [
        'as' => 'answers',
        'uses' => 'App\Http\Controllers\AdminController@getAnswers'
    ]);
    Route::post('/setpoints', 'App\Http\Controllers\AdminController@setpoints')->name('setpoints');
    Route::get('managetournament/id={id}', [
        'as' => 'managetournament',
        'uses' => 'App\Http\Controllers\AdminController@managetournament'
    ]);
    Route::post('createQuestions', 'App\Http\Controllers\AdminController@createQuestions')->name('createQuestions');



    //Route::get('destroyprofile', 'App\Http\Controllers\AccountController@destroyprofile')->name('destroyprofile');

    Route::get('/profile', 'App\Http\Controllers\AccountController@profile')->name('profile');
    Route::get('/events', 'App\Http\Controllers\EventsController@getOngoingEvents')->name('events');
    Route::get('/team_list', 'App\Http\Controllers\TeamController@viewTeamList')->name('team_list');
    Route::get('/leaderboardview', 'App\Http\Controllers\TournamentController@leaderboardview')->name('leaderboardview');
    Route::get('/tournament_list', 'App\Http\Controllers\TournamentController@viewTournamentList')->name('tournament_list');

    Route::post('/LeaderBoard', 'App\Http\Controllers\TournamentController@LeaderBoard')->name('LeaderBoard');

    Route::get('/notifications', 'App\Http\Controllers\AccountController@viewNotifications')->name('notifications');
    Route::get('/not_count', 'App\Http\Controllers\AccountController@ncount')->name('not_count');
    Route::post('event_participate', 'App\Http\Controllers\EventsController@participate')->name('event_participate');
    Route::post('event_leave', 'App\Http\Controllers\EventsController@leave')->name('event_leave');
    Route::post('team_leave', 'App\Http\Controllers\TeamController@leave')->name('team_leave');
    Route::post('team_participate', 'App\Http\Controllers\TeamController@participate')->name('team_participate');
    Route::post('team_join_request', 'App\Http\Controllers\TeamController@joinRequest')->name('team_join_request');
    Route::post('profile_report', 'App\Http\Controllers\AccountController@report')->name('profile_report');
    Route::post('eventinvitation', 'App\Http\Controllers\EventsController@eventinvitation')->name('eventinvitation');
    Route::post('teaminvitation', 'App\Http\Controllers\TeamController@teaminvitation')->name('teaminvitation');
    Route::post('tournament_participate', 'App\Http\Controllers\TournamentController@participate')->name('tournament_participate');
    Route::post('tournament_leave', 'App\Http\Controllers\TournamentController@leave')->name('tournament_leave');
    Route::get('/team_search', 'App\Http\Controllers\TeamController@search')->name('team_search');
    Route::get('/tournament_search', 'App\Http\Controllers\TournamentController@search')->name('tournament_search');
    Route::get('image-upload', 'App\Http\Controllers\ImageUploadController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'App\Http\Controllers\ImageUploadController@imageUploadPost')->name('image.upload.post');
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::post('team_kick', 'App\Http\Controllers\TeamController@kick')->name('team_kick');


    Route::get('profileview/id={id}', [
        'as' => 'profileview',
        'uses' => 'App\Http\Controllers\AccountController@viewProfile'
    ]);
    Route::get('eventview/id={id}', [
        'as' => 'eventview',
        'uses' => 'App\Http\Controllers\EventsController@viewEvent'
    ]);
    Route::get('tournamentview/id={id}', [
        'as' => 'tournamentview',
        'uses' => 'App\Http\Controllers\TournamentController@viewTournament'
    ]);
    Route::get('teamview/id={id}', [
        'as' => 'teamview',
        'uses' => 'App\Http\Controllers\TeamController@viewTeam'
    ]);
    Route::get('surveyview/id={id}', [
        'as' => 'surveyview',
        'uses' => 'App\Http\Controllers\SurveyController@viewSurvey'
    ]);
});


//sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::namespace('Auth')->group(function () {
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@show_login_form')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@process_login')->name('login');
Route::get('/register', 'App\Http\Controllers\Auth\LoginController@show_signup_form')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\LoginController@process_signup');
//});

//routes to static pages
Route::get('/ContactUs', function () {
    return view('Other.contactus');
});
Route::get('/TermsAndConditions', function () {
    return view('Other.TermsAndConditions');
});
Route::get('/PrivacyAndPolicy', function () {
    return view('Other.PrivacyAndPolicy');
});
Route::get('/FAQ', function () {
    return view('Other.FAQ');
});
Route::get('/AboutUs', function () {
    return view('Other.AboutUs');
});
//THESE ARE TEMPORARY ROUTES
Route::get('/ViewTournament', function () {
    return view('Tournament.viewtournament');
});
Route::get('/TournamentList', function () {
    return view('Tournament.TournamentList');
});
Route::get('/CreateTeam', function () {
    return view('Teams.CreateTeams  ');
});
Route::get('/Team', function () {
    return view('Teams.Team');
});
Route::get('/TeamList', function () {
    return view('Teams.TeamList');
});
Route::get('/TeamSearch', function () {
    return view('Teams.TeamSearch');
});
Route::get('/EditTeam', function () {
    return view('Teams.EditTeam');
});
Route::get('/Survey', function () {
    return view('Survey.Survey');
});
Route::get('/Notifications', function () {
    return view('account.Notifications');
});
Route::get('/ind', function () {
    return view('account.index');
});

//temporary for testng
Route::get('/LeaderBoard', function () {
    return view('Tournament.LeaderBoard');
});









