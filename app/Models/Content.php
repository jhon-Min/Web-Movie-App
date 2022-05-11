<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $with=['genres','photos'];
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function photos(){
        return $this->hasMany(Photo::class);
    }
    public function poster_path()
    {
        if ($this->poster) {
            return asset('storage/poster/' . $this->poster);
        }


    }
}
