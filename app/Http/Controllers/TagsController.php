<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Tags\CreateTagRequest;

use App\Http\Requests\Tags\UpdatesTagsRequest;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        // Store category to database
        Tag::create([
            'name' => $request->name
        ]);

        // Add flash message
        session()->flash('success', "Tag $request->name Added Successfuly");

        // Redirect page
        return redirect(route('tags.index'));

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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesTagsRequest $request, Tag $tag)
    {
        // Update category in database
        $tag->update([
            'name' => $request->name
        ]);

        // Add flash message
        session()->flash('success', 'Tag Updated Successfuly');

        // Redirect page
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // check if tag is associated with a post
        if ($tag->articles->count() > 0)
        {
            session()->flash('error', 'Tag cannot be deleted, because it is associated with some posts.');

            return redirect()->back(); 
        }

         // Delete category from database
         $tag->delete();

         // Store category name is session variable

        // $category_name = session()->put('category_name', 'cooking');

        // Add flash message
        session()->flash('success', "Tag $tag->name was deleted successfully");

        // Redirect page
        return redirect(route('tags.index'));
    }
}