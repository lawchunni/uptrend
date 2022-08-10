<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $title = 'Admin | Inquiry';
        $search = $request->query('search');
        if ($search) {
            $inquiries = Inquiry::latest()->where('name', 'LIKE', '%' . $search . "%")->paginate(10)->withQueryString();
        } else {
            $inquiries = Inquiry::latest()->paginate(10);
        }
        return view('/admin/inquiry/index', compact('inquiries', 'title', 'search'));
    }
    /**
     * destroy function
     *
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $inquiry = Inquiry::find($id);
        if ($inquiry->delete()) {
            session()->flash('success', 'Inquiry was deleted');
            return redirect('/admin/inquiry');
        }
        session()->flash('error', 'There was a problem deleting the Inquiry');
        return redirect('/admin/inquiry');
    }
}
