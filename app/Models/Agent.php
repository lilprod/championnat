<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public function accreditation()
	{
	    return $this->belongsTo('App\Models\Accreditation');
    }
}
