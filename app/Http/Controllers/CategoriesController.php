<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateCategoryRequest;

use App\Http\Requests\Categories\UpdateCategoriesRequest;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        // Store category to database
        Category::create([
            'name' => $request->name
        ]);

        // Add flash message
        session()->flash('success', "Category $request->name Added Successfuly");

        // Redirect page
        return redirect(route('categories.index'));

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
    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        // Update category in database
        $category->update([
            'name' => $request->name
        ]);

        // Add flash message
        session()->flash('success', 'Category Updated Successfuly');

        // Redirect page
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // check if category is associated with a post
        if ($category->articles->count() > 0)
        {
            session()->flash('error', 'Category cannot be deleted because is has some post.');

            return redirect()->back(); 
        }
         // Delete category from database
         $category->delete();

         // Store category name is session variable

        // $category_name = session()->put('category_name', 'cooking');

        // Add flash message
        session()->flash('success', "Category $category->name was deleted successfully");

        // Redirect page
        return redirect(route('categories.index'));
    }
}