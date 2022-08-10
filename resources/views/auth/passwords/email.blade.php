@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="content form" id="register">
                <h1>Reset Password</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <p>

                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                placeholder="Input Your Email" autofocus>

                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </p>

                        <div>
                            <div>
                                <button type="submit" class="btn btn_white">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
