<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proflie extends Model
{
    use SoftDeletes;

    protected $table = 'proflies';

    protected $fillable = ['id', 'user_id', 'name', 'address', 'phone', 'image'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
