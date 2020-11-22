<?php

namespace App\Models;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
    public $guarded = ['tags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function setTags($tags){
            $postTags = $this->tags->keyBy('name');
            $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
            $tagsToAttach = $tags->diffKeys($postTags);
            foreach ($tagsToAttach as $tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $syncIds[] = $tag->id;
            }
        $this->tags()->sync($syncIds);
    }

}
