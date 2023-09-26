<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function test(){
        return view('posts/test');
    }
    
    public function index(Post $post){
        
        return view('posts/index')->with(['posts'=> $post -> get()]);
    } 
    
    public function show(Post $post){
        
        return view('posts/show')->with(['post'=>$post]);
    }
    
    public function create(){
        
        return view('posts/create');
    }
    
    public function store(PostRequest $request,Post $post){
        $input=$request['post'];
        $post->fill($input)->save();
        
        return redirect('/index');
    }
}
