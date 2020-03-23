<?php

use Carbon\Carbon;

function vd($data)
{
	var_dump($data);
	die;
}

function pr(array $data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	die;
}

function dateFormat($date, $format)
{
	if(!$date instanceof Carbon) {
		$date = Carbon::parse($date);
	}
	
	return $date->copy()->format($format);
}

function dateDiffInDays($from, $to)
{
	$from = Carbon::parse($from);
	$to = Carbon::parse($to);
	return $from->diffInDays($to);
}

function dateDiffInMonths($from, $to)
{
	$from = Carbon::parse($from)->firstOfMonth();
	$to = Carbon::parse($to)->firstOfMonth();
	return $from->diffInMonths($to);
}