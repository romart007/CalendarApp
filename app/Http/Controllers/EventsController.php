<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\EventValidator;
use App\Services\ErrorResponse;
use Illuminate\Support\Facades\DB;
use App\Services\EventService;
use App\Transformers\EventTransformer;
use App\Models\Event;

class EventsController extends Controller
{
	protected function model()
	{
		return Event::class;
	}

	protected function transformer()
	{
		return EventTransformer::class;
	}

	public function index($id=null, Request $request)
	{
		return parent::index($id, $request);
	}

    public function store(
    	Request $request,
    	EventValidator $v,
    	EventService $eventService)
    {
    	try {
	    	$data = $request->all();

	    	$v->validate($data);

	    	DB::beginTransaction();

	    	$event = $eventService->createEvent($data['name'], $data['from'], $data['to'], $data['days']);

	    	DB::commit();

	    	return response()->json(['data' => $event]);
	    }
	    catch(\Exception $e) {}

	    DB::rollBack();

	    $errorResponse = new ErrorResponse($e);
	    return $errorResponse->toJson();
    }
}
