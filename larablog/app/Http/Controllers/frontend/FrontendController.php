<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class FrontendController extends Controller
{
    function index(){
        $category   =   Category::where('status','1')->get();
        $latest_post       =       Post::orderBy('created_at','DESC')->where('status','1')->get()->take(15);
        return view('frontend.index', compact('category','latest_post'));
    }
    
    function viewCategoryPost(string $category_slug){
        
        $category       =       Category::where('slug',$category_slug)->where('status','1')->first();
        if($category){
            $post       =       Post::where('category_id',$category->id)->where('status','1')->paginate(10);
            $latest_post       =       Post::orderBy('created_at','DESC')->where('status','1')->get()->take(5);
            return view('frontend.post.index',compact('category','post','latest_post'));
        }else{
            return redirect('/');
        }
    }

    function viewPost(string $category_slug, string $post_slug){

        $category       =       Category::where('slug',$category_slug)->where('status','1')->first();
        if($category){
            $post       =       Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','1')->first();
            $latest_post       =       Post::orderBy('created_at','DESC')->where('status','1')->get()->take(2);
            return view('frontend.post.view',compact('post','latest_post'));
        }else{
            return redirect('/');
        }
    }
    
}
