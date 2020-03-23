<?php
namespace App\Services;

use Exception;

class ErrorResponse
{
	private $exception;

	private $format;

	public function __construct(Exception $exception)
	{
		$this->exception = $exception;

		if(!$this->exception) {
			return;
		}

		$this->format();
	}

	private function format()
	{
		$e = $this->exception;

		$this->format = [
			'type' => get_class($e),
			'code' => $e->getCode(),
			'message' => $e->getMessage(),
			'file' => $e->getFile(),
			'line' => $e->getLine(),
		];
	}

	public function toJson()
	{
		if(!$this->format) {
			return;
		}

		return response()->json([
			'error' => $this->format
		]);
	}
}