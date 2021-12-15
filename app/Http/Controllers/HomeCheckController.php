<?php

namespace App\Http\Controllers;

use App;

class HomeCheckController extends Controller
{
    public function HomePage()
    {
        // igreja detected
        if (tenant('id')) {
            return \App::call('App\Http\Controllers\HomeController@HomePage');
        }
        
        // home page app
        return \App::call('App\Http\Controllers\HomeAppController@HomePage');
    }

}
