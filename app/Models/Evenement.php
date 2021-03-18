<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Evenement extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function ville()
    {
        return $this->belongsTo('App\Models\Ville');
    }

    public function stade()
    {
        return $this->belongsTo('App\Models\Stade');
    }

    public function journee()
    {
        return $this->belongsTo('App\Models\Journee');
    }

    public function inscriptions()
    {
        return $this->hasMany('App\Models\Inscription');
    }
}
