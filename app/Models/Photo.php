<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $casts = [
        'photos' => 'array'
    ];

//    public function photo_path()
//    {
//        if ($this->photo) {
//            return asset('storage/photo/' . $this->photo);
//        }
//        return "No Photo";
//
//    }
    public function content(){
        return $this->belongsTo(Content::class);
    }
}
