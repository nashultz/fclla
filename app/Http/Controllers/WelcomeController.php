<?php

namespace FCLLA\Http\Controllers;


class WelcomeController extends Controller
{
    public function show()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }
}