<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class OrderHistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Order History";

        $orders = Auth::user()->orders;

        return view('auth.order_history.index', compact('title', 'orders'));
    }

    public function show($id)
    {
        $title = "Order Detail";

        $order = Order::find($id);
        $user = User::find($order->user_id);
        // echo $order;
        // die;

        return view('auth.order_history.show', compact('title', 'order', 'user'));
    }
    public function invoice($id)
    {
        $title = "Invoice";

        $order = Order::find($id);
        $user = User::find($order->user_id);
        $transaction = Transaction::where('order_id', '=', $id)->first();
        // var_dump($transaction);
        // die;
        return view('auth.order_history.invoice', compact('title', 'order', 'user', 'transaction'));
    }

}