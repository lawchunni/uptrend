@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="content form" id="login">
                <h1>Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <p>
                        <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            autofocus>

                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </p>

                    <p>
                        <input id="password" type="password" name="password" placeholder="Password">

                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </p>
                    @if (Route::has('password.request'))
                        <span><a href="{{ route('password.request') }}">Forgot password?</a></span>
                        <span><a href="{{ route('register') }}">Register</a></span>
                    @endif

                    <p>
                        <button type="submit" class="btn btn_white">Login</button>
                    </p>

                </form>
            </div>
        </div>
    </div>
@endsection
