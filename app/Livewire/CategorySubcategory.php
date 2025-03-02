<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySubcategory extends Component
{
    public $categories = [];
    public $subcategories = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function mount($selectedCategory = null, $selectedSubcategory = null)
    {
        $this->categories = Category::all(); // Load all categories

        // Pre-select category and load related subcategories if editing
        if ($selectedCategory) {
            $this->selectedCategory = $selectedCategory;
            $this->subcategories = Subcategory::where('category_id', $selectedCategory)->get();
        } else {
            $this->subcategories = []; // Empty by default for new products
        }

        $this->selectedSubcategory = $selectedSubcategory; // Preload subcategory
    }

    public function updatedSelectedCategory($categoryId)
    {
        // Load subcategories when category is changed
        $this->subcategories = Subcategory::where('category_id', $categoryId)->get();
        $this->selectedSubcategory = null; // Reset subcategory on change

    }

    public function render()
    {
        return view('livewire.category-subcategory');
    }
}
