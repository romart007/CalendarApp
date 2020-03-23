<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'sched_id';

    public $timestamps = false;

    protected $fillable = ['event_id', 'date', 'flag'];

    public function event()
    {
    	return $this->belongsTo(__NAMESPACE__ . '\\Event', 'event_id');
    }
}
