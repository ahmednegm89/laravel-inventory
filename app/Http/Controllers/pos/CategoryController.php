<?php

namespace App\Http\Controllers\pos;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $categories = Category::all();
        return view('backend.category.category_all', compact('categories'));
    }
    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:Categories',
        ]);

        Category::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Category added successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('category.all'))->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findorfail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:Categories,name,$id",
        ]);

        $category = Category::findorfail($id);

        $category->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Category updated successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('category.all'))->with($notification);
    }

    public function CategoryDelete($id)
    {
        Category::findorfail($id)->delete();
        $notification = [
            'message' => 'Category deleted successfully',
            'alert-type' => 'danger',
        ];
        return redirect(route('category.all'))->with($notification);
    }
}
