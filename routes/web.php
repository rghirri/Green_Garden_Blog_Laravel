<?php

use App\Http\Controllers\Blog\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FRONT END

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('blog/articles/{article}  ', [ArticlesController::class,'show'])->name('blog.show');

Route::get('blog/categories/{category}', [PostsController::class,'category'])->name('blog.category');

Route::get('blog/tags/{tag}', [PostsController::class,'tag'])->name('blog.tag');


// BACK END

Auth::routes();

Route::middleware(['auth'])->group(function ()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('articles', 'ArticlesController');

    Route::get('trashed-articles', 'ArticlesController@trashed')->name('trashed-articles.index');

    Route::put('restore-article/{article}', 'ArticlesController@restore')->name('restore-articles');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');

    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');

    Route::get('users', 'UsersController@index')->name('users.index');

    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');

    Route::post('users/{user}/make-writer', 'UsersController@makeWriter')->name('users.make-writer');
});