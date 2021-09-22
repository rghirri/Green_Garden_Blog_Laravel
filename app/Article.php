<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'published_at', 'image_list', 'image_banner'
    ];

    
}