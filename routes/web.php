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

use App\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\SerieResource;
use App\Serie;

Auth::routes();

Route::get('/', 'MainController@index')->name('home');
Route::get('/home', 'MainController@index')->name('home');
Route::resource('episodes', 'EpisodeController');
Route::resource('comments', 'CommentController');

Route::resource('genres', 'GenreController');
Route::resource('series', 'SerieController');

Route::get('modifier_avis_redaction/{id}','SerieController@editAvis')->name("editAvis");
Route::resource('users', 'UserController');

Route::get('/saison/{idSerie}/{idSaison}','SerieController@showSaison')->name('showSaison');


