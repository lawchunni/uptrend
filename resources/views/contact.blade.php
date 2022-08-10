@extends('layouts.app')
@section('content')
    <main class="contact-form">
        <div class="container">
            <div class="wrapper">
                <div class="content form" id="contact">
                    <h1>Contact Us</h1>
                    <form action="/contact" id="create" method="POST">
                        @csrf
                        <p class="col col-6 required">
                            <input type="text" id="name" name="name" placeholder="Name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6 required">
                            <input type="text" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}" />
                            @error('email')
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
                        <p class="col col-12 required">
                            <label for="message">Message:</label>
                            <textarea rows="10" id="message" name="message" placeholder="Message">
                                    {{ old('message') }}
                            </textarea>
                            @error('message')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p>
                            <button id="register_btn" class="btn btn_white">Submit</button>
                        </p>
                        <p class="highlight">* Required fields.</p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
