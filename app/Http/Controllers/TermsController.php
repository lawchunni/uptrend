<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * terms of condition page
     *
     * @return void
     */
    public function index()
    {
        $title = 'Terms & Conditions';
        return view('terms', compact('title'));
    }
}
