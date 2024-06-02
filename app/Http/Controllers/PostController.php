<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //index
    public function index() : string {
        $post = Cache::remember('posts',60*60,function () { 
        
        return Post::all();
        });

        return response($post,200);
        
    }

public function create(Request $req) : string {
        $post  = Post::create($req->all());
        return response($post,200);
    }
}
