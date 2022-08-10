@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <div class="d-flex my-auto">
            <!-- add product -->
            <a href="{{ route('admin_product_add') }}" class="btn btn-secondary mx-2">Add a Product</a>

            <!-- Search form -->
            <div class="search_form">
                <form class="d-md-flex input-group w-auto my-auto" action="{{ route('admin_product_list') }}" method="get">
                    <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                        maxlength="255" style="min-width: 225px" />
                    <button class="input-group-text border-0" type="submit">
                        <i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    @if (isset($products) && !count($products))
        @if (isset($search) && $search)
            <h3 class="py-5 text-center"> Sorry, we could not find any products matching "{{ $search }}"!</h3>
        @else
            <h3 class="py-5 text-center"> There no data available! </h3>
        @endif
    @else
        @if (isset($search) && $search)
            <h4 class="text-muted"> You searched for: {{ $search }}</h4>
        @endif
        <!-- List Tables -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Size</th>
                    <th scope="col">Gender</th>
                    <th scope="col" class="action-btn">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if ($product->product_media && count($product->product_media))
                                <img src="{{ asset('/storage/' . $product->product_media[0]->image) }}" height="100" width="100" alt="product image"/>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->categories->implode('title', ', ') }}</td>
                        <td>{{ $product->size->name }}</td>
                        <td>{{ $product->gender->name }}</td>
                        <td>
                            <a class="btn btn-outline-primary"
                                href="{{ route('admin_product_edit', ['product' => $product->id]) }}">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form method="post" class="d-inline"
                                action="{{ route('admin_product_delete', ['product' => $product->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $product->id }}" />
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you really want to delete {{ $product->name }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

    <div class="px-3">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div>
@endsection
