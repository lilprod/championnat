<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inscription extends Model
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
                'source' => 'nom_media'
            ]
        ];
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
        return $this->belongsTo('App\Models\Srade');
    }
}
