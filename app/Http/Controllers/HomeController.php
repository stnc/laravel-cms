<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


use App\Models\A_books;
use App\Models\User;
use App\Models\Comments;
use App\Models\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $books = A_books::all();

//https://www.okuoku.com/urun/listele/yeni-cikanlar/2/sirala/2
//https://www.bkmkitap.com/?fbclid=IwAR3juR2qj7_IgHvDCyEqD4oEq7JNUaJgFNLmeOCBn4aRKchxE33wW83EoDM


         $books= Cache::remember('books3', 22*60, function() {
                    return A_books::take(5000) ->get();
        });
     //  $books = A_books::take(5000) ->get();

/*
$posts =A_books::take(2000) ->get();
 Redis::setex('posts.all2', 60 * 60 * 24, $posts);
 $books = Redis::get("posts.all2");
*/

/*
    $books2 = A_books::take(250) ->get();
        if (Cache::has('books2')){
            $books=  Cache::get('books2');
        } else {
            $books=  Cache::put('books2', $books2, 10);
        }
*/


     //   $categories = Categories::orderBy('name', 'desc')->get();

        $categories= Cache::remember('cat', 22*60, function() {
            return Categories::orderBy('name', 'desc')->get();
        });


        return view('home.show', compact('books', "tags", 'categories'));

    }
}
