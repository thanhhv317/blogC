<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';
    protected $fillable = ['id', 'post_id'. 'image'];

    public function Post()
    {
    	return $this->belongsTo('App\Post');
    }
}
