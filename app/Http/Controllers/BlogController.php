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
        $posts = $this->posts->latest()->get();
        return view('frontend.blog.index', compact('posts'));
    }

    public function view($post)
    {
        $post = $this->posts->findOrFail($post);
        dd($post);
        return view('frontend.blog.view', compact('post'));
    }


}
