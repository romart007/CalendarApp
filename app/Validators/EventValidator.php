<?php
namespace App\Validators;

class EventValidator extends BaseValidator
{
	public $rules = [
		'name' => 'required|string',
		'from' => 'required|date',
		'to' => 'required|date'
	];
}