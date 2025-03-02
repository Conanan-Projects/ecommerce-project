<div>
    <label for="category_id" class="fw-bold mb-2">Category</label>
    <select class="form-control mb-2" name="category_id" wire:model.live="selectedCategory">
        <option value="">Select A Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>

    <label for="subcategory_id" class="fw-bold mb-2">Sub Category</label>
    <select class="form-control mb-2" name="subcategory_id" wire:model.live="selectedSubcategory">
        <option value="">Select A Sub Category</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" 
                {{ $selectedSubcategory == $subcategory->id ? 'selected' : '' }}>
                {{ $subcategory->subcategory_name }}
            </option>
        @endforeach
    </select>
</div>