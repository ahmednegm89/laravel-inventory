<?php

namespace App\Http\Controllers\pos;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }
    public function SupplierAdd()
    {
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:suppliers',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Supplier added successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('supplier.all'))->with($notification);
    }

    public function SupplierEdit($id)
    {
        $supplier = Supplier::findorfail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }

    public function SupplierUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:suppliers,name,$id",
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $supplier = Supplier::findorfail($id);

        $supplier->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Supplier updated successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('supplier.all'))->with($notification);
    }

    public function SupplierDelete($id)
    {
        Supplier::findorfail($id)->delete();
        $notification = [
            'message' => 'Supplier deleted successfully',
            'alert-type' => 'danger',
        ];
        return redirect(route('supplier.all'))->with($notification);
    }
}
