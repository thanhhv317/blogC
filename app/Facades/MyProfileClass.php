<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MyProfileClass extends Facade {

    protected static function getFacadeAccessor() { return 'myprofiles'; }

}
