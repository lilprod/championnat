<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\TypeAccreditation', 'type_accredition_id');
    }
}
