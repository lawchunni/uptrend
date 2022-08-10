@extends('layouts.app')

@section('content')
    <main>
        <div class="container profile">
            <div class="wrapper d-flex">
                <!-- Sidebar started -->
                <aside>
                    <ul>
                        <li>
                            <a href="{{ route('profile') }}">User Info</a>
                        </li>
                        <li>
                            <a class="active">Order History</a>
                        </li>
                    </ul>
                </aside><!-- Sidebar end -->

                <!-- Order Details started -->
                <div class="content form order">
                    <h1>{{ $title }}</h1>
                    <div id="order_history_container">
                        @if (Auth::user()->id !== $user->id)
                            <h3>You are not authorised to view this order detail.
                                <a href="/product" id="shopping_now">Shopping Now.</a>
                            </h3>
                        @else
                            <div class="order_container">
                                <div class="order_heading">
                                    <div>
                                        <strong>Order Date:</strong>
                                        {{ $order->created_at }}
                                    </div>
                                    <div>
                                        <strong>Shipping address:</strong>
                                        {{ $order->shipping_address }}
                                    </div>
                                    <div>
                                        <strong>Billing address:</strong>
                                        {{ $order->billing_address }}
                                    </div>
                                    <div>
                                        <strong>Order Status: </strong>
                                        <span class="status {{ $order->order_status }}">
                                            {{ $order->order_status }}
                                        </span>
                                    </div>
                                </div>

                                <div class="invoice">
                                    <a href="{{ route('order-history-invoice', ['id' => $order->id]) }}"
                                        class="btn btn_white" target="_blank">View Invoice</a>
                                </div>

                                <div class="order_details">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="pe-1 pm-1 fw-bold border-grey">&#35;</th>
                                                <th class="pe-1 pm-1 fw-bold border-grey">Name</th>
                                                <th class="pe-1 pm-1 fw-bold border-grey">Size</th>
                                                <th class="pe-1 pm-1 fw-bold border-grey">Unit Price</th>
                                                <th class="pe-1 pm-1 fw-bold border-grey">Quantity</th>
                                                <th class="pe-1 pm-1 fw-bold border-grey">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $key => $product)
                                                <tr>
                                                    <td class="vertical-align-top py-1 border-grey fw-bold pe-1">
                                                        {{ $key + 1 }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-3">
                                                        {{ $product->pivot->product_name }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                                        {{ $product->pivot->size }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                                        &#36;{{ $product->pivot->unit_price }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                                        &#215;{{ $product->pivot->quantity }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                                        &#36;{{ $product->pivot->line_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="summary">
                                    <div class="mb-0_5 text-align-right"><strong>GST:
                                        </strong>&#36;{{ $order->gst }}</div>
                                    <div class="mb-0_5 text-align-right"><strong>PST:
                                        </strong>&#36;{{ $order->pst }}</div>
                                    <div class="mb-0_5 text-align-right"><strong>HST:
                                        </strong>&#36;{{ $order->hst }}</div>
                                    <div class="mb-0_5 text-align-right"><strong>Subtotal:
                                        </strong>&#36;{{ $order->sub_total }}</div>
                                    <div class="mb-0_5 text-align-right"><strong>Shipping
                                            charge: </strong>&#36;{{ $order->shipping_charge }}</div>
                                    <div class="mb-0_5 text-align-right"><strong>TOTAL:
                                        </strong>&#36;{{ $order->total }}</div>
                                </div>


                            </div>
                        @endif
                    </div>
                </div><!-- Order Details End -->
            </div>
        </div>
    </main>
@endsection
