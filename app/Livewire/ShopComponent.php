<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ShopComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('livewire.shop-component', compact('categories', 'products', 'subcategories'));
    }
}
