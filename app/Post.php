<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model

{
    use SoftDeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [

        'title', 'description', 'subtitle', 'image', 'published_at', 'category_id', 'user_id'
    ];

    /**
     * Delete Image From Storage
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Check if post has tag
     * @param $tagId
     * @return bool
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//****************************PUBLISHED AT TIME *********************************
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

//******************************* SEARCH ****************************************
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }
}
