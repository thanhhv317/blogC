<?php

namespace App\Helpers;

use Auth;
use App\Profile;

class MyProfile {

    public function getProfileUser($id)
    {
        return Profile::UserProfile($id);
    }
}
