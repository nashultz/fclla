<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function join()
    {
        return view('frontend.join');
    }


}

