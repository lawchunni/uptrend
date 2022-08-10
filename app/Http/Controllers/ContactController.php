<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Display a contact us page.
     *
     */
    public function index()
    {
        $title = 'Contact';
        return view('contact', compact('title'));
    }
    /**
     * save new inquiry 
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|min:5|max:255',
            'phone' => 'required|regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/',
            'message' => 'required|string| max:1500'

        ]);

        Inquiry::create($valid);

        session()->flash('success', 'Thank you for contacting us!');

        return redirect('/contact');
    }
}
