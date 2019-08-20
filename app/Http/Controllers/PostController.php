<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Category;
use App\Http\Requests\PostRequest;
use Auth;
use File;
use DB;
use App\Profile;

class PostController extends Controller
{
    public function getPostList()
    {
    	$posts = (new Post)->getAllData();

    	// echo "<pre>";
    	// print_r($posts);
    	// echo "</pre>";
    	return view('admin.post.list')->with(['posts' => $posts, 'profile' => Profile::UserProfile(Auth::user()->id)]);
    }

    public function getNewPost()
    {
        $cates = (new Category)->getAllData();
    	return view('admin.post.add')->with(['cates'=> $cates, 'profile' => Profile::UserProfile(Auth::user()->id)]);
    }

    public function postNewPost(PostRequest $request)
    {
    	DB::beginTransaction();
        try {
	    	$title     = $request->title;
	    	$content   = $request->content;
	    	$author_id = Auth::user()->id;
            $category  = $request->category;
	    	$attachment= $request->file('attachment');

	    	$post_id = (new Post())->createPost($title, $content, $author_id, $category);

	    	$file_name = $attachment->getClientOriginalName();
	        $attachment->move(public_path('/uploads/posts'), $file_name);
	        $image = (new Image())->createImage($post_id, $file_name);

	        DB::commit();
            return redirect()->route('admin.post');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function getEditPost($id)
    {
    	$post  = (new Post)->getAllData($id);
        $cates = (new Category)->getAllData();
    	return view('admin.post.edit')->with(['post' => $post, 'cates' => $cates, 'profile' => Profile::UserProfile(Auth::user()->id)]);
    }

    public function postEditPost($id, Request $request)
    {
    	DB::beginTransaction();
        try {
	    	$id 	   = $id;
	    	$title     = $request->title;
	    	$content   = $request->content;
            $category  = $request->category;

	    	$post = (new Post)->updateData($id, $title, $content, $category);
	    	
	    	if ($attachment = $request->file('attachment')) {
	    		$image_name = (new Image)->deleteData($id);
	    		$this->delImageAtHost($image_name->image);
	    		$file_name  = $attachment->getClientOriginalName();
		        $attachment->move(public_path('/uploads/posts'), $file_name);
		        $image = (new Image())->createImage($id, $file_name);
	    	}  

	    	DB::commit();
            return redirect()->route('admin.post');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delImageAtHost($image)
    {
        $image_path = public_path('/uploads/posts/') . $image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }

    public function DeleteEditPost(Request $request)
    {
    	if ($request->ajax()) {
    		$id = $request->post_id;
    		DB::beginTransaction();
    		try {
    			$post 		= (new Post)->deleteData($id);
    			$image_name = (new Image)->deleteData($id);
    			$this->delImageAtHost($image_name->image);

    			DB::commit();
            	return 1;
    		} catch (Exception $e) {
            	DB::rollBack();
        	}
    	} else {
    		echo "Not found";
    	}
    }
}
