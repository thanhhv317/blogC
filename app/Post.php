<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['id', 'title' 'content' 'author_id'];

    public function Comment()
    {
    	return $this->hasMany('App\Comment');
    }

    public function Image()
    {
    	return $this->hasMany('App\Image');
    }
}
