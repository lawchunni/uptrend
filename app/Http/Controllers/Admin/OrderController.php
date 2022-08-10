<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    /**
     * Index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        $title = 'Admin | Order';

        $search = $request->query('search');

        if ($search) {
            $orders = Order::where('order_status', 'LIKE', '%' . $search . '%')
                ->orWhere('shipping_address', 'LIKE', '%' . $search . '%')
                ->orWhere('billing_address', 'LIKE', '%' . $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('products', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)->withQueryString();
        } else {
            $orders = Order::with(['products', 'user'])->latest()->paginate(10);
        }
        return view('/admin/order/index', compact('title', 'orders', 'search'));
    }

    /**
     * update function
     *
     * @return void
     */
    public function update(Request $request, Order $order)
    {

        $valid = $request->validate([
            'id' => 'required|integer',
            'order_status' => 'required|in:pending,confirmed,delivered,cancelled',
        ]);

        $order->update($valid);

        if ($order->save()) {
            session()->flash('success', 'Order status was successfully updated');
        } else {
            session()->flash('error', 'There was a problem updating the Order status');
        }
        return redirect()->route('admin_order_list');
    }
}
