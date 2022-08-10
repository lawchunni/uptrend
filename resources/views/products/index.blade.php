@extends('layouts.app')

@section('content')
    <div class="container list_page">
        <div class="wrapper">
            <!-- Aside start -->
            <aside>

                {{-- Category filter: starts --}}
                <h3>Categories</h3>
                @if (isset($categories) && !count($categories))
                    <p>There is no categories available!</p>
                @else
                    <form>

                        @foreach ($categories as $category)
                            <div>
                                <input type="checkbox" onclick="filterByCategory(event, this)" name="{{ $category->title }}"
                                    id="{{ $category->title }}" value="{{ $category->title }}" <?php if (in_array($category->title, $categoryFilter)) {
                                        echo 'checked';
                                    } ?> />
                                <label for="{{ $category->title }}">{{ $category->title }}</label>
                            </div>
                        @endforeach
                    </form>
                @endif
                {{-- Category filter: end --}}

                {{-- Size filter: start --}}
                <h3>Sizes</h3>
                @if (isset($sizes) && !count($sizes))
                    <p>There is no sizes available!</p>
                @else
                    <form>
                        @foreach ($sizes as $size)
                            <div>
                                <input type="checkbox" name="{{ $size->name }}" id="{{ $size->name }}"
                                    onclick="filterBySize(event, this)" value="{{ $size->name }}" <?php if (in_array($size->name, $sizeFilter)) {
                                        echo 'checked';
                                    } ?> />
                                <label for="{{ $size->name }}">{{ $size->name }}</label>
                            </div>
                        @endforeach
                    </form>
                @endif
                {{-- Size filter: end --}}

                {{-- Advertisement: start --}}
                <div class="ads ads-sidebar">
                    <a href="{{ $ad->link }}"><img src="/storage/{{ $ad->image }}" alt="{{ $ad->title }}"></a>
                </div>
                {{-- Advertisement: end --}}

            </aside>
            <!-- Aside ended -->

            <!-- Section start -->
            <section class="list_item">
                {{-- Display searched input to user --}}
                @if (isset($search) && $search && isset($products) && count($products))
                    <div>
                        <h2>You Searched for: {{ $search }}</h2>
                    </div>
                @endif

                <div class="content">
                    {{-- if no product found --}}
                    @if (isset($products) && count($products) == 0)
                        @if (isset($search) && $search)
                            <h3 class="no-data-label">There is no product found with "{{ $search }}"! Please search
                                with different input.
                            </h3>
                        @else
                            <h3 class="no-data-label">There is no product available!</h3>
                        @endif
                    @else
                        {{-- Product list: start --}}
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="product_img">
                                    <a href="/product/{{ $product->slug }}"></a>
                                    {{-- display first available image of product --}}
                                    @if (isset($product->product_media) && count($product->product_media) > 0)
                                        <img src="{{ asset('/storage/' . $product->product_media[0]->image) }}"
                                            alt="{{ $product->slug }}">
                                    @else
                                        <img src="/images/product-image-not-found.jpg" alt="product-image-not-found">
                                    @endif
                                </div>
                                <div class="desc">
                                    <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
                                    <div class="price">${{ number_format($product->price, 2) }} CAD</div>
                                </div>
                            </div>
                        @endforeach
                        {{-- Product list: end --}}
                    @endif

                </div>

                {{-- pagination --}}
                <div class="pagination-wrapper">
                    {!! $products->links('pagination::bootstrap-5') !!}
                </div>

            </section>
            <!-- Section ended -->
        </div>
    </div>
@endsection
@section('footer-script')
    <script>
        /** 
         * filter by Category function to create dynamic url 
         * based on category selection
         * 
         *  event and element as argument 
         */
        function filterByCategory(e, el) {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            let selectedCategory = params.category ? params.category.split(',') : [];
            if (selectedCategory.findIndex(x => x == e.target.value) === -1) {
                // add selected category in url
                selectedCategory.push(e.target.value);
            } else {
                // remove unselected category from url
                selectedCategory.splice(selectedCategory.findIndex(x => x == e.target.value), 1);
            }

            let url = window.location.pathname;
            let categoryStr = selectedCategory.toString();
            if (params.size) {
                url = `${url}?category=${categoryStr}&size=${params.size}`;
            } else {
                url = `${url}?category=${categoryStr}`;
            }
            // refresh page
            window.location = url;
        }
        /** 
         * filter by size function to create dynamic url 
         * based on size selection
         * 
         *  event and element as argument 
         */
        function filterBySize(e, el) {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            let selectedSize = params.size ? params.size.split(',') : [];
            if (selectedSize.findIndex(x => x == e.target.value) === -1) {
                // add selected size in url
                selectedSize.push(e.target.value);
            } else {
                // remove unselected size from url
                selectedSize.splice(selectedSize.findIndex(x => x == e.target.value), 1);
            }

            let url = window.location.pathname;
            let sizeStr = selectedSize.toString();
            if (params.category) {
                url = `${url}?category=${params.category}&size=${sizeStr}`;
            } else {
                url = `${url}?size=${sizeStr}`;
            }
            // refresh page
            window.location = url;
        }
    </script>
@endsection
