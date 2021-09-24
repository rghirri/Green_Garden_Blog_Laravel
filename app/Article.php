<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

Use App\Tag;

use App\Category;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = [
        'published_at'
    ];


    const EXCERPT_LENGTH = 100;

    protected $fillable = [
        'title', 'content', 'published_at', 'image_list', 'image_banner', 'category_id', 'user_id'
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

    public function excerpt()
    {
        return Str::limit($this->content, Article::EXCERPT_LENGTH);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }


    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) 
        {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");

    }


    
}