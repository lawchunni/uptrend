@extends('layouts.app')

@section('content')
    <div class="container cart">
        <div class="wrapper">
            <h1>{{ $title }}</h1>

            <p>Please fill in the <strong>billing address information</strong>.</p>

            <div class="content form payment">
                <div class="cart_list address_info col">
                    <h2>Order Information</h2>
                    <div class="order_info">
                        <div class="user">
                            <strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
                        </div>
                        <div class="default_addr">
                            <strong>Shipping Address:</strong> {{ $address }}
                        </div>
                        <div><strong>Order Total: </strong>${{ $summary['total'] }} CAD</div>
                    </div>
                </div>

                <div class="payment_content row">
                    <h3>Billing Address</h3>

                    <div>
                        <form action="{{ route('useShippingAsBilling') }}">
                            @csrf
                            <input type="checkbox" name="shipping_as_billing" id="shipping_as_billing"
                                onChange="this.form.submit();" @if (!empty($billing_address)) checked @endif />
                            <label for="shipping_as_billing">Use the shipping address as billing address.</label>
                        </form>
                    </div>

                    @if (empty($billing_address))
                        <form action="{{ route('showCreditCardForm') }}">
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
                            <p class="highlight">* Required fields.</p>
                            <p>
                                <button class="btn btn_black">Next</button>
                            </p>
                        </form>
                    @else
                        <div class="col col-12 next_btn">
                            <a href="{{ route('showCreditCardForm', ['use_shipping_address' => $summary['selected_address_id']]) }}"
                                class="btn btn_black">Next</a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection
