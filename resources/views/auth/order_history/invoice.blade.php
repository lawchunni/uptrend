<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Uptrend | {{ $title }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            background-color: #fff;
            min-height: 3em;
        }

        h1 {
            text-align: center;
            margin: 2em auto;
        }

        h2 {
            margin: 2em auto;
        }

        .fw-bold {
            font-weight: 700;
        }

        .d-flex {
            display: flex;
        }

        .order_container {
            padding-bottom: 1em;
        }

        .order_heading {
            margin-bottom: 1em;
        }

        .mx-2 {
            margin-left: 2em;
            margin-right: 2em;
        }

        .pb-1 {
            padding-bottom: 1em;
        }

        .mb-1 {
            margin-bottom: 1em;
        }

        .mb-2 {
            margin-bottom: 2em;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mt-1 {
            margin-top: 1em !important;
        }

        .mt-2 {
            margin-top: 2em !important;
        }

        .mt-3 {
            margin-top: 3em !important;
        }

        .mt-4 {
            margin-top: 4em !important;
        }

        .my-2 {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .justify-content-space-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .pe-1 {
            padding-right: 1em;
        }

        .pe-1_5 {
            padding-right: 1.5em;
        }

        .pm-1 {
            padding-bottom: 1em;
        }

        .pm-2 {
            padding-bottom: 2em;
        }

        .text-black {
            color: #0a0a0a;
        }

        .border-grey {
            border-bottom: 1px solid rgb(227, 227, 227);
        }

        .min-width-16 {
            min-width: 16em;
        }

        .vertical-align-top {
            vertical-align: top;
        }

        .py-1 {
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .pe-3 {
            padding-right: 3em;
        }

        .justify-content-end {
            justify-content: end;
        }

        .mb-0_5 {
            margin-bottom: 0.5em;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .text-align-right {
            text-align: right;
        }

        .text-align-center {
            text-align: center;
        }

        .footer {
            color: #fff;
            background-color: rgb(33, 34, 35);
            padding-top: 1em;
            padding-bottom: 1em;
        }

        p.small {
            font-size: 0.7em;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        .overflow-x-scroll {
            overflow-x: scroll;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .col-4 {
            width: calc((100% - 8px) / 12 * 4);
        }

        .wrap-content {
            width: min-content;
        }

        @media only screen and (max-width: 767px) {
            #order_history_container .order_container>div {
                display: block;
            }

            .col-4 {
                padding-right: 0;
                width: 100%;
            }

            .wrap-content {
                width: max-content;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Uptrend Invoice</h1>
        <h3>Hello! {{ $user->first_name . ' ' . $user->last_name . ',' }}</h3>
        <p>We really appreciate your patronage. Here is your order invoice, please keep this for your records.</p>
        <div id="order_history_container" class="">
            <div class="order_container">
                <div class="d-flex">
                    <div class="my-2 pm-2 pe-1_5 border-grey col-4">
                        <h3>Company Information</h3>
                        <div class="mb-0_5"><strong>Uptrend</strong> International Co.,Ltd</div>
                        <div class="mb-0_5">Unit 2701, 1257 Square Tower, Winnipeg, Manitoba, Canada</div>
                        <div class="mb-0_5"><span class="text-black fw-bold">R3B 9S7</span></div>
                        <div class="mb-0_5"><strong>Tel: </strong>&#40;+1&#41; 207-589-1426</div>
                        <div class="mb-0_5"><strong>Email: </strong>contact@uptrend.com</div>
                        <div class="mb-0"><strong>Uptrend</strong>.com</div>
                    </div>
                    <div class="my-2 pm-2 pe-1_5 border-grey col-4">
                        <h3>Customer Information</h3>
                        <div class="mb-0_5"><span class="text-black fw-bold">Name:
                            </span>{{ $user->first_name . ' ' . $user->last_name }}</div>
                        <div class="mb-0_5"><span class="text-black fw-bold">Email:
                            </span>{{ $user->email }}</div>
                        <div class="mb-0_5"><span class="text-black fw-bold">Phone:
                            </span>{{ $user->phone }}</div>
                    </div>
                    <div class="my-2 pm-2 border-grey col-4">
                        <h3 class="wrap-content">Order Information</h3>
                        <div class="mb-0_5"><span class="text-black fw-bold">Order Date:
                            </span>{{ $order->created_at }} GST</div>
                        <div class="mb-0_5"><span class="text-black fw-bold">Shipping address:
                            </span>{{ $order->shipping_address }}</div>
                        <div class="mb-0_5"><span class="text-black fw-bold">Billing address:
                            </span>{{ $order->billing_address }}</div>
                        <div class="mb-0"><span class="text-black fw-bold">Payment Info:
                            </span>&#42;&#42;&#42;&#42;&#42;{{ $transaction->credit_card_info }}</div>
                    </div>
                </div>
                <div class="product_list">
                    <table style="border-collapse: collapse" class="">
                        <thead>
                            <tr>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">&#35;</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey min-width-16">Name</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Size</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Unit Price</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Quantity</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $key => $product)
                                <tr>
                                    <td class="vertical-align-top py-1 border-grey fw-bold pe-1">{{ $key + 1 }}
                                    </td>
                                    <td class="vertical-align-top py-1 border-grey pe-3 min-width-16">
                                        {{ $product->pivot->product_name }}</td>
                                    <td class="vertical-align-top py-1 border-grey pe-1">{{ $product->pivot->size }}
                                    </td>
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
                <div class="d-flex justify-content-end my-2">
                    <div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">GST:
                            </span>&#36;{{ $order->gst }}</div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">PST:
                            </span>&#36;{{ $order->pst }}</div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">HST:
                            </span>&#36;{{ $order->hst }}</div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">Subtotal:
                            </span>&#36;{{ $order->sub_total }}</div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">Shipping
                                charge: </span>&#36;{{ $order->shipping_charge }}</div>
                        <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">TOTAL:
                            </span>&#36;{{ $order->total }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
