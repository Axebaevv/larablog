<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'body', 'featured_image', 'slug', 'meta_title', 'meta_description', 'status', 'user_id'];
    // Creating for category
    public function category(){
        return $this->belongsToMany(Category::class, 'blogs_categories', 'blog_id', 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
