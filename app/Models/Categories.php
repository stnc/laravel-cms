<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = array();
    protected $table = "posts_categories";

    public function books()
    {
        return $this->belongsToMany(A_books::class, 'posts_categories_relations',  'category_id','post_id' )
        ->withTimestamps();
    }
    }

