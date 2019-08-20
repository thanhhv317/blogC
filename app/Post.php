<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['id', 'title', 'content', 'category_id', 'slug', 'author_id'];

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

    public function createPost($title, $content, $author_id, $category_id)
    {
        $this->title       = $title;
        $this->content     = $content;
        $this->author_id   = $author_id;
        $this->slug        = str_slug($title);
        $this->category_id = $category_id;
        $this->save();
        return $this->id;
    }

    public function getAllData($id = null)
    {
        if($id == null)
            return $this->join('images', 'posts.id', 'images.post_id')->get();
        return $this->join('images', 'posts.id', 'images.post_id')->where('posts.id', $id)->first();
    }

    public function updateData($id, $title, $content, $category_id)
    {
        return $this->where('id', $id)
            ->update([
                'title' => $title, 
                'content' => $content,
                'slug' => str_slug($title),
                'category_id' => $category_id
            ]);
    }

    public function deleteData($id)
    {
        $this->where('id', $id)->delete();
    }

    public function getRecentPost()
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->select(
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.author_id',
            'posts.category_id',
            'posts.created_at',
            'posts.slug',
            'users.name',
            'users.email',
            'images.image',
            'categories.name as category'
        )
        ->orderBy('posts.created_at', 'desc')
        ->skip(0)->take(3)
        ->get();
    }

    public function getBlogPost($slug)
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('profiles', 'profiles.user_id', 'posts.author_id')
        ->where('posts.slug', $slug)
        ->select(
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.author_id',
            'posts.category_id',
            'posts.created_at',
            'posts.slug',
            'users.name',
            'users.email',
            'images.image',
            'categories.name AS category',
            'profiles.image AS author_img',
            'profiles.information',
            'profiles.facebook'
        )
        ->first();
    }

    public function getTotalByCategory()
    {
        $caculate = $this->select('category_id',DB::raw('count(*) AS total'))
                    ->groupBy('category_id');

        return DB::table('categories')->joinSub($caculate, 'caculate', function($join) {
                    $join->on('caculate.category_id', '=', 'categories.id');
                })
                ->select('category_id', 'total', 'categories.name')
                ->get();
    }
}
