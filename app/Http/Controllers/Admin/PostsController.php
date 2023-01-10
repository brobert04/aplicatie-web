<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::orderByDesc('created_at')->paginate();
        return view('admin.posts.posts', compact('posts'));
    }
}
