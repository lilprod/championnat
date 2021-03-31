<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAccreditation extends Model
{
    use HasFactory;

    public function accreditations()
    {
        return $this->hasMany('App\Models\Accreditation');
    }
}
