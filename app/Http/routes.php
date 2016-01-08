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

Route::get('/', 'IndexController@index');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// routes securisée
Route::group(['middleware' => 'auth'], function () {

	/*
	|--------------------------------------------------------------------------
	| Forum
	|--------------------------------------------------------------------------
	*/
	Route::get('/forum', 'TopicController@index');

	Route::get('/forum/create', 'TopicController@create');
	Route::post('/forum/create', 'TopicController@store');

	Route::get('/forum/show/{id}', ['uses' =>'TopicController@show']);
	Route::post('/forum/show/{id}', ['uses' => 'PostController@store']);

	Route::post('/forum/delete', ['uses' => 'TopicController@destroy']);

	Route::post('/forum/update/{id}', ['uses' => 'TopicController@update']);

	Route::post('/post/delete', ['uses' => 'PostController@destroy']);

	/*
	|--------------------------------------------------------------------------
	| Games
	|--------------------------------------------------------------------------
	*/
	Route::get('/games', 'GameController@index');

	//synonyms
	Route::get('games/synonyms', 'SynonymController@synonyms');
	Route::post('games/get_synonyms', 'SynonymController@get_synonyms');
	Route::post('games/post_synonyms', 'SynonymController@post_synonyms');

	//speakabout
	Route::post('games/upload_audio', 'SpeakAboutController@upload');

	Route::get('games/speak_about', 'SpeakAboutController@speakAbout');

	Route::post('games/get_speak_about', 'SpeakAboutController@get_speak_about');
	Route::post('games/post_speak_about', 'SpeakAboutController@post_speak_about');

	/*
	|--------------------------------------------------------------------------
	| Members
	|--------------------------------------------------------------------------
	*/
	Route::get('/members', 'MemberController@index');
	Route::get('/members/{name}/{id}', 'MemberController@show');


	/*
	|--------------------------------------------------------------------------
	| Profile
	|--------------------------------------------------------------------------
	*/
	Route::get('/profile', 'ProfileController@index')->name('profile.index');
	Route::get('/profile/about', 'ProfileController@about');
	Route::post('/profile/about', 'ProfileController@update')->name('profile.about');
	Route::post('/profile/picture', 'ProfileController@uploadPicture')->name('profile.picture');
	Route::get('/achievements', 'ProfileController@achievements');

	/*
	|--------------------------------------------------------------------------
	| News
	|--------------------------------------------------------------------------
	*/
	Route::get('/news', 'NewsController@index');
	Route::get('/news/{slug}', 'NewsController@show');
});

/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){

	Route::get('/administration', 'AdminController@index')->name('administration');
	/* --> Actualités */
	Route::resource('/administration/news', 'AdminNewsController');
	Route::post('administration/news/online', 'AdminNewsController@online');
	/* --> Exercices */
	Route::get('administration/games', 'GameController@adminIndex');

	Route::get('administration/games/data/synonyms', 'SynonymController@dataManaging');
	Route::post('administration/games/synonym/store', 'SynonymController@store');
	Route::post('administration/games/synonym/remove/{id}', ['uses' => 'SynonymController@remove']);

	Route::get('administration/games/data/speak_about', 'SpeakAboutController@dataManaging');
	Route::post('administration/games/speak_about/store', 'SpeakAboutController@store');
	Route::post('administration/games/speak_about/remove/{id}', ['uses' => 'SpeakAboutController@remove']);

	Route::get('administration/games/evaluate/speak_about', 'SpeakAboutController@evaluate');
	Route::post('administration/games/evaluate/speak_about/evaluate/{id}', ['uses' => 'SpeakAboutController@post_evaluate']);
	Route::post('administration/games/evaluate/speak_about/delete/{id}', ['uses' => 'SpeakAboutController@delete_record']);
});