<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function test(){
        return view('posts/test');
    }
    
    public function index(Post $post){
        
        return view('posts/index')->with(['posts'=> $post ->orderBy('updated_at','DESC')->get()]);
    } 
    
    public function show(Post $post){
        
        return view('posts/show')->with(['post'=>$post]);
    }
    
    public function create(){
        
        return view('posts/create');
    }
    
    public function store(Request $request,Post $post){
        
        $input=$request['post']+['user_id'=>auth()->id()]+['expired_at'=>Carbon::now()->addHours(24)];
        $post->fill($input)->save();
        
        return redirect('/index');
    }
}
