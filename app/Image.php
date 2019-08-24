<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{

    protected $table = 'images';
    
    protected $fillable = ['id', 'post_id', 'image'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function createImage($post_id, $image)
    {
    	$this->post_id = $post_id;
    	$this->image = $image;
    	$this->save();
    	return $this->id;
    }

    public function deleteData($post_id)
    {
        $name = $this->select('image')->where('post_id', $post_id)->first();
        $this->where('post_id', $post_id)->delete();
        return $name;
    }

}
