<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * about us page 
     *
     * @return void
     */
    public function index()
    {
        $title = 'About Uptrend Group';
        return view('about', compact('title'));
    }
}
