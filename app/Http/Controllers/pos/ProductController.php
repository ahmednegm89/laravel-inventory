<?php

namespace App\Http\Controllers\pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductAll()
    {
        $products = Product::all();
        return view('backend.product.product_all', compact('products'));
    }

    public function ProductAdd()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.product.product_add', compact('supplier', 'unit', 'category'));
    }

    public function ProductStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'supplier_id' => 'required|exists:suppliers,id',
            'unit_id' => 'required|exists:units,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Product added successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('product.all'))->with($notification);
    }

    public function ProductEdit($id)
    {
        $product = Product::findorfail($id);
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.product.product_edit', compact('product', 'supplier', 'unit', 'category'));
    }

    public function ProductUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:products,name,$id",
            'supplier_id' => 'required|exists:suppliers,id',
            'unit_id' => 'required|exists:units,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findorfail($id);

        $product->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'product updated successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('product.all'))->with($notification);
    }

    public function ProductDelete($id)
    {
        Product::findorfail($id)->delete();
        $notification = [
            'message' => 'product deleted successfully',
            'alert-type' => 'danger',
        ];
        return redirect(route('product.all'))->with($notification);
    }
}
