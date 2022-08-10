<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * privacy policy page
     *
     * @return void
     */
    public function index()
    {
        $title = 'Privacy Policy';
        return view('privacy-policy', compact('title'));
    }
}
