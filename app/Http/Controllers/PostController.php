<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=> $post ->orderBy('updated_at','DESC')->get()]);
    } 
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post'=>$post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(PostRequest $request,Post $post)
    {
        $input=$request['post']+['user_id'=>auth()->id()]+['expired_at'=>Carbon::now()->addHours(24)];
        $post->fill($input)->save();
        
        return redirect('posts/index');
    }
    
     public function edit(Post $post)
    {
        return view('posts/edit')->with(['post'=>$post]);
    }

    public function update(PostRequest $request,Post $post)
    {
        $input=$request['post']+['user_id'=>auth()->id()];
        $post->fill($input)->save();

        return view('posts/show')->with(['post'=>$post]);
    }
    
    public function delete(Post $post)
    {
        $post->like()->delete();
        $post->delete();
        return redirect('posts/index');
    }

}
