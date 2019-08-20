<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $tablel = 'categories';
    protected $fillable = ['id', 'name' ,'slug'];

    public function getAllData()
    {
    	return $this->all();
    }
}
