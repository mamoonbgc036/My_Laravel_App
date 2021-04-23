<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    Public function store(Request $request){
        $this->validate($request, [
            'body' => 'required',
        ]);

        auth()->user()->posts()->create([
            'body' => $request->body
        ]);

        return redirect()->route('post');
    }
}
