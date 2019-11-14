<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view("frontend.posts.index", ["posts"=>$posts]);
    }
    public function show(Post $post)
    {
     
        return view("frontend.posts.show", ["post"=>$post]);
    }
}
