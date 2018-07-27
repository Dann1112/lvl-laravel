<?php

Route::get('/', function(){
    return view('home');})
->name('home');

Route::get('/search','PlayerController@showAll')->name('players');
Route::get('/search/results','PlayerController@search')->name('search_results');

//Route::get('/prueba',function(){
    //return view('panel.player_stats');
//})->name('player_stats');

Route::get('/profile/edit','PlayerController@editProfile')->name('edit_profile');
Route::get('/profile/inbox','MessageController@index')->name('inbox');
Route::post('/profile/inbox','MessageController@createClubRequest')->name('club_request');

Route::get('/players/{player}','PlayerController@show');

Route::post('/players','InscriptionsController@create')->name('joined_team');

Route::get('/teams/{team}','TeamController@show');

Route::post('/teams','TeamController@store')->name('teams');

Route::get('/ranking/{stat}','PlayerStatController@show')->name('ranking');
Route::get('/ranking/clubs/{stat}','PlayerStatController@showClubs');

Route::get('/standings','StandingsController@index')->name('standings');
Route::get('/standings/{id}','StandingsController@show');

Route::get('/contact',function(){return view('contact');})->name('contact');

Route::get('/register','RegistrationController@create')->name('register');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create')->name('login');
Route::post('/login','SessionsController@store');

Route::get('/panel','PanelController@index')->name('panel');

Route::get('/panel/competitions','CompetitionsController@create')->name('competitions');
Route::post('/panel/competitions','CompetitionsController@store');

Route::get('/panel/fixtures','FixturesController@create')->name('fixtures');
Route::post('/panel/fixtures','FixturesController@store');

Route::get('/panel/results','FixturesController@results')->name('results');
Route::post('/panel/results','FixturesController@saveResults');

Route::get('/panel/inscriptions','StandingsController@create')->name('inscriptions');
Route::post('/panel/inscriptions','StandingsController@store');

Route::get('/panel/player_inscription','InscriptionsController@index')->name('player_inscription');
Route::post('/panel/player_inscription','InscriptionsController@store');

Route::get('/panel/stats','PlayerStatController@newStat')->name('player_stats');
Route::post('/panel/stats','PlayerStatController@store');


Route::get('/logout','SessionsController@destroy')->name('logout');