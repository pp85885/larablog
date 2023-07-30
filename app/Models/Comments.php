<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table   =    'Comments';
    protected $fillable    =   [
        'post_id',
        'user_id',
        'comments',
    ];

    function post(){
        return $this->belongsTo(Post::class, 'post_id','id');
    }
    function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
