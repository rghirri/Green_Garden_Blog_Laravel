<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articles\CreateArticleRequest;

use App\Http\Requests\Articles\UpdateArticleRequest;


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
    public function edit(Article $article)
    {
        return view('articles.create')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // get all form data
        $data = $request->all(['title', 'content', 'published_at']);

        // check if new image
        if ($request->hasFile('image_list')){
        // upload it
        $image_list = $request->image_list->store('articles/list');
        // delete previus image
        $article->deleteImageList();

        // save image
        $data['image_list'] = $image_list;
       }

       // check if new image
       if ($request->hasFile('image_banner')){

       // upload it
       $image_banner = $request->image_banner->store('articles/banner');

       // delete previus image
       $article->deleteImageBanner();

       // save image
       $data['image_banner'] = $image_banner;
      }
       
       
        // update attributes
        $article->update($data);

        // flash message
        session()->flash('success', 'Article updated successfully');
        // redirect user
        return redirect(route('articles.index'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::withTrashed()->where('id', $id)->firstOrFail();

        if($article->trashed()){
            // delete old image by calling method in Post Model
            $article->deleteImageList();
            $article->deleteImageBanner();
            // delete post
            $article->forceDelete();
            // flash message
            session()->flash('success', 'Post deleted successfully');
            // redirect user
            return redirect('/trashed-articles');
        }else
        {
            $article->delete();
            // flash message
            session()->flash('success', 'Article trashed successfully');
            // redirect user
            return redirect(route('articles.index'));
        }

    }

    /**
     * Display a list of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
        
        $trashed = Article::onlyTrashed()->get();

        return view('articles.index')->withArticles($trashed);
    }

    /**
     * Restores trashed post.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // Find Post
        $article = Article::withTrashed()->where('id', $id)->firstOrFail();
        // Restore Post
        $article->restore();
        // flash message
        session()->flash('success', 'Article restored successfully');
        // redirect user
        return redirect(route('articles.index'));

    }
}