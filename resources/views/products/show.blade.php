@extends('layouts.app')
@section('content')
    <div class="container details_page">
        <div class="wrapper">
            <div class="ads ads-top mb-3">
                <a href="{{ $ad->link }}"><img src="/storage/{{ $ad->image }}" alt="{{ $ad->title }}"></a>
            </div>
            <div class="content">
                <div class="left">
                    <div class="product-media-slider">
                        {{-- multiple images --}}
                        @if (isset($product->product_media) && count($product->product_media) > 0)
                            @foreach ($product->product_media as $index => $item)
                                <div class="media-item">
                                    <img src="{{ asset('/storage/' . $item->image) }}"
                                        alt="{{ $product->name }}_{{ $index }}" />
                                </div>
                            @endforeach
                        @else
                            {{-- placeholder image --}}
                            <div class="media-item">
                                <img src="/images/product-image-not-found.jpg" alt="product-image-not-found">
                            </div>
                        @endif
                    </div>
                    {{-- display image option for multiple image --}}
                    {{-- hide image navigation for single image --}}
                    @if (isset($product->product_media) && count($product->product_media) > 1)
                        <div class="product-media-slider-nav">
                            @foreach ($product->product_media as $index => $item)
                                <div class="product_media_nav">
                                    <img src="{{ asset('/storage/' . $item->image) }}"
                                        alt="{{ $product->name }}_nav_{{ $index }}" width="80px" height="auto" />
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="right">
                    <div class="product_desc">
                        <h1>{{ $product->name }}</h1>

                        <div class="price">${{ number_format($product->price, 2) }} CAD</div>
                        <div>
                            {!! $product->description !!}
                        </div>


                        <div class="category"><strong>Category: </strong>
                            {{ $product->categories->implode('title', ', ') }}
                        </div>
                        <div class="color"><strong>Color: </strong> {{ $product->color }}</div>
                        <div class="size"><strong>Size: </strong> {{ $product->size->name }}</div>
                        <div class="qutanity"><strong>Available Quantity: </strong> {{ $product->quantity }}
                        </div>
                        @if ($product->quantity == 0)
                            <div class="availability">
                                <img src="/images/icon-unavailable.svg" alt="unavailable icon" width="17"
                                    height="17">
                                <span>Currently unavailable (show when out of stock)</span>
                            </div>
                        @endif

                        <div class="@if ($product->quantity == 0) disabled @endif">
                            <a class="btn btn_black" href="{{ route('createCart', ['id' => $product->id]) }}">Add to
                                bag</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
