<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;
    public function __construct() {
        // Set Local language
        App::setlocale('en');
    }

}
