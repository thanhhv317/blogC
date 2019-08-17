<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['id', 'title', 'content', 'author_id'];

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }

    public function image()
    {
    	return $this->hasMany('App\Image' );
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function createPost($title, $content, $author_id)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->save();
        return $this->id;
    }

    public function getAllData($id = null)
    {
        if($id == null)
            return $this->join('images', 'posts.id', 'images.post_id')->get();
        return $this->join('images', 'posts.id', 'images.post_id')->where('posts.id', $id)->first();
    }

    public function updateData($id, $title, $content)
    {
        return $this->where('id', $id)->update(['title' => $title, 'content' => $content]);
    }

    public function deleteData($id)
    {
        $this->where('id', $id)->delete();
    }

}
