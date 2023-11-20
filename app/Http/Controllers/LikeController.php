<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
        
    public function like(Post $post)
    {
        $like=new Like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->save();
        
        
        return redirect('/posts/index');
    }
    
    public function unlike(Post $post)
    {
        $post->like()->where('user_id','=',Auth::user()->id)->delete();
        
        return redirect('/posts/index');
    }
    
        public function like_in_show(Post $post)
    {
        $like=new Like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->save();
        
        
        return view('posts/show')->with(['post'=>$post]);
    }
    
    public function unlike_in_show(Post $post)
    {
        $post->like()->where('user_id','=',Auth::user()->id)->delete();
        
        return view('posts/show')->with(['post'=>$post]);
    }
}
