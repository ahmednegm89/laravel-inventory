<?php

namespace App\Http\Controllers\pos;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll()
    {
        $units = Unit::all();
        return view('backend.unit.unit_all', compact('units'));
    }
    public function UnitAdd()
    {
        return view('backend.unit.unit_add');
    }

    public function UnitStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:Units',
        ]);

        Unit::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Unit added successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('unit.all'))->with($notification);
    }

    public function UnitEdit($id)
    {
        $unit = Unit::findorfail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }

    public function UnitUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:Units,name,$id",
        ]);

        $Unit = Unit::findorfail($id);

        $Unit->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Unit updated successfully',
            'alert-type' => 'success',
        ];

        return redirect(route('unit.all'))->with($notification);
    }

    public function UnitDelete($id)
    {
        Unit::findorfail($id)->delete();
        $notification = [
            'message' => 'Unit deleted successfully',
            'alert-type' => 'danger',
        ];
        return redirect(route('unit.all'))->with($notification);
    }
}
