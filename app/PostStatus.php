<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostStatus extends Model
{
 	use SoftDeletes;

    protected $tablel = 'post_statuses';
    protected $fillable = ['id', 'post_id', 'status'];
    
    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function createPostStatus($post_id)
    {
    	$this->post_id = $post_id;
    	$this->status = 0;
    	$this->save();
    }

    public function setNewStatus($post_id, $status)
    {
    	return $this->where('post_id', '=', $post_id)
    		->update(['status' => $status]);
    }

    public function deletePostStatus($post_id)
    {
        return $this->where('post_id', '=', $post_id)
            ->delete();
    }
}
