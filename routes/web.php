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
//https://www.easylaravelbook.com/blog/creating-a-hasmany-relation-in-laravel-5/
//https://itsolutionstuff.com/post/laravel-5-ajax-crud-with-pagination-example-and-demo-from-scratchexample.html   //ajax
//https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
//https://martinbean.co.uk/blog/2014/07/04/re-using-controllers-for-admin-and-non-admin-routes-in-laravel/
//https://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html
use App\Posts;
use App\PostsCategories;
use App\PostTags;
use App\PostsComments;

Route::get('/', function () {

    redirect()->route('posts.index');

    die;
    $task = new Posts;
    $task->post_title = 'ishak Walk the dog';
    $task->post_content = 'ishak Walk Barky the Mutt';
    $task->post_author = '1';
    $task->post_status = '1';
    $task->post_order = '1';
    $task->save();

    $category = new PostsCategories(['name' => 'ishak selman cat']);


    $tags = new PostTags(['name' => 'ishak new tag']);
    // $Comments = new PostsComments(['comment_content' => 'yeni yorumum']);

    $task->categories()->save($category);
    // $task->Comments()->save($Comments);
    $task->tags()->save($tags);

    $list = Posts::find(1);
    $categories = [
        new PostsCategories(['name' => 'Vacation']),
        new PostsCategories(['name' => 'Tropical']),
        new PostsCategories(['name' => 'Leisure']),
    ];

    $list->categories()->saveMany($categories);

    $list->categories()->attach([7, 6]);//kategoriye 7 ve 6 da bağlıyor
//    $list->categories()->attach(5);

});

Route::resource('companies', 'CompaniesController');



// admin routes http://www.w3programmers.com/laravel-route-groups/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

  /*  Route::get('get', [
        'uses' => 'PostsController@index'
    ]);
*/
    Route::resource('posts','PostsController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
