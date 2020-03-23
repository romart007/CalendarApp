<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Transformers\ScheduleTransformer;

class SchedulesController extends Controller
{
    protected function model()
    {
    	return Schedule::class;
    }

    protected function transformer()
    {
    	return ScheduleTransformer::class;
    }

    public function index($id=null, Request $request)
    {
    	return parent::index($id, $request);
    }
}
