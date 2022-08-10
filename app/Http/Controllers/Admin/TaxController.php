<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class TaxController extends Controller
{
    /**
     * Index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        $title = 'Admin | Tax';
        $search = $request->query('search');

        if ($search) {
            $taxes = Tax::where('province', 'LIKE', '%' . $search . '%')->orWhere('province_short', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(10)->withQueryString();
        } else {
            $taxes = Tax::orderBy('id', 'DESC')->paginate(10);
        }
        return view('/admin/tax/index', compact('title', 'taxes', 'search'));
    }

    /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Add Tax';
        return view('/admin/tax/create', compact('title'));
    }

    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'province' => 'required|string|max:255',
            'province_short' => 'required|string|max:255',
            'gst' => 'required|numeric|max:99.99',
            'pst' => 'required|numeric|max:99.99',
            'hst' => 'required|numeric|max:99.99',
        ]);
        try {

            Tax::create($valid);

            session()->flash('success', 'Tax successfully created!');

            return redirect()->route('adminTaxIndex');
        } catch (Exception $e) {
            session()->flash('error', 'There was a problem creating the Tax!');

            return redirect()->route('adminTaxIndex');
        }
    }

    /**
     * edit function
     *
     * @return void
     */
    public function edit(Tax $tax)

    {
        $title = 'Edit Tax';
        return view('/admin/tax/edit', compact('tax', 'title'));
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
            'province' => 'required|string|max:255',
            'province_short' => 'required|string|max:255',
            'gst' => 'required|numeric|max:99.99',
            'pst' => 'required|numeric|max:99.99',
            'hst' => 'required|numeric|max:99.99',
        ]);

        $tax = Tax::find($valid['id']);

        $tax->update($valid);

        if ($tax->save()) {
            session()->flash('success', 'Tax was successfully updated');
        } else {
            session()->flash('error', 'There was a problem updating the Tax!');
        }
        return redirect()->route('adminTaxIndex');
    }

    /**
     * destroy function
     *
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $tax = Tax::find($id);
        if ($tax->delete()) {
            session()->flash('success', 'Tax was deleted');
            return redirect()->route('adminTaxIndex');
        }
        session()->flash('error', 'There was a problem deleting the Tax');

        return redirect()->route('adminTaxIndex');
    }
}
