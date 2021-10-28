<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {
    return view('posts',[
        'posts' => Post::latest()->get()//get the latest created posts at the top

         //'posts' => Post::with('category')->get() //show post due to oldest ones
        ]);




});

//Route::get('posts/{post}', function ($id) {
//    return view('post',['post' => Post::findOrFail($id)]);
//
//});

//Route Model Binding
Route::get('posts/{post:slug}', function (Post $post) {
    return view('post',['post' => $post]);

});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts',[
        'posts' => $category-> posts
    ]);

});
//})-> where ('post', '[A-z_\-]+');
Route::get('authors/{author:username}', function (User $author) {
    return view('posts',[
        'posts' => $author-> posts
    ]);

});







