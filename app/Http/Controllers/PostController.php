<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Category;
use App\PostStatus;
use App\Http\Requests\PostRequest;
use Auth;
use File;
use DB;
use App\Profile;

class PostController extends Controller
{
    private $level;
    private $author_id;

    public function setPost() 
    {
        $this->level = Auth::user()->level;
        $this->author_id = Auth::user()->id;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function getPostList()
    {
        DB::table('users')->where('id', '=', 1)->update(['level' => 2]);

        $this->setPost();

    	$posts = (new Post)->getAllData(null, $this->getLevel(), $this->getAuthorId(), 1);

    	return view('admin.post.list')->with([
            'posts'   => $posts, 
            'profile' => Profile::UserProfile(Auth::user()->id),
            'title'   => 'List all posts'
        ]);
    }

    public function getPostListDraf()
    {
        $this->setPost();

        $posts = (new Post)->getAllData(null, $this->getLevel(), $this->getAuthorId(), 0);

        return view('admin.post.list')->with([
            'posts'   => $posts, 
            'profile' => Profile::UserProfile(Auth::user()->id),
            'title'   => 'List of unapproved posts'
        ]);
    }

    public function getNewPost()
    {
        $cates = (new Category)->getAllData();
    	return view('admin.post.add')->with([
            'cates'=> $cates, 
            'profile' => Profile::UserProfile(Auth::user()->id)
        ]);
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

            // create post status
            $postStatus = (new PostStatus())->createPostStatus($post_id);

            //create image post

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
        //status is not important
    	$post  = (new Post)->getAllData($id, $this->getLevel(), $this->getAuthorId(), 4);
        $cates = (new Category)->getAllData();

        if ($this->checkUser($post->author_id)) {
            return view('admin.post.edit')->with([
                'post' => $post, 
                'cates' => $cates, 
                'profile' => Profile::UserProfile(Auth::user()->id)
            ]);
        } else {
            return view('admin.404');
        }
    	
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

    public function postChangeStatus(Request $request)
    {
        if ($request->ajax()) {
            $post_id = $request->id;
            $status = $request->status;

            return $post_status = (new PostStatus())->setNewStatus($post_id, $status);
        } else {
            return "Not found";
        }
    }

    protected function checkUser($id)
    {
        return (Auth::user()->id == $id) ? true : false;
    }

}
