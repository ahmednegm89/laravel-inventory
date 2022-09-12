<?php

namespace App\Http\Controllers\pos;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
        $customers = Customer::all();
        return view('backend.customer.customer_all', compact('customers'));
    }
    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }

    public function CustomerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:customers',
            'customer_img' => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $img = $request->file('customer_img');
        $img_name = 'customer' . $img->getClientOriginalName() . uniqid()  . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('upload/customer'), $img_name);
        Customer::create([
            'name' => $request->name,
            'customer_img' => $img_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Customer added successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('customer.all'))->with($notification);
    }

    public function CustomerEdit($id)
    {
        $customer = Customer::findorfail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function CustomerUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:customers,name,$id",
            'customer_img' => 'nullable|image|mimes:jpeg,jpg,png|max:3072',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $customer = Customer::findorfail($id);
        $img_name = $customer->customer_img;
        if ($request->hasFile('customer_img')) {
            unlink(public_path('upload/customer/') . $customer->customer_img);
            $img = $request->file('customer_img');
            $img_name = 'customer' . $img->getClientOriginalName() . uniqid()  . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload/customer'), $img_name);
        }
        $customer->update([
            'name' => $request->name,
            'customer_img' => $img_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'customer updated successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('customer.all'))->with($notification);
    }

    public function CustomerDelete($id)
    {
        $customer = Customer::findorfail($id);
        $customer->delete();
        unlink(public_path('upload/customer/') . $customer->customer_img);
        $notification = [
            'message' => 'Customer deleted successfully',
            'alert-type' => 'danger',
        ];
        return redirect(route('customer.all'))->with($notification);
    }
}
