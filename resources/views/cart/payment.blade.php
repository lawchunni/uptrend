@extends('layouts.app')

@section('content')
    <div class="container cart">
        <div class="wrapper">
            <h1>{{ $title }}</h1>

            <p>Please fill in the <strong>credit card information</strong>.</p>

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
                        <div class="default_addr">
                            <strong>Billing Address:</strong> {{ $billing_address }}
                        </div>
                        <div>
                            <strong>Order Total: </strong>${{ $summary['total'] }} CAD
                        </div>
                    </div>
                </div>

                <div class="payment_content row">
                    <h3>Credit Card Information</h3>

                    <form action="{{ route('storeOrder') }}" method="post">
                        @csrf

                        <p class="col col-12 required">
                            <span><strong>Card Type: </strong></span>

                            <input type="radio" id="visa" name="card_type" value="visa"
                                @if (old('card_type') == 'visa') checked @endif />
                            <label for="visa">Visa</label>

                            <input type="radio" id="mastercard" name="card_type" value="mastercard"
                                @if (old('card_type') == 'mastercard') checked @endif />
                            <label for="mastercard">Mastercard</label>

                            <input type="radio" id="amex" name="card_type" value="amex"
                                @if (old('card_type') == 'amex') checked @endif />
                            <label for="amex">AMEX</label>

                            @error('card_type')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>

                        <p class="col col-12 required">
                            <input type="text" id="card_holder_name" name="card_holder_name"
                                placeholder="Card Holder Name" value="{{ old('card_holder_name') }}" />
                            @error('card_holder_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 required">
                            <input type="text" id="card_number" name="card_number" placeholder="Card Number"
                                value="{{ old('card_number') }}" />
                            @error('card_number')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>

                        <p class="col col-5 required">
                            <input type="text" id="card_cvv" name="card_cvv" placeholder="CVV Number"
                                value="{{ old('card_cvv') }}" />
                            @error('card_cvv')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-7 required">
                            <input type="month" id="card_expiry" name="card_expiry" value="{{ old('card_expiry') }}" />
                            @error('card_expiry')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>

                        <p class="highlight">* Required fields.</p>
                        <p>
                            <button class="btn btn_black">Confirm</button>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
