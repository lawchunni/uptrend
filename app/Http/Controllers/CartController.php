<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Show the Cart item list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Shopping Cart';
        $session = $request->session()->get('cart') ?? [];

        if ($request->session()->has('shipping_addr_id')) {
            $request->session()->forget('shipping_addr_id');
        }

        $products = [];
        $subtotal = 0;
        $total_qty = 0;
        $disable_checkout = false;

        if ($session) {
            $products = Product::whereIn('id', array_keys($session))->with(['size', 'product_media'])->get();

            foreach ($products as $product) {
                // calc cart summary
                $subtotal +=
                    floatval($product->price) * $session[$product->id];
                $total_qty += $session[$product->id];
                // disable checkout button when out of stock item exists
                if ($product->quantity == 0 || $product->quantity < $session[$product->id]) {
                    $disable_checkout = true;
                }
            }
        }

        $subtotal = number_format($subtotal, 2);

        return view('cart/index', compact(
            'title',
            'products',
            'session',
            'subtotal',
            'total_qty',
            'disable_checkout'
        ));
    }

    /**
     * Add to Cart from product detail page logic
     *
     * @param Request $request
     * @param [type] $id product id
     * @return void
     */
    public function create(Request $request, $id)
    {
        $session = $request->session()->get('cart');
        if (isset($session[$id])) {
            $session[$id] = $session[$id] + 1;
        } else {
            $session[$id] = 1;
        }

        $request->session()->put('cart', $session);

        $prev_url = url()->previous();

        session()->flash('success', 'Item is added to cart successfully!');

        return redirect($prev_url);
    }

    /**
     * Update cart item quantity in session
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {

        $session = $request->session()->get('cart');
        $id = $request->input('id');
        $action = $request->input('action');

        if (!empty($action) && isset($session[$id])) {
            switch ($action) {
                case 'plus':
                    $session[$id] = $session[$id] + 1;
                    session()->flash('success', 'Item quantity is increased successfully!');
                    break;
                case 'minus':
                    if ($session[$id] == 1) {
                        unset($session[$id]);
                        session()->flash('success', 'Item is removed from cart successfully!');
                    } else {
                        $session[$id] = $session[$id] - 1;
                        session()->flash('success', 'Item quantity is decreased successfully!');
                    }
                    break;
                case 'delete':
                    unset($session[$id]);
                    session()->flash('success', 'Item is remove from cart successfully!');
                    break;
            }
            $request->session()->put('cart', $session);
        }

        return redirect()->route('cartIndex');
    }
}
