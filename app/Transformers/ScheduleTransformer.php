<?php
namespace App\Transformers;

use App\Models\Schedule;
use League\Fractal;

class ScheduleTransformer extends Fractal\TransformerAbstract
{
	protected $availableIncludes = ['event'];

	public function transform($model)
	{
		if(!$model instanceof Schedule) {
			return [];
		}

		return [
			'sched_id' => (int) $model->sched_id,
			'event_id' => (int) $model->event_id,
			'date' => $model->date,
			'month_day' => dateFormat($model->date, 'j'),
			'week_day' => dateFormat($model->date, 'D'),
			'month_prefix' => dateFormat($model->date, 'M'),
			'year' => dateFormat($model->date, 'Y'), 
			'flag' => $model->flag
		];
	}

	public function includeEvent(Schedule $schedule)
	{
		$event = $schedule->event;
		return $this->item($event, new EventTransformer);
	}
}