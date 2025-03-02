@extends('seller.layouts.layout')
@section('seller_page_title')
    Edit Product
@endsection
@section('seller_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>w
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(@session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <form action="{{ route('update.product', $products->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="product_name" class="fw-bold mb-2">Product Name</label>
                <input type="text" class="form-control mb-2" name="product_name" value="{{ $products->product_name }}">
            
                <label for="description" class="fw-bold mb-2">Description</label>
                <textarea name="description" class="form-control mb-2" cols="30" rows="10" id="description">{{ $products->description }}</textarea>
            
                <label for="sku" class="fw-bold mb-2">SKU</label>
                <input type="text" class="form-control mb-2" name="sku" value="{{ $products->sku }}">
            
                <livewire:category-subcategory 
                    :selectedCategory="$products->category_id" 
                    :selectedSubcategory="$products->subcategory_id" 
                />

            
                <!-- Added 'name' attributes to the following inputs -->
                <label for="regular_price" class="fw-bold mb-2">Product Regular Price</label>
                <input type="number" class="form-control mb-2" name="regular_price" value="{{ $products->regular_price }}">
            
                <label for="discounted_price" class="fw-bold mb-2">Discounted Price (If any)</label>
                <input type="number" class="form-control mb-2" name="discounted_price" value="{{ $products->discounted_price }}">
            
                <label for="tax_rate" class="fw-bold mb-2">Tax Rate</label>
                <input type="number" class="form-control mb-2" name="tax_rate" value="{{ $products->tax_rate }}">
            
                <label for="stock_quantity" class="fw-bold mb-2">Stock Quantity</label>
                <input type="number" class="form-control mb-2" name="stock_quantity" value="{{ $products->stock_quantity }}">
            
                <label for="slug" class="fw-bold mb-2">Slug</label>
                <input type="text" class="form-control mb-2" name="slug" value="{{ $products->slug }}">
            
                <label for="meta_title" class="fw-bold mb-2">Meta Title</label>
                <input type="text" class="form-control mb-2" name="meta_title" value="{{ $products->meta_title }}">
            
                <label for="meta_description" class="fw-bold mb-2">Meta Description</label>
                <input type="text" class="form-control mb-2" name="meta_description" value="{{ $products->meta_description }}">
            
                <button type="submit" class="btn btn-primary w-100 mt-2">Update Product</button> <!-- Fixed button label -->
            </form>
        </div>
    </div>
@endsection
