<?php

namespace App\Models;

use App\Events\PostDeleted;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Events\PostCreated;

class Post extends Model
{
    use HasFactory;
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function tags(){
        return$this->belongsToMany('App\Models\Tag');
    }

}
