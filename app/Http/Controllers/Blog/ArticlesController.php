<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

use App\Category;

use App\Tag;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        return view('blog.show')->with('article', $article);
    }

    public function category(Category $category)
    {
        return view('blog.category')
        ->with('category', $category)
        ->with('articles', $category->articles()->searched()->simplePaginate(3))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')
        ->with('tag', $tag)
        ->with('articles', $tag->articles()->searched()->simplePaginate(3))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

}