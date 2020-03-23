<?php
namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

abstract class BaseValidator
{
	protected $errors = [];

	public function validate(array $data)
	{
		$validator = Validator::make($data, $this->rules);

		if($validator->fails()) {
			throw new ValidationException($validator->errors());
		}

		return true;
	}

	public function errors()
	{
		return $this->errors;
	}
}