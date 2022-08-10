@extends('layouts.app')

@section('content')
    <div class="home">
        <!-- Banner -->
        <div class="banner">
            @foreach ($ads as $ad)
                <div class="banner_item" style="background-image: url('/storage/{{ $ad->image }}')">
                    <a href="{{ $ad->link }}"></a>
                </div>
            @endforeach
        </div><!-- End Banner -->

        <!-- Collections -->
        <div class="collections">
            <div class="wrapper">
                <div class="decorative_text">Collections</div>
                <div class="content">
                    @foreach ($genderCollection as $key => $item)
                        <div class="item item_{{ $key + 1 }}">
                            <a href="/{{ $item->name }}/product"><span>{{ ucfirst($item->name) }}</span></a>
                            <div class="bg_img" style="background-image: url('/images/{{ $item->image }}')"></div>
                        </div>
                    @endforeach
                    @foreach ($categoryCollection as $key => $item)
                        <div class="item item_{{ $key + 4 }}">
                            <a href="/product?category={{ $item->title }}"><span>{{ ucfirst($item->title) }}</span></a>
                            <div class="bg_img" style="background-image: url('/storage/{{ $item->image }}')"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- End Collections -->

        <!-- Sliders for featured products -->
        @if (count($featured) != 0)
            <div class="featured">
                <div class="wrapper">
                    <div class="heading">
                        <div class="decorative_text">featured</div>
                        <div class="tabs">
                            <ul>
                                @foreach ($genders as $gender)
                                    <li>{{ $gender->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        @foreach ($genders as $gender)
                            <div class="row">
                                <div class="featured_slider">
                                    @foreach ($featured as $item)
                                        @if ($item->gender_id == $gender->id)
                                            <div class="featured_item">
                                                <div class="product_img">
                                                    <a href="/product/{{ $item->slug }}">
                                                        @if (isset($item->product_media) && count($item->product_media) > 0)
                                                            <img src="{{ asset('/storage/' . $item->product_media[0]->image) }}"
                                                                alt="{{ $item->slug }}">
                                                        @else
                                                            <img src="/images/product-image-not-found.jpg"
                                                                alt="product-image-not-found">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="title">
                                                    <a href="/product/{{ $item->slug }}"> {{ $item->name }}</a>
                                                </div>
                                                <div class="price">${{ $item->price }} CAD</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- End of Sliders for featured products -->
        @endif

        <!-- Service description  -->
        <div class="shipping_desc">
            <div class="wrapper">
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-truck.svg" alt="truck icon" width="80" height="55" />
                    </div>
                    <div class="desc">Free Shipping in Canada when spend over $80</div>
                </div>
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-flight.svg" alt="truck icon" width="80" height="55" />
                    </div>
                    <div class="desc">Free International Shipping when order over $250</div>
                </div>
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-timer.svg" alt="flight icon" width="80" height="55" />
                    </div>
                    <div class="desc">30 Days Returns Policy After product received</div>
                </div>
            </div>
        </div><!-- End of Service description  -->

        <!-- Instagram influencer -->
        <div class="social_media_influencer">
            <div class="photos">
                <img src="/images/home/influencers_1.jpg" alt="influencers" />
                <img src="/images/home/influencers_2.jpg" alt="influencers" />
                <img src="/images/home/influencers_3.jpg" alt="influencers" />
                <img src="/images/home/influencers_4.jpg" alt="influencers" />
                <img src="/images/home/influencers_5.jpg" alt="influencers" />
                <img src="/images/home/influencers_6.jpg" alt="influencers" />
                <img src="/images/home/influencers_7.jpg" alt="influencers" />
                <img src="/images/home/influencers_8.jpg" alt="influencers" />
                <img src="/images/home/influencers_9.jpg" alt="influencers" />
                <img src="/images/home/influencers_10.jpg" alt="influencers" />
            </div>
            <div class="black_layer">
                <span>Instagram Influencers</span>
            </div>
        </div><!-- End of Instagram influencer -->

    </div>
@endsection
