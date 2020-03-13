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


Route::post('/logs', 'ParticipantController@logs');
Route::view('/challenge_dashboard', "challenge_dashboard");

Route::view('/create_challenge', "create_challenge");


Route::resource('comment', 'CommentController');
Route::resource('code', 'CodeController');
Route::resource('admin', 'AdminController');
Route::resource('participant', 'ParticipantController');
Route::resource('guest', 'GuestController');
Route::resource('organizer', 'OrganizerController');



Route::resource('my-users', 'HomeController');

Route::get('ongoing_challenge', 'ChallengesController@ongoingChallenges');
Route::get('all_challenge', 'ChallengesController@allChallenges');
Route::post('/storeChallenge', 'ChallengesController@storeChallenge');
Route::post('/store', 'ParticipantController@store');
Route::post('/editChallenge', 'ChallengesController@editChallenge');
Route::post('/submitCode', 'ChallengesController@submitCode');
Route::view('/approve_guest', "approve_guest");
Route::get('approve_guest', 'AdminController@allUsers');
Route::post('/approveUser', 'AdminController@approveUser');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/store', 'ChallengesController@store');
// Route::get('challenge_dashboard/{status}', function ($status) {
//     return view('challenge_dashboard');
// });
// Route::get('my-home', 'HomeController@myHome');
//Route::resource('challenge', 'ChallengesController');

// Route::get('register', 'HomeController@register');
// Route::get('login', 'HomeController@login');
//Route::view('/register', "register");


