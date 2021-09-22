<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Articles\CreateArticleRequest;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index')->with('articles', Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        // upload the image to storage
        // dd($request->image_file_list->store('articles/list'));
        // dd($request->image_file_banner);
        $image_list = $request->image_list->store('articles/list');
        $image_banner = $request->image_banner->store('articles/banner');
        // create the article
        Article::create([
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'published_at'  =>  $request->published_at,
            'image_list'    =>  $image_list,
            'image_banner'  =>  $image_banner
        ]);
        // flash message
        session()->flash('success', "Article $request->title created successfully");
        // redirect user
        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}