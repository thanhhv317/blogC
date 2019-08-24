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

    public function postStatus()
    {
        return $this->hasOne('App\PostStatus');
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

    public function getAllData($id = null, $level = 1, $author_id, $status)
    {
        $posts = $this->join('images', 'posts.id', 'images.post_id')
                    ->join('post_statuses', 'post_statuses.post_id', 'posts.id');
                    
        if ($id == null) {
            if ($level == 1) {
                return $posts->where('post_statuses.status', '=', $status)
                    ->where('posts.author_id', '=', $author_id)
                    ->paginate(12);
            } elseif ($level == 2) {
                return $posts->where('post_statuses.status', '=', $status)->paginate(12);
            }
        }
        return $posts->where('posts.id', $id)->first();
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

    

    // get data for client page

    public function getRecentPost()
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('post_statuses.status', '=', 1)
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
            'categories.name as category',
            'categories.slug as category_alias'
        )
        ->orderBy('posts.created_at', 'desc')
        ->skip(2)->take(3)
        ->get();
    }

    public function getBlogPost($slug)
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('profiles', 'profiles.user_id', 'posts.author_id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('post_statuses.status', '=', 1)
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
            'profiles.facebook',
            'categories.slug as category_alias'
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
                ->select('category_id', 'total', 'categories.name', 'categories.slug')
                ->get();
    }

    public function getTop2()
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('post_statuses.status', '=', 1)
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
            'categories.name as category',
            'categories.slug as category_alias'
        )
        ->orderBy('posts.created_at', 'desc')
        ->skip(0)->take(2)
        ->get();
    }


    public function getMostRead($data)
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('comments', 'comments.post_id', 'posts.id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('post_statuses.status', '=', 1)
        ->whereIn('posts.id', $data)
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
            'categories.name as category',
            'categories.slug as category_alias'
        )
        ->distinct()
        ->get();
    }

    public function getOrthePost($cateId = null, $skip = 0, $limit, $cateSlug = null)
    {
        $posts = $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('post_statuses.status', '=', 1);
        if ($cateId != null) {
            $posts = $posts->where('categories.id', '=', $cateId);
        }
        if ($cateSlug != null) {
            $posts = $posts->where('categories.slug', '=', $cateSlug);
        }
        return $posts->select(
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
            'categories.name as category',
            'categories.slug as category_alias'
        )
        ->orderBy('posts.created_at', 'desc')
        ->skip($skip)->take($limit)
        ->get();
    }

    public function getSearchPost($title)
    {
        return $this->join('users', 'posts.author_id', 'users.id')
        ->join('images', 'posts.id', 'images.post_id')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->join('post_statuses', 'post_statuses.post_id', 'posts.id')
        ->where('posts.title', 'like', '%'. $title .'%')
        ->where('post_statuses.status', '=', 1)
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
            'categories.name as category',
            'categories.slug as category_alias'
        )
        ->orderBy('posts.created_at', 'desc')
        ->paginate(10);
    }

}
