<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Uptrend Customize !!! Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    /**
     * Uptrend Customize !!! Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        // var_dump(Auth::user()->admin);
        // die;
        if (
            Auth::user()->admin
        ) {
            return '/admin/dashboard';
        }

        $redirectToCart = session('route_back_cart');

        if ($redirectToCart) {
            session('route_back_cart', false);
            return route('checkoutCart');
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}