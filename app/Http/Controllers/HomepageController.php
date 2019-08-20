<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomepageController extends Controller
{
    public function getHome()
    {
        $recent_post = (new Post)->getRecentPost();

        $cate = (new Post)->getTotalByCategory();

    	return view('homepage.home')->with(['recent_post' => $recent_post, 'cate' => $cate]);
    }

    public function getCategory()
    {
    	return view('homepage.category');
    }

    public function getContact()
    {
    	return view('homepage.contact');
    }

    public function getBlogPost($slug)
    {
        $post = (new Post)->getBlogPost($slug);

    	return view('homepage.blog-post')->with('post', $post);
    }

    public function getAboutMe()
    {
        return view('homepage.about-me');
    }
}
