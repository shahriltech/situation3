<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

	protected $fillable = [
        'name', 'attend','leave_type',
    ];
	
   public function ron()
	{
		return $this->belongsTo(Ron::class);
	}
}
