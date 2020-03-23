<?php
namespace App\Services;

use App\Models\Event;
use App\Models\Schedule;
use Carbon\Carbon;

class EventService extends AbstractService
{
	public function model()
	{
		return Event::class;
	}

	public function createEvent($name, $from, $to, array $days = [])
	{
		//if event name not exists then add
		$event = $this->first(['name' => $name]);
		if(!$event) {
			$event = $this->add([
				'name' => $name
			]);
		}

		if(!$event) {
			throw new \Exception('failed to create event');
		}

		//clear event schedule
		Schedule::where('event_id', $event->event_id)->delete();

		//add schedule
		$totalNdays = 0;
		$nmonths = dateDiffInMonths($from, $to) + 1;
		$current = Carbon::parse($from);

		for($i = 0; $i < $nmonths; $i ++) {
			$ndays = $current->daysInMonth;
			$totalNdays += $ndays;
			$current->addMonth();
		}

		$current = Carbon::parse($from)->firstOfMonth();

		for($i = 0; $i < $totalNdays; $i ++) {
			$weekday = dateFormat($current, 'D');

			$flag = $current->between(Carbon::parse($from), Carbon::parse($to)) 
				&& in_array($weekday, $days);

			Schedule::create([
				'event_id' => $event->event_id,
				'date' => dateFormat($current, 'Y-m-d'),
				'flag' =>  $flag
			]);

			$current->addDay();
		}

		//return event
		return $event;
	}
}