@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="content form" id="login">
                <div class="card">
                    <h1 class="card-header">{{ __('Reset Password') }}</h1>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <p>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email"
                                value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p>
                            <input id="password" type="password" class="form-control" placeholder="New Password"
                                name="password" autocomplete="new-password">

                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password">

                        </p>
                        <p>
                            <button type="submit" class="btn btn_white">
                                {{ __('Reset Password') }}
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
