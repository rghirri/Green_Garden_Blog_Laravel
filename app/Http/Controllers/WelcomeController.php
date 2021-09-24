<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection\published;

use App\Article;

use App\Category;

use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('articles', Article::paginate(4));
    }

}