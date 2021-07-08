<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Accreditation extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\TypeAccreditation', 'type_accreditation_id');
    }

    public function media()
    {
        return $this->belongsTo('App\Models\Media');
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
    
    public function agent()
    {
        return $this->hasOne('App\Models\Agent');
    }

    public function scopePending($query)
    {
        return $query->where('status', 0)->whereDate('date_match', '>' , Carbon::now()->toDateString()); 
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)->whereDate('date_match', '>' , Carbon::now()->toDateString()); 
    }

    public function scopeArchived($query)
    {
        return $query->whereDate('date_match', '<' , Carbon::now()->toDateString()); 
    }

    // public function scopeNotactive($query)
    // {
    //     return $query->where('is_active', 0); 
    // }
}
