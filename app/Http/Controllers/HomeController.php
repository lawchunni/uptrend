<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductMedia;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HomeController extends Controller
{

    /**
     * Show the home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Home';

        $genders = Gender::all();

        $featured = Product::with(['product_media'])->whereHas('categories', function ($query) {
            return $query->where('title', '=', 'Featured');
        })->get();

        $categoryCollection = Category::where('title', '<>', 'featured')
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->offset(0)
            ->limit(2)
            ->get();

        $genderCollection = Gender::withCount('products')
            ->orderBy('products_count', 'desc')
            ->offset(0)
            ->limit(3)
            ->get();

        return view('home', compact(
            'title',
            'genders',
            'featured',
            'categoryCollection',
            'genderCollection'
        ));
    }
}
