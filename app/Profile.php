<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profiles';

    protected $fillable = ['id', 'user_id', 'address', 'facebook', 'image', 'information'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getData($id)
    {
    	return $this->join('users', 'users.id', 'profiles.user_id')
    	->where('profiles.user_id', $id)
    	->first();
    }

    public function createData($user_id, $address, $facebook, $image, $information)
    {
    	$this->user_id 		= $user_id;
    	$this->address 		= $address;
    	$this->facebook 	= $facebook;
    	$this->image 		= $image;
    	$this->information  = $information;
    	$this->save();
    }

    public function updateData($user_id, $address, $facebook, $image = null, $information)
    {
    	if ($image == null) {
    		return $this->where('user_id', $user_id)
            ->update([
                'address' => $address, 
                'facebook' => $facebook,
                'information' => $information
            ]);
    	}
    	return $this->where('user_id', $user_id)
            ->update([
                'address' => $address, 
                'facebook' => $facebook,
                'image' => $image,
                'information' => $information
            ]);
    }

    public static function UserProfile($id)
    {
        return DB::table('profiles')->join('users', 'users.id', 'profiles.user_id')
        ->where('profiles.user_id', $id)
        ->first();
    }
}
