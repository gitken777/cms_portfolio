<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {


        return view('welcome')->with('posts', Post::paginate(4))->with('categories', Categories::all())->with('tags', Tag::all());
    }

    public function showpost(Post $post)
    {
        return view('showpost')->with('posts', $post)->with('categories', Categories::all())->with('tags', Tag::all());
    }


}
