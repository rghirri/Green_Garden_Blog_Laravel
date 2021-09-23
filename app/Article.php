<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

Use App\Tag;

use App\Category;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'published_at', 'image_list', 'image_banner', 'category_id'
    ];

    public function deleteImageList()
    {
        Storage::delete($this->image_list);    
    }

    public function deleteImageBanner()
    {
        Storage::delete($this->image_banner);    
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // article has one category
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class); // article has many tags
    }

     /**
     * Check if a post has a tag.
     * 
     * @return bool
     */

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}