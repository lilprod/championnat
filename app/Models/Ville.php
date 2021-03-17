<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    public function stages()
    {
        return $this->hasMany('App\Models\Stade');
    }

    public function evenements()
    {
        return $this->hasMany('App\Models\Evenement');
    }
}
