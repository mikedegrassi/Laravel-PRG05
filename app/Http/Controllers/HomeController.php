<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $title = "welcome";

        return view('home', compact('title'));
    }
}
