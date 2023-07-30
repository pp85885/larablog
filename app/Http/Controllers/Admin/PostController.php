<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Str;

class PostController extends Controller
{
    public function index(){
        $post_list      =       Post::all();
        return view('admin.post.index', compact('post_list'));
    }
    function add(){
        $category   =       Category::where('status','1')->get();
        return view('admin.post.add',compact('category'));
    }
    function savePost(PostFormRequest $request){
        $data       =       $request->validated();
        $post       =       new Post;

        $post->name             =   $data['name'];
        $post->category_id      =   $data['category_id'];
        $post->slug             =   Str::slug($data['slug']);
        $post->description      =   $data['description'];
        $post->yt_iframe        =   $data['yt_iframe'];
        $post->meta_title       =   $data['meta_title'];
        $post->meta_keyword     =   $data['meta_keyword'];
        $post->meta_description =   $data['meta_description'];
        $post->status           =   $request->status == 'on'? '1':'0';
        $post->created_by       =   Auth::user()->id;

        $post->save();
        return redirect('admin/posts')->with('message','Post Added Successfully');
    }
    function editPost($id){
        $category   =       Category::where('status','1')->get();
        $post_info  =       Post::find($id);
        return view('admin.post.edit', compact('post_info','category'));
    }
    function update($id, PostFormRequest $request){
        $data   =   $request->validated();
        $post   =   Post::find($id);

        $post->name             =   $data['name'];
        $post->category_id      =   $data['category_id'];
        $post->slug             =   $data['slug'];
        $post->description      =   $data['description'];
        $post->yt_iframe        =   $data['yt_iframe'];
        $post->meta_title       =   $data['meta_title'];
        $post->meta_keyword     =   $data['meta_keyword'];
        $post->meta_description =   $data['meta_description'];
        $post->status           =   $request->status == true ? '1':'0';

        $post->update();
        return redirect('admin/posts')->with('message','Post Updated Successfully');
    }

    function destroy($id){
        $post = Post::find($id);
        if($post){
            $post->delete();
            return redirect('admin/posts')->with('message','Post Deleted Successfully');
        }else{
            return redirect('admin/posts')->with('message','Post ID not Found');
        }

        //Post::where('id', $id)->delete();         // another way to delete post perticular ID
        
    }
}
