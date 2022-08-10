<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $user_address)
    {
        $title = 'Edit Address';
        $user = User::find($user_address->user_id);
        return view('auth.address.edit', compact('user_address', 'title', 'user'));
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
                'street' => ['required', 'string', 'min:3', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:255'],
                'province' => ['required', 'string', 'min:2', 'max:255'],
                'country' => ['required', 'string', 'min:3', 'max:255'],
                'postal_code' => ['required', 'string', 'min:6', 'max:255'],
            ]
        );
        // User_address::find($id)->update($valid);
        if (UserAddress::find($id)->update($valid)) {
            session()->flash('success', 'Address information was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the Address');
        }
        return redirect('/profile');
    }

    /**
     * Update the User Default Address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDefaultAddress(Request $request, $id)
    {
        $user_address = UserAddress::find($id);
        $user = User::find($user_address->user_id);
        $valid['default_address_id'] = $id;

        if ($user->update($valid)) {
            session()->flash('success', 'Default address was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the Default address');
        }
        return redirect('/profile#User_address');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Address";
        return view('auth.address.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prev_url = url()->previous();
        $prev_route = app('router')->getRoutes($prev_url)->match(app('request')->create($prev_url))->getName();

        if ($prev_route == 'checkoutCart') {
            // for checkout address selection use
            session(['addr_store_form' => true]);
        }

        $valid = $request->validate(
            [
                'street' => ['required', 'string', 'min:3', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:255'],
                'province' => ['required', 'string', 'min:2', 'max:255'],
                'country' => ['required', 'string', 'min:3', 'max:255'],
                'postal_code' => ['required', 'string', 'min:6', 'max:255'],
            ],
        );
        $user_address = new UserAddress;
        $user_address->user_id = Auth::user()->id;
        $user_address->street = $valid['street'];
        $user_address->city = $valid['city'];
        $user_address->province = $valid['province'];
        $user_address->country = $valid['country'];
        $user_address->postal_code = $valid['postal_code'];
        // $user_address->save();

        if ($user_address->save()) {
            session()->flash('success', 'Address was successfully created.');
        } else {
            session()->flash('error', 'There was a problem creating the Address');
        }


        if ($prev_route == 'checkoutCart') {
            session(['shipping_addr_id' => $user_address->id]);
            return redirect()->route('checkoutCart');
        } else {
            return redirect('/profile#User_address');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = UserAddress::find($id);

        if ($address->delete()) {
            session()->flash('success', 'Address was deleted successfully.');
            return redirect('/profile');
        }
        session()->flash('error', 'There was a problem deleting the Address');
        return redirect('/profile');
    }
}
