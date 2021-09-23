<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'published_at', 'image_list', 'image_banner'
    ];

    public function deleteImageList()
    {
        Storage::delete($this->image_list);    
    }

    public function deleteImageBanner()
    {
        Storage::delete($this->image_banner);    
    }
}