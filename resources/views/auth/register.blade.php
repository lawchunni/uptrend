@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="wrapper">
                <div class="content form" id="register">
                    <h1>Register</h1>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <p class="col col-6 required">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name"
                                value="{{ old('first_name') }}" />
                            @error('first_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6 required">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name') }}" />
                            @error('last_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 required">
                            <input type="text" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 required">
                            <input type="text" id="street" name="street" placeholder="Street"
                                value="{{ old('street') }}" />
                            @error('street')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-7 required">
                            <input type="text" id="city" name="city" placeholder="City"
                                value="{{ old('city') }}" />
                            @error('city')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-5 required">
                            <input type="text" id="postal_code" name="postal_code" placeholder="Postal Code"
                                value="{{ old('postal_code') }}" />
                            @error('postal_code')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-7 required">
                            <input type="text" id="province" name="province" placeholder="Province"
                                value="{{ old('province') }}" />
                            @error('province')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-5 required">
                            <input type="text" id="country" name="country" placeholder="Country"
                                value="{{ old('country') }}" />
                            @error('country')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 required">
                            <input type="text" id="phone" name="phone" placeholder="Phone"
                                value="{{ old('phone') }}" />
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6 required">
                            <input type="password" id="password" name="password" placeholder="Password" />
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6 required">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm Password" />
                            @error('password_confirmation')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 terms required">
                            <input type="checkbox" name="terms" id="terms" />
                            <label for="terms">I accept the <a href="/terms-and-conditions" target="_blank">Terms of Use</a> & <a
                                        href="/privacy-policy" target="_blank">Privacy Policy</a> .</label>
                            @error('terms')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p>
                            <button id="register_btn" class="btn btn_white">Register</button>
                        </p>
                        <p class="highlight">* Required fields.</p>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script></script>
@endsection
