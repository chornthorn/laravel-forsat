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


Route::prefix('auth')->group(function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout')->middleware('auth:api');
    Route::get('/user', 'AuthController@user')->middleware('auth:api');
    Route::get('authentication-failed', 'AuthController@authFailed')->name('auth-failed');
});


//Route::get('/opportunities','OpportunityController@index');
//Route::post('/opportunities','OpportunityController@store');

Route::group(['prefix' => 'lookups', 'middleware' => 'auth:api'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('country', 'CountryController');
});

Route::group(['middleware' => 'auth:api'], function () {

    // Opportunity
    Route::resource('opportunity', 'OpportunityController');

    // Question
    Route::get('question', 'QuestionController@index');
    Route::post('question', 'QuestionController@store');
    Route::get('question/{question}', 'QuestionController@show');
    Route::put('question/{question}', 'QuestionController@update');
    Route::delete('question/{question}', 'QuestionController@destroy');

    // favorite
    Route::resource('favorite', 'FavoriteController');

    // Comment
    Route::resource('comment', 'CommentController');

    // Opportunity Detail
    Route::resource('opportunity_detail', 'OpportunityDetailController');

});
