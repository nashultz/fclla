<?php

namespace FCLLA\Http\Controllers;

use FCLLA\Post;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        if(Auth::check()) {
            $posts = $this->posts->latest()->get();
            return view('frontend.blog.index', compact('posts'));
        }
        else {
            $posts = $this->posts->guests()->latest()->get();
            return view('frontend.blog.index', compact('posts'));
        }
    }

    public function view($slug)
    {
        $post = $this->posts->findOrFail($slug);
        return view('frontend.blog.view', compact('post'));
    }

    public function addpost()
    {
        return view('frontend.blog.posts.addpost');
    }


}
