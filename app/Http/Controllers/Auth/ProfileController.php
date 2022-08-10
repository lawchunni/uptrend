<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Profile";
        $user = Auth::user()->id;
        // return an integer, it's the Auth user id
        $user = User::find($user);
        $addresses = $user->user_addresses;
        // echo ($addresses);
        // die;
        return view('auth.profile', compact('title', 'user', 'addresses',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "Edit Profile";
        return view('auth.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate(
            [
                'first_name' => ['required', 'string', 'min:3', 'max:255'],
                'last_name' => ['required', 'string', 'min:3', 'max:255'],
                'phone' => [
                    'required', 'string', 'min:10', 'max:255',
                    'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/',
                ],
                'email' => ['required', 'string', 'email', 'min:5', 'max:255', 'unique:users,email,' . $id,],
                'terms' => ['required'],
            ],
            [
                'terms.required' => 'Please check here to accept our terms and conditions to Update.',
            ]
        );
        // var_dump($valid);
        // var_dump(User::find($id)->password);
        // die;
        // User::find($id)->update($valid);
        if (User::find($id)->update($valid)) {
            session()->flash('success', 'User information was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the User');
        }
        return redirect('/profile');
    }
}