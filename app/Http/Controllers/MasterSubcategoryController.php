<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MasterSubcategoryController extends Controller
{
    public function storesubcat(Request $request)
    {
        $validate_data = $request->validate([
            'subcategory_name' => [
                'required',
                'max:100',
                'min:1',
                Rule::unique('subcategories')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                }),
            ],
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create($validate_data);

        return redirect()->back()->with('success', 'Sub Category Added Successfully');
    }

    public function showsubcat($id)
    {
        $subcategory_info = Subcategory::find($id);
        $categories = Category::all();
        return view('admin.sub_category.edit', compact('subcategory_info', 'categories'));
    }

    public function updatesubcat(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:subcategories|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory->update($validate_data);
        return redirect()->back()->with('success', 'Sub Category Updated Successfully');
    }

    public function deletesubcat(Request $request, $id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Sub Category Deleted Successfully');
    }
}
