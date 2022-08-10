@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="wrapper">
                <div class="content form" id="register">
                    <h1>Add New Address</h1>
                    <form action="/address" method="POST">
                        @csrf
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
                            <input type="text" id="postal_code" name="postal_code" placeholder="Postal code"
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
                        <p>
                            <button id="register_btn" class="btn btn_white">Create</button>
                        </p>
                        <p class="highlight">* Required fields.</p>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script></script>
@endsection
