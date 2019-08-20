<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Comment extends Model
{
    use SoftDeletes;

    protected $tablel = 'comments';
    protected $fillable = ['id', 'post_id' ,'content', 'user_name', 'user_mail', 'status', 'website'];
    
    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function createData($post_id, $content, $user_name, $user_mail, $website)
    {
    	$this->post_id    = $post_id;
    	$this->content    = $content;
    	$this->user_name  = $user_name;
    	$this->user_mail  = $user_mail;
    	$this->website    = $website;
    	$this->status     = 0;
    	$this->save();
    	return $this->id;
    }

    public function getComment($status)
    {
        return $this->join('posts', 'posts.id', '=', 'comments.post_id')
        ->where('status', '=', $status)
        ->select(
            'comments.id',
            'comments.user_name',
            'comments.user_mail',
            'comments.website',
            'comments.content',
            'comments.status',
            'comments.post_id',
            'posts.slug'
        )
        ->get();
    }

    public function updateStatus($id, $status)
    {
        return $this->where('id', '=', $id)
            ->update(['status' => $status]);
    }

    public function getDataByPostId($post_id)
    {
        return $this->where('post_id', '=', $post_id)
            ->where('status', '=', 1)->get();
    }

    public function top4Comment()
    {
        return $this->where('status', '=', 1)->select('post_id', DB::raw('count(*) AS total'))->groupBy('post_id')->orderBy('total', 'DESC')->skip(0)->take(4)->get();
    }

}
