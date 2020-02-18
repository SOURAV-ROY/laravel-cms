<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[

      'title', 'description', 'subtitle','image','published_at'
    ];
}
