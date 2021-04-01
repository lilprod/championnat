<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\TypeAccreditation', 'type_accreditation_id');
    }

    public function evenement()
    {
        return $this->belongsTo('App\Models\Evenement');
    }

    public function ville()
    {
        return $this->belongsTo('App\Models\Ville');
    }

    public function journee()
    {
        return $this->belongsTo('App\Models\Journee');
    }

    public function stade()
    {
        return $this->belongsTo('App\Models\Stade');
    }
}
