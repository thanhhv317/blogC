<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Profile;
use Auth;

class CommentController extends Controller
{
    public function sendComent(CommentRequest $request)
    {
    	if ($request->ajax()) {
    		$name 	 = $request->name;
    		$email 	 = $request->email;
    		$website = $request->website;
    		$message = $request->message;
    		$post_id = $request->post_id;

    		$comment = (new Comment)->createData($post_id, $message, $name, $email, $website);

    		return $comment;
    	}
    }

    public function getCommentWaitList()
    {
        return $this->actionController(0, 'Comments are pending approval');
    }

    public function getCommentAvailabilityList()
    {
        return $this->actionController(1, 'Comments are Availability');
    }

    public function getCommentSpamList()
    {
        return $this->actionController(2, 'Comments are spam');
    }

    public function actionController($status, $titlePage)
    {
        $comments = (new Comment())->getComment($status);
        return view('admin.comments.wait-approval')
            ->with([
                'comments' => $comments, 
                'profile' => Profile::UserProfile(Auth::user()->id),
                'title' => $titlePage
            ]);
    }

    public function postEditStatusComment(Request $request)
    {
        if ($request->ajax()) {
            return (new Comment)->updateStatus($request->id, $request->status);
        } else {
            return "404 file not found";
        }
    }
}
