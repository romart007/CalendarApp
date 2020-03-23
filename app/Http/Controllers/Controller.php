<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Services\FractalService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $fractal;

    protected $model;

    public function __construct(
    	FractalService $fractal)
    {
    	$this->fractal = $fractal;

    	$this->initialize();
    }

    private function initialize()
    {
    	//model
    	$model = $this->model();
    	$this->model = new $model;
    	if(!$this->model instanceof Model) {
    		throw new \Exception("Class {$model} must return an instance of Illuminate\Database\Eloquent\Model;");
    	}

    	//transformer
    	$transformer = $this->transformer();
    	$this->transformer = new $transformer;
    }

    public function index($id=null, Request $request)
    {
    	$includes = $request->get('include');

		if(!$id) {
			$resource = $this->model->all();
			return $this->fractal
				->collection($resource, $this->transformer)
				->includes($includes)
				->get();
		}

		$resource = $this->model->find($id);
		return $this->fractal
			->item($resource, new $this->transformer)
			->includes($includes)
			->get();
    }
}
