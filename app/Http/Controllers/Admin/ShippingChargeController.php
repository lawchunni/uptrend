<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;
use Exception;

class ShippingChargeController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $title = 'Admin | Shipping Charge';

        $search = $request->query('search');
        if ($search) {
            $shippingcharges = ShippingCharge::latest()->where('continent', 'LIKE', '%' . $search . "%")->paginate(10)->withQueryString();
        } else {
            $shippingcharges = ShippingCharge::latest()->paginate(10);
        }

        return view('/admin/shipping-charge/index', compact('shippingcharges', 'title', 'search'));
    }
    /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Shipping Charge';
        return view('/admin/shipping-charge/create', compact('title'));
    }
    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'continent' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'charge' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        try {

            ShippingCharge::create($valid);

            session()->flash('success', 'Shipping Charge successfully created!');

            return redirect('/admin/shipping-charge');
        } catch (Exception $e) {
            session()->flash('error', 'There was a problem creating the Shipping Charge!');

            return redirect('/admin/shipping-charge');
        }
    }
    /**
     * edit function
     *
     * @return void
     */
    public function edit(ShippingCharge $shippingcharge)

    {
        $title = 'Admin | Shipping Charge';
        return view('/admin/shipping-charge/edit', compact('shippingcharge', 'title'));
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
            'continent' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'charge' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $shippingcharge = ShippingCharge::find($valid['id']);

        $shippingcharge->update($valid);

        if ($shippingcharge->save()) {
            session()->flash('success', 'Shipping Charge was successfully updated!');
        } else {
            session()->flash('error', 'There was a problem updating the Shipping Charge!');
        }
        return redirect('/admin/shipping-charge');
    }
    /**
     * destroy function
     *
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $shippingcharge = ShippingCharge::find($id);
        if ($shippingcharge->delete()) {
            session()->flash('success', 'Shipping Charge record has been deleted!');
            return redirect('/admin/shipping-charge');
        }
        session()->flash('error', 'There was a problem deleting the Shipping Charge!');
        return redirect('/admin/shipping-charge');
    }
}
