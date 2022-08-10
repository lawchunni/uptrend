@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Edit User</h2>
                </div>
                <div class="card-body">
                    <form action="/admin/user/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" name="first_name" placeholder="First Name"
                                value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" placeholder="123-123-1234" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="user@example.com" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street"
                                name="street" placeholder="Street" value="{{ old('street', $address->street) }}">
                            @error('street')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                                name="city" placeholder="City" value="{{ old('city', $address->city) }}">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                id="province" name="province" placeholder="Province"
                                value="{{ old('province', $address->province) }}">
                            @error('province')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                                name="country" placeholder="Country" value="{{ old('country', $address->country) }}">
                            @error('country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                id="postal_code" name="postal_code" placeholder="Postal Code"
                                value="{{ old('postal_code', $address->postal_code) }}">
                            @error('postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
