<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        return view('forum.index', [
            'posts' => Post::latest()->paginate(25)->withQueryString()
        ]);
    }

    public function create(){
        return view('forum.create');
    }

    public function show(Post $post){
        return view('forum.post', [
            'post' => $post
        ]);
    }
}
