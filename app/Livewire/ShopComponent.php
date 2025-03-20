<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ShopComponent extends Component
{
    public $selectedSubcategory = null;
    public $selectedCategory = null;
    public $products;

    public function mount()
    {
        $this->products = Product::all(); // Load all products initially
    }

    public function filterBySubcategory($subcategoryId)
    {
        $this->selectedSubcategory = $subcategoryId;
        $this->updateProducts();
    }

    public function filterByCategory($categoryName)
    {
        $this->selectedCategory = $categoryName;
        $this->updateProducts();
    }

    public function updateProducts()
    {
        $query = Product::query();

        if ($this->selectedSubcategory) {
            $query->where('subcategory_id', $this->selectedSubcategory);
        }

        if ($this->selectedCategory) {
            $query->whereHas('category', function ($q) {
                $q->where('category_name', $this->selectedCategory);
            });
        }

        $this->products = $query->get();
    }

    public function clearFilters()
    {
        $this->selectedSubcategory = null;
        $this->selectedCategory = null;
        $this->products = Product::all(); // Reset to show all products
    }


    public function render()
    {
        $categories = Category::with('subcategories')->get();
        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $this->products,
        ]);
    }
}
