<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', function(){
	return view('calendar');
});
