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


}