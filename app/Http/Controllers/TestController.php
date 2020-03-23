<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
    	$date = dateFormat('2020-03-19', 'j D');
		var_dump($date);
    }
}
