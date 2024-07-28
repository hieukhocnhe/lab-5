<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->hasMany(Movie::class, 'genre_id');
    }
}
