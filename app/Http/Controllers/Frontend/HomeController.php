<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\Container\BindingResolutionException;

class HomeController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke()
    {
        return view('frontend.home.index');
    }
}
