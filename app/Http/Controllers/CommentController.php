<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function add(Request $request,$product_id){
    //  return $request->all();
        $comment=new Comment;
        $comment->comment=$request->comment;
        $comment->rating=$request->rating;
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->product_id=$product_id;
        $comment->save();

        return redirect()->back()->with(['status' => 'Comment Added successfully']);
    }
}
