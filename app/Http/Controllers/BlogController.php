<?php

namespace FCLLA\Http\Controllers;

use FCLLA\Http\Requests\CreatePostRequest;
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
        $post = $this->posts->where('slug',$slug)->first();
        return view('frontend.blog.view', compact('post'));
    }

    public function newpost()
    {
        return view('frontend.blog.posts.addpost');
    }

    public function addpost(CreatePostRequest $request)
    {
        $data = $request->all();
        $data['author'] = Auth::user()->name;
        dd($data['author']);
        $data['slug'] = str_slug($data['title'], '-');
        $this->posts->create($data);

        flash()->success('Post was created successfully!');

        return redirect()->route('blogindex');
    }


}
