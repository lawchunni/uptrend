@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="wrapper">
                <div class="content form" id="register">
                    <h1>Edit Address</h1>
                    @if (Auth::user()->id == $user->id)
                        <form action="/address/{{ $user_address->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $user_address->id }}">

                            <p class="col col-12">
                                <input type="text" id="street" name="street" placeholder="Street"
                                    value="{{ old('street', $user_address->street) }}" />
                                @error('street')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-7">
                                <input type="text" id="city" name="city" placeholder="City"
                                    value="{{ old('city', $user_address->city) }}" />
                                @error('city')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-5">
                                <input type="text" id="postal_code" name="postal_code" placeholder="Postal code"
                                    value="{{ old('postal_code', $user_address->postal_code) }}" />
                                @error('postal_code')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-7">
                                <input type="text" id="province" name="province" placeholder="Province"
                                    value="{{ old('province', $user_address->province) }}" />
                                @error('province')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-5">
                                <input type="text" id="country" name="country" placeholder="Country"
                                    value="{{ old('country', $user_address->country) }}" />
                                @error('country')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p>
                                <button id="register_btn" class="btn btn_white">Update</button>
                            </p>
                        </form>
                    @else
                        <h1 style="color: red">You are not authorised to edit other people's personal information.</h1>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            console.log("jQuery loaded, register form displayed");
            $('#terms').click(function() {
                $('#register_btn').attr("disabled", !this.checked);
            });
        });
    </script>
@endsection
