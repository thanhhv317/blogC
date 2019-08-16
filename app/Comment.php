<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $tablel = 'commets';
    protected $fillable = ['id', 'post_id' ,'content', 'user_name', 'user_email', 'status'];
    
    public function Post()
    {
    	return $this->belongsTo('App\Post');
    }

}
