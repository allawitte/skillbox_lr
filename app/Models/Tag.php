<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud(){
        return (new static)->has('posts')->get();
    }
}
