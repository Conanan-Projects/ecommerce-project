<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        
        return view('admin.product_attribute.create');
    }

    public function manage()
    {
        $attributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage',compact('attributes'));
    }

    public function createattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value'=> 'unique:default_attributes|max:100|min:1',
        ]);

        DefaultAttribute::create($validate_data);

        return redirect()->back()->with('success','Attribute Added Successfully');
    }

    public function showattribute(Request $request, $attribute_id){
        $attribute = DefaultAttribute::find($attribute_id);
        return view('admin.product_attribute.edit', compact('attribute'));
    }

    public function updateattribute(Request $request, $attribute_id){
        $validate_data = $request->validate([
            'attribute_value'=> 'unique:default_attributes|max:100|min:1',
            ]);
            DefaultAttribute::find($attribute_id)->update($validate_data);
            return redirect()->back()->with('success','Attribute Updated Successfully');
    }

    public function deleteattribute(Request $request, $attribute_id){
        $attribute = DefaultAttribute::find($attribute_id);
        DefaultAttribute::find($attribute_id)->delete();
        return redirect()->back()->with('success','Attribute Deleted Successfully');
    }
}
