@extends('layouts.app')

@section('content')
    <div class="test_purpose">
        <div>
            <div>
                <div>
                    {{-- <div><p><?= // Str::plural('gender')?></p></div> --}}
                    <p>whoami : {{ $whoami }}</p>
                    <div class="tgdiv"><p class="tglb">&#9658;User</p><p>{{ $users }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;shipping_charge</p><p>{{ $shipping_charge }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;tax</p><p>{{ $tax }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;inquiry</p><p>{{ $inquiry }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;user_address</p><p>{{ $user_address }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;user_1_address</p><p>{{ $user_1_address }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;order</p><p>{{ $order }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;transaction</p><p>{{ $transaction }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;size</p><p>{{ $size }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;product</p><p>{{ $products }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;product_media</p><p>{{ $product_media }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;category</p><p>{{ $categories }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;user_1_order</p><p>{{ $user_1_order }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;product_1_category</p><p>{{ $product_1_category }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;order_1_products</p><p>{{ $order_1_products }}</p></div>
                </div>
            </div>
        </div>
    </div>
    <div id="collapse_all_button_div">
        <button id="collapse_all" class="btn btn-danger">Collapse All</button>
    </div>
    <script src="js/test.js"></script>
@endsection
