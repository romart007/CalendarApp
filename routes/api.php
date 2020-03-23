<?php

// use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', 'TestController@index');

Route::prefix('calendar')->group(function(){
	Route::get('/events/{id?}', 'EventsController@index');
	Route::get('/schedules/{id?}', 'SchedulesController@index');

	Route::post('/', 'EventsController@store');
});
