<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model

{
    use SoftDeletes;

    protected $fillable = [

        'title', 'description', 'subtitle', 'image', 'published_at'
    ];

    /**
     * Delete Image From Storage
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
