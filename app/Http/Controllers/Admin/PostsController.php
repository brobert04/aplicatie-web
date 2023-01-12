<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        if (request('autor')){
            $user = User::find(request('autor'));
            $posts = Posts::where('user_id', request('autor'))->orderByDesc('created_at')->paginate();
            return view('admin.posts.author-page')->with(['user' => $user, 'posts' => $posts]);
            // return $user;
        }
        $posts = Posts::orderByDesc('created_at')->paginate();
        return view('admin.posts.posts', compact('posts'));
    }
}
