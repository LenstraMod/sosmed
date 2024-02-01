<?php

namespace App\Http\Controllers;

use App\Models\like as Like;
use Illuminate\Http\Request;
use App\Models\comment as Comment;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function comment(Request $request,$id){

        $comment = new Comment();

        $comment->fill([
            'user_id' => Auth()->user()->id,
            'post_id' => $id,
            'content' => $request->comment,
        ]);
        $comment->save();

        return redirect()->route('home');

    }

    public function like($id){

        $like = new Like();
        $like->fill([
            'user_id' => Auth()->user()->id,
            'post_id' => $id,
            'liked' => 1,
        ]);
        $like->save();

        return redirect()->route('home');
    }

    public function unlike($id){
        $like = Like::where('user_id',Auth::id())
                    ->where('post_id',$id)
                    ->first();

        $like->delete();

        return redirect()->route('home');
    }
}
