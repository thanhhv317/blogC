<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;

class PostController extends Controller
{
    public function getPostList()
    {
    	return view('admin.post.list');
    }
}
