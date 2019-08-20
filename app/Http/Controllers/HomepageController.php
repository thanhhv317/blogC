<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomepageController extends Controller
{
    public function getHome()
    {
        $top2 = (new Post)->getTop2();
        $recent_post = (new Post)->getRecentPost();
        $left_post = (new Post)->getOrthePost(1,5);
        $top4Comment = (new Comment)->top4Comment();
        $cate = (new Post)->getTotalByCategory();

        $data = [];
        foreach ($top4Comment as $value) {
            $data [] = $value->post_id;
        }

        $most_read = (new Post)->getMostRead($data);
        $featured_post = (new Post)->getOrthePost(2,3);
        $orther_post = (new Post)->getOrthePost(3,4);


    	return view('homepage.home')->with([
            'recent_post' => $recent_post, 
            'cate' => $cate,
            'top2' => $top2,
            'left_post' => $left_post,
            'most_read' => $most_read,
            'featured_post' => $featured_post,
            'orther_post' => $orther_post
        ]);
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
        $post_id = $post->id;

        $comment = (new Comment())->getDataByPostId($post_id);

    	return view('homepage.blog-post')->with([
            'post' => $post,
            'comment' =>$comment
        ]);
    }

    public function getAboutMe()
    {
        return view('homepage.about-me');
    }
}
