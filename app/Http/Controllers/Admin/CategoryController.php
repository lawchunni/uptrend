<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoryController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $title = 'Admin | Category';

        $search = $request->query('search');
        if ($search) {
            $categories = Category::latest()->where('title', 'LIKE', '%' . $search . "%")->paginate(10)->withQueryString();
        } else {
            $categories = Category::latest()->paginate(10);
        }

        return view('/admin/category/index', compact('categories', 'title', 'search'));
    }
    /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Category';
        return view('/admin/category/create', compact('title'));
    }
    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048'
        ]);
        if ($request->file('image')) {
            $path =  $request->file('image')->store('public');
        }

        $valid['image'] = basename($path ?? 'default.png');

        try {

            Category::create($valid);

            session()->flash('success', 'Category successfully created!');

            return redirect('/admin/category');
        } catch (Exception $e) {

            session()->flash('error', 'There was a problem creating the Category!');
            return redirect('/admin/category');
        }
    }
    /**
     * edit function
     *
     * @return void
     */
    public function edit(Category $category)

    {
        $title = 'Admin | Category';
        return view('/admin/category/edit', compact('category', 'title'));
    }
    /**
     * update function
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public');
        }

        $category = Category::find($valid['id']);

        $valid['image'] = basename($path ?? $category->image);

        $category->update($valid);

        if ($category->save()) {
            session()->flash('success', 'Category was successfully updated!');
        } else {
            session()->flash('error', 'There was a problem updating the Category!');
        }
        return redirect('/admin/category');
    }
    /**
     * destroy function
     *
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            session()->flash('success', 'Category was deleted');
            return redirect('/admin/category');
        }
        session()->flash('error', 'There was a problem deleting the Category');
        return redirect('/admin/category');
    }
}
