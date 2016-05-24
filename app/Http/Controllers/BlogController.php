<?php

namespace FCLLA\Http\Controllers;

use FCLLA\Post;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;

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
            $posts = $this->posts->members()->latest->get();
            return view('frontend.blog.index', compact('posts'))
        }
        else {
            $posts = $this->posts->latest()->get();
            return view('frontend.blog.index', compact('posts'));
        }
    }

    public function view($post)
    {
        $post = $this->posts->findOrFail($post);
        return view('frontend.blog.view', compact('post'));
    }


}
