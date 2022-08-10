@extends('layouts.app')

@section('content')
    <div class="container cart">
        <div class="wrapper">
            <h1>{{ $title }}</h1>

            <p>Please confirm the <strong>Shipping address</strong> and <strong>cart items</strong>.</p>

            <div class="content form">
                <div class="cart_list col col-8">
                    <!-- Shipping Address -->
                    <h2>Shipping Information</h2>
                    <div class="shipping">
                        <div class="user">
                            <strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
                        </div>
                        <div class="default_addr">
                            <strong>Address:</strong> {{ $default_address }}
                        </div>

                        <div class="action">
                            <span class="select_address">
                                <a href="#" id="select_addr_btn" class="btn btn_black">Select Another Address</a>
                            </span>

                            <span>
                                <a href="#" id="create_addr_btn" class="btn btn_black">Create New Address</a>
                            </span>
                        </div>

                        <div class="address_list hidden">
                            <h3>Choose another address:</h3>
                            <form action="{{ route('updateShippingAddress') }}">
                                @csrf
                                @foreach ($address_list as $address)
                                    <div class="addr_item">
                                        <input type="radio" id="addr_{{ $address->id }}" name="address_item_id"
                                            value="{{ $address->id }}" @if (intval($selected_address_id) == $address->id) checked @endif />

                                        @if ($address->id == $user->default_address_id)
                                            <span>[Default]</span>
                                        @endif
                                        <label
                                            for="addr_{{ $address->id }}">{{ $address->full_address() . ', ' . $address->user_postal_code() }}</label>
                                    </div>
                                @endforeach
                                <div class="action">
                                    <button class="btn btn_black">Update</button>
                                </div>
                            </form>

                        </div>

                        <div class="address_form @if (!$expend_create_addr_form) hidden @endif">
                            <h3>Add New Shipping Address:</h3>
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
                                    <button id="register_btn" class="btn btn_black">Create</button>
                                </p>
                                <p class="highlight">* Required fields.</p>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Items -->
                    <h2>Items</h2>
                    @foreach ($products as $product)
                        <div class="cart_item">
                            <div class="product_image col col-2">
                                <a href="/product/{{ $product->slug }}">
                                    @if (isset($product->product_media) && count($product->product_media) > 0)
                                        <img src="{{ asset('/storage/' . $product->product_media[0]->image) }}"
                                            alt="{{ $product->slug }}">
                                    @else
                                        <img src="/images/product-image-not-found.jpg" alt="product-image-not-found">
                                    @endif
                                </a>
                            </div>

                            <div class="desc col col-10">
                                <div class="row heading">
                                    <div class="col col-9 title">
                                        <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-4">
                                        <p>
                                            <strong>Color: </strong>
                                            <span class="color">{{ $product->color }}</span>
                                        </p>
                                        <p>
                                            <strong>Size: </strong>
                                            @if ($product->size)
                                                <span class="size">{{ $product->size->name }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col col-4 qty">
                                        <span class="num"><strong>Qty:</strong> {{ $session_cart[$product->id] }}</span>
                                    </div>

                                    <div class="col col-4 price">
                                        <span>
                                            <strong>Item Total:</strong>
                                            ${{ number_format(floatval($product->price) * intval($session_cart[$product->id]), 2) }}
                                            CAD
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="cart_info col">
                    <h2>Summary</h2>
                    <div class="subtotal"><strong>Subtotal: </strong>${{ $subtotal }} CAD</div>
                    <div class="total_item"><strong>Items: </strong>{{ $total_qty }}</div>

                    @if (!empty($taxes))
                        @foreach ($taxes as $key => $tax)
                            @if (floatval($tax) > 0)
                                <div><strong>{{ strtoupper($key) }} ({{ floatval($tax) * 100 }}%): </strong>
                                    ${{ number_format(floatval($tax) * $subtotal, 2) }} CAD</div>
                            @endif
                        @endforeach
                    @endif
                    <div>
                        <strong>Shipping Fee: </strong>
                        @if ($shipping_fee > 0)
                            ${{ $shipping_fee }} CAD
                        @else
                            Free*
                        @endif
                    </div>

                    <div><strong>Total: </strong>${{ $total }} CAD</div>

                    <div class="checkout_btn">
                        <a class="btn btn_black" href="{{ route('processToBilling') }}">Process to Payment</a>
                    </div>
                    @if ($shipping_fee == 0)
                        <div>* Order exceeded ${{ $free_shipping_amount }}, free shipping applied</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
