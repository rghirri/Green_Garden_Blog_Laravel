<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title', 'content', 'published_at', 'image_file_list', 'image_file_banner'
    ];

    
}