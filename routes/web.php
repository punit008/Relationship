<?php

use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Support\Facades\Route;

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


/**
 * 
 * 
 * 
 * 
 * */ 

Route::get('/one', function () {

    // One to One function

    $user = User::find(1);
    // to get the profile data through user table
    // return $user->profile;

    $profile = new Profile;
    $profile->address = "melbourne";
    $g = $user->profile()->save($profile);


    // One way to insert the data
    // $profile = new Profile;
    // $profile->address = "address";
    // $profile->user_id = 1;
    // $profile->save();
});

Route::get('/one_reverse', function () {
    // one to one reserve
        return Profile::find(1)->user;
});


Route::get('/one_to_many', function () {
    // one to many
    // $post = new Post;
    // $post->user_id = 2;
    // $post->name = "This is second post and second user";
    // $post->save();

    // $user = User::find(1);
    // dd($user->posts) ;

    //one to many reverse
    $posts = User::find(1);
    foreach($posts->posts as $post){
        echo $post->user;
    }

});

Route::get('/many_to_many', function () {
    // the migration file name or the table name should be a-z in order so p comes first then t , then create table post_tag and 
    // should not be plural

        // $post = new Post;
        // $post->name = "This is third post";
        // $post->user_id = 1;
        // $post->save();

        // One way to do it
        // $post->tags()->attach(1);

        // $tag = Tag::find(1);
        // $post->tags()->attach($tag);

        // $tagId1 = 1;
        // $tagId2 = 2;
        // $tagId3 = 3;
        // $post->tags()->attach([$tagId1,$tagId2,$tagId3]);


        $posts = Post::with('tags')->get();
        return $posts;


});
