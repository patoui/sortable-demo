<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Sort results and return json response
        return Post::sort(request())->get();
    }
}
