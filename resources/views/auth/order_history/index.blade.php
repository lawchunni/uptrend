@extends('layouts.app')

@section('content')
    <main>

        <div id="profile" class="container profile">

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

                <!-- Order Index started -->
                <div class="content form order">
                    <h1>{{ $title }}</h1>
                    <div id="order_history_container">
                        @if (count($orders) === 0)
                            <h3>You have no orders yet. <a href="/product">Shopping Now.</a></h3>
                        @else
                            @foreach ($orders as $key => $order)
                                <div class="row">

                                    <span class="status {{ $order->order_status }}">
                                        {{ $order->order_status }}
                                    </span>

                                    <div class="num">Order: &#35;{{ $order->id }}</div>


                                    <div class="order_details">
                                        <div><strong>Total: </strong>&#36;{{ $order->total }}</div>

                                        <div>
                                            <strong>Order Date: </strong>
                                            {{ $order->created_at }}
                                        </div>
                                        <div>
                                            <a class="btn btn_white"
                                                href="{{ route('order-history-detail', ['id' => $order->id]) }}">Order
                                                Detail</a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div><!-- Order Index End -->
            </div>
        </div>
    </main>
@endsection
