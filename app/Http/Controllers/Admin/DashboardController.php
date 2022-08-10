<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * index function for admin dashboard
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $title = 'Admin | Dashboard';

        // order start
        $orderCount = Order::all()->count();
        $pendingOrderCount = Order::where('order_status', '=', 'pending')->count();
        $deliveredOrderCount = Order::where('order_status', '=', 'delivered')->count();
        $avgOrderValue = Order::where('order_status', '=', 'delivered')->orWhere('order_status', '=', 'confirmed')->avg('total');
        // order end

        // summary start
        $productCount = Product::all()->count();
        $categoryCount = Category::all()->count();
        $userCount = User::all()->count();
        $inquiryCount = Inquiry::all()->count();
        // summary end

        // pie chart
        $productByCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        $productByGender = Gender::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();
        // monthly sales 
        $sales = Order::where('order_status', '=', 'delivered')
            ->orWhere('order_status', '=', 'confirmed')
            ->selectRaw('year(created_at) year, monthname(created_at) month,count(*) as count, sum(total) as sales')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();


        return view('/admin/dashboard/index', compact(
            'title',
            'orderCount',
            'pendingOrderCount',
            'deliveredOrderCount',
            'avgOrderValue',
            'productCount',
            'categoryCount',
            'userCount',
            'inquiryCount',
            'productByCategory',
            'productByGender',
            'sales'
        ));
    }
}
