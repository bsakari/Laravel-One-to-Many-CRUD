<?php

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

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'Post title','body'=>'Body for title']);

    $user->posts()->save($post);

});



Route::get('/read', function () {
    $user = User::findOrFail(1);
    foreach ($user->posts as $post){
        echo $post->title.' '.$post->body.'<br>';
    }

});


Route::get('/update', function () {
    $user = User::findOrFail(1);
    //You can find where any column in posts
    $user->posts()->whereId(1)->update(['title'=>'Updated title 1','body'=>'Updated title 1 body']);


});


Route::get('/delete', function () {
    $user = User::findOrFail(1);
    //You can find where any column in posts
    $user->posts()->whereId(5)->delete();


});
