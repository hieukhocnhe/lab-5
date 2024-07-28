<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'poster', 'intro', 'release_date', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Gene::class, 'genre_id');
    }
}
