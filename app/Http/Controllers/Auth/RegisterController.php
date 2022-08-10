<?php

namespace App\Http\Controllers\Auth;

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

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'min:3', 'max:255'],
                'last_name' => ['required', 'string', 'min:3', 'max:255'],
                'street' => ['required', 'string', 'min:3', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:255'],
                'postal_code' => ['required', 'string', 'min:6', 'max:255'],
                'province' => ['required', 'string', 'min:3', 'max:255'],
                'country' => ['required', 'string', 'min:3', 'max:255'],
                'phone' => [
                    'required', 'string', 'min:10', 'max:255',
                    'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/',
                ],
                'email' => ['required', 'string', 'email', 'min:5', 'max:255', 'unique:users'],
                'password' => [
                    'required', 'string', 'min:8', 'max:255', 'confirmed',
                    'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[\W]).*$/',
                ],
                'terms' => ['required'],
            ],
            [
                'password.regex' => 'Password must include at least one Capital character, one lowercase character, one digit, one special character. Length between 8-255',
                'terms.required' => 'Please check here to accept our terms and conditions to register.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Uptrend Customize !!! Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    /**
     * Uptrend Customize !!! Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        // $user is an object;
        // var_dump($user->id); // int id
        // var_dump($user->attributesToArray());
        // array contains all user fields including id
        // die;

        $user_default_address = $this->createUserDefaultAddress($user->id, $request->all());
        $user->default_address_id = $user_default_address->id;
        $user->save();
        $this->guard()->login($user);

        if ($response = $this->registered(
            $request,
            $user
        )) {
            return $response;
        }

        return $request->wantsJson()
        ? new JsonResponse([], 201)
        : redirect($this->redirectPath());
    }

    /**
     * Create default address for the new registered user
     *
     * @param integer $id
     * @param array $data
     * @return \App\Models\User_address
     */
    public function createUserDefaultAddress(int $id, array $data)
    {
        return UserAddress::create([
            'user_id' => $id,
            'street' => $data['street'],
            'city' => $data['city'],
            'province' => $data['province'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
        ]);
    }
}