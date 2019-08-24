<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomepageController extends Controller
{
    public function getHome()
    {
        $top2        = (new Post)->getTop2();
        $recent_post = (new Post)->getRecentPost();
        $left_post   = (new Post)->getOrthePost(1, 0, 5, null);
        $top4Comment = (new Comment)->top4Comment();
        $cate        = (new Post)->getTotalByCategory();

        $data = [];
        foreach ($top4Comment as $value) {
            $data [] = $value->post_id;
        }

        $most_read     = (new Post)->getMostRead($data);
        $featured_post = (new Post)->getOrthePost(2, 0, 3, null);
        $orther_post   = (new Post)->getOrthePost(3, 0, 4, null);


    	return view('homepage.home')->with([
            'recent_post'   => $recent_post, 
            'cate'          => $cate,
            'top2'          => $top2,
            'left_post'     => $left_post,
            'most_read'     => $most_read,
            'featured_post' => $featured_post,
            'orther_post'   => $orther_post
        ]);
    }

    public function getCategory($category)
    {
        $posts = (new Post)->getOrthePost(null, 0, 7, $category);
        $data = [];

        // Most Post
        $top4Comment = (new Comment)->top4Comment();
        foreach ($top4Comment as $value) {
            $data [] = $value->post_id;
        }
        $most_read = (new Post)->getMostRead($data);

        $cate = (new Post)->getTotalByCategory();
    	return view('homepage.category')->with([
            'cate'      => $cate,
            'most_read' => $most_read,
            'posts'     => $posts
        ]);
    }

    public function getContact()
    {
    	return view('homepage.contact');
    }

    public function getBlogPost($slug)
    {
        // Most Post
        $top4Comment = (new Comment)->top4Comment();

        $data = [];
        foreach ($top4Comment as $value) {
            $data [] = $value->post_id;
        }
        $most_read = (new Post)->getMostRead($data);
        
        $cate = (new Post)->getTotalByCategory();
        $post = (new Post)->getBlogPost($slug);
        $post_id = $post->id;

        $comment = (new Comment())->getDataByPostId($post_id);

    	return view('homepage.blog-post')->with([
            'post'      => $post,
            'cate'      => $cate,
            'most_read' => $most_read,
            'comment'   => $comment
        ]);
    }

    public function getAboutMe()
    {
        // Most Post
        $top4Comment = (new Comment)->top4Comment();
        $data = [];
        foreach ($top4Comment as $value) {
            $data [] = $value->post_id;
        }
        $most_read = (new Post)->getMostRead($data);

        return view('homepage.about-me')->with([
            'most_read' => $most_read
        ]);
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $cate = $request->cate;
            $post = (new Post)->getOrthePost($cate, $skip, 4, null);
            if (count($post) > 0) {
                $link = '' . url('uploads/posts');
                return $data = ['link' => $link, 'post' => $post];
            } else {
                return 0;
            }
        } else {
            return "404 not found";
        }
    }

    public function searchPost(Request $request)
    {
        $name = $request->title;
        $title = str_slug($name);

        $post = (new Post())->getSearchPost($title);

        return view('homepage.search')->with([
            'name' => $name,
            'post' => $post
        ]);
    }

}
