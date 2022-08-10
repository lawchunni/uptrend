<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Product';

        // categories and sizes for sidebar
        $categories = Category::all();
        $sizes = Size::all();

        // category filter
        $categoryFilterStr = '';
        $categoryFilter = [];
        $categoryIds = [];

        // size filter
        $sizeFilterStr = '';
        $sizeFilter = [];
        $sizeIds = [];

        // search
        $search = $request->query('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')
                ->paginate(12)->withQueryString();
        } else if (empty($request->query('category')) && empty($request->query('size'))) {
            $products = Product::with(['product_media', 'categories'])
                ->paginate(12);
        } else {

            if ($request->query('category')) {
                $categoryFilterStr = $request->query('category');
                $categoryFilter = explode(',', $categoryFilterStr);
                $categoryIds = Category::whereIn('title', $categoryFilter)->get('id');
            }

            if ($request->query('size')) {
                $sizeFilterStr = $request->query('size');
                $sizeFilter = explode(',', $sizeFilterStr);
                $sizeIds = Size::whereIn('name', $sizeFilter)->get('id');
            }

            if (count($sizeIds) > 0 && count($categoryIds) > 0) {
                $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })
                    ->whereIn('size_id', $sizeIds)
                    ->paginate(12)->withQueryString();
            } else if (count($sizeIds) > 0) {
                $products = Product::whereIn('size_id', $sizeIds)
                    ->paginate(12)->withQueryString();
            } else {
                $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })
                    ->paginate(12)->withQueryString();
            }
        }
        return view(
            'products/index',
            compact(
                'title',
                'categories',
                'sizes',
                'products',
                'categoryFilter',
                'sizeFilter',
                'search'
            )
        );
    }
    /**
     * gender filter for product list
     *
     * @param [type] $gender
     * @param Request $request
     * @return void
     */
    public function genderFilter($gender, Request $request)
    {
        $title = ucfirst($gender);

        // categories and sizes for sidebar
        $categories = Category::all();
        $sizes = Size::all();

        // category filter
        $categoryFilterStr = '';
        $categoryFilter = [];
        $categoryIds = [];

        // size filter
        $sizeFilterStr = '';
        $sizeFilter = [];
        $sizeIds = [];

        // gender filter
        $genderId = Gender::where('name', $gender)->get('id');

        if (empty($request->query('category')) && empty($request->query('size'))) {
            $products = Product::whereIn('gender_id', $genderId)
                ->paginate(12)->withQueryString();
        } else {

            if ($request->query('category')) {
                $categoryFilterStr = $request->query('category');
                $categoryFilter = explode(',', $categoryFilterStr);
                $categoryIds = Category::whereIn('title', $categoryFilter)->get('id');
            }

            if ($request->query('size')) {
                $sizeFilterStr = $request->query('size');
                $sizeFilter = explode(',', $sizeFilterStr);
                $sizeIds = Size::whereIn('name', $sizeFilter)->get('id');
            }

            if (count($sizeIds) > 0 && count($categoryIds) > 0) {
                $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })
                    ->whereIn('size_id', $sizeIds)
                    ->whereIn('gender_id', $genderId)
                    ->paginate(12)->withQueryString();
            } else if (count($sizeIds) > 0) {
                $products = Product::whereIn('size_id', $sizeIds)
                    ->whereIn('gender_id', $genderId)
                    ->paginate(12)->withQueryString();
            } else {
                $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })->whereIn('gender_id', $genderId)->paginate(12)->withQueryString();
            }
        }
        return view(
            'products/index',
            compact(
                'title',
                'categories',
                'sizes',
                'products',
                'categoryFilter',
                'sizeFilter'
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('product_media')
            ->where('slug', $slug)
            ->first();
        $title = $product->name;
        return view(
            'products/show',
            compact(
                'title',
                'product'
            )
        );
    }
}
