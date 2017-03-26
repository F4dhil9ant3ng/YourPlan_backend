<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test', function() {
	return \Config::get('broadcasting');
});

Route::group(['prefix' => 'plan', 'middleware' => 'jwt.auth'], function() {
	Route::get('{idUser}', 'PlanController@index');
	Route::post('insert', 'PlanController@insert');
	Route::get('detail/{idPlan}', 'PlanController@detail');

	// distance matrix google api
	Route::post('measure', 'MeasureTimeController@measure');
});

// Auth
Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
