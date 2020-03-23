<?php
namespace App\Transformers;

use App\Models\Event;
use App\Models\Schedule;
use League\Fractal;

class EventTransformer extends Fractal\TransformerAbstract
{
	protected $availableIncludes = ['schedule'];

	public function transform($model)
	{
		if(!$model instanceof Event) {
			return [];
		}

		return [
			'event_id' => (int) $model->event_id,
			'name' => $model->name
		];
	}

	public function includeSchedule(Event $event)
	{
		$schedule = $event->schedule;
		return $this->collection($schedule, new ScheduleTransformer);
	}
}