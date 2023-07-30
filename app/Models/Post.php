<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table   =   'posts';
    protected $fillable  =   [
        'category_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by'
    ];
    function category(){
       return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    function comments(){
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }
}
