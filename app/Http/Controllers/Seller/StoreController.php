<?php

namespace App\Http\Controllers\Seller;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class StoreController extends Controller
{
    public function index()
    {
        return view('seller.store.create');
    }

    public function manage()
    {
        $userid = Auth::user()->id;
        $stores = Store::where('user_id', $userid)->get();
        return view('seller.store.manage', compact('stores'));
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'store_name' => 'unique:stores|max:100|min:1',
            'slug' => 'required|unique:stores',
            'details' => 'required',
        ]);

        Store::create([
            'store_name' => $request->store_name,
            'slug' => $request->slug,
            'details' => $request->details,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Store Created Successfully');
    }

    public function showstore($id)
    {
        $stores = Store::find($id);
        return view('seller.store.edit', compact('stores'));
    }

    public function update(Request $request, $id)
    {
        $stores = Store::findOrFail($id);
        $validate_data = $request->validate([
            'store_name' => 'unique:stores,store_name,' . $id . '|max:100|min:1',
            'slug' => 'required|unique:stores,slug,' . $id,
            'details' => 'required',

        ]);

        $stores->update($validate_data);
        return redirect()->back()->with('success', 'Store Updated Successfully');
    }

    public function delete(Request $request, $id)
    {
        Store::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Store Deleted Successfully');
    }
}
