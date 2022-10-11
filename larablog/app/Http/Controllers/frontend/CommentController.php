<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function saveComment(Request $request){

        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'comment' => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->with('message','Comment Field is required');
            }
            $comment    =  new Comments ;
    
            $comment->user_id       =       Auth::user()->id;
            $comment->comments      =       $request->comment;
            $comment->post_id       =       $request->post;
            $comment->save();
            return redirect()->back()->with('message','Comment Added Successfully');
        }else{
            return redirect('login')->with('message','Login first to comment');
        }    
    }
    function destroy(Request $request){
        $id    =   $request->input('id');
        if($id){
            $comment    =    Comments::find($id);
            $delete   =   $comment->delete();
            if($delete){
                return response(array('status'=>true));
            }
        }
    }
}
