<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{	
	protected $primaryKey = 'event_id';

	protected $fillable = ['name'];

	public $timestamps = false;

    public function schedule()
    {
    	return $this->hasMany(__NAMESPACE__ . '\\Schedule', 'event_id', 'event_id');
    }
}
