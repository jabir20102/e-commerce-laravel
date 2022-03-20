<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function add(Request $request){
        // return $request->all();
            $comment=new Comment;
            $comment->comment=$request->comment;
            $comment->rating=$request->rating;
            $comment->name=$request->name;
            $comment->email=$request->email;
            $comment->product_id=$request->product_id;
            $comment->save();
    
            return response()
            ->json(['message' => 'thanks for review'], 200);
}
}
