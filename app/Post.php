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

}
