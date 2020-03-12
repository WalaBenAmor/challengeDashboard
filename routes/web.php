<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Route::view('/login', "login");
Route::post('/logs', 'ParticipantController@logs');
//Route::view('/challenge_dashboard', "challenge_dashboard");

Route::view('/create_challenge', "create_challenge");

//Route::resource('challenge', 'ChallengesController');
Route::resource('comment', 'CommentController');
Route::resource('code', 'CodeController');
Route::resource('admin', 'AdminController');
Route::resource('participant', 'ParticipantController');
Route::resource('guest', 'GuestController');
Route::resource('organizer', 'OrganizerController');


// Route::get('my-home', 'HomeController@myHome');

// Route::get('my-users', 'HomeController@myUsers');

// Route::get('register', 'HomeController@register');
// Route::get('login', 'HomeController@login');
Route::get('ongoing_challenge', 'ChallengesController@ongoingChallenges');
Route::get('all_challenge', 'ChallengesController@allChallenges');
Route::post('/storeChallenge', 'ChallengesController@storeChallenge');
//Route::view('/register', "register");
Route::post('/store', 'ParticipantController@store');
//Route::post('/store', 'ChallengesController@store');
// Route::get('challenge_dashboard/{status}', function ($status) {
//     return view('challenge_dashboard');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
