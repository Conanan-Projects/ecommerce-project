@extends('seller.layouts.layout')
@section('seller_page_title')
Add Product

@endsection
@section('seller_layout')
<div class="card">
  <div class="card-header">
      <h5 class="card-title mb-0">Add Product</h5>
  </div>
  <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if(@session('success'))
          <div class="alert alert-success">
              {{session('success')}}
          </div>
      @endif
      <form action="{{route('vendor.product.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <label for="product_name" class="fw-bold mb-2">Product Name</label>
          <input type="text" class="form-control mb-2" name="product_name" placeholder="Lenovo IdealPad 5 Pro">

          <label for="description" class="fw-bold mb-2">Description</label>
          <textarea typ name="description" class="form-control mb-2" cols="30" rows="10" id="description"></textarea>

          <label for="images" class="fw-bold mb-2">Upload Your Product Images</label>
          <input type="file" name="images[]" class="form-control mb-2" multiple>

          <label for="sku" class="fw-bold mb-2">SKU</label>
          <input type="text" class="form-control mb-2" name="sku" placeholder="LXD3402">

          <livewire:category-subcategory/>

          <label for="store_id" class="fw-bold mb-2">Select Your Store For This Product</label>
          <select name="store_id" id="store_id" class="form-control mb-2">
            @foreach ($stores as $store )
            <option value="{{$store->id}}">{{$store->store_name}}</option>
            @endforeach
          </select>

          <label for="regular_price" class="fw-bold mb-2">Product Regular Price</label>
          <input type="number" class="form-control mb-2" name="regular_price">

          <label for="discounted_price" class="fw-bold mb-2">Discounted Price (If any)</label>
          <input type="number" class="form-control mb-2" name="discounted_price">

          <label for="tax_rate" class="fw-bold mb-2">Tax Rate</label>
          <input type="number" class="form-control mb-2" name="tax_rate">

          <label for="stock_quantity" class="fw-bold mb-2">Stock Quantity</label>
          <input type="number" class="form-control mb-2" name="stock_quantity">

          <label for="slug" class="fw-bold mb-2">Slug</label>
          <input type="text" class="form-control mb-2" name="slug">

          <label for="meta_title" class="fw-bold mb-2">Meta Title</label>
          <input type="text" class="form-control mb-2" name="meta_title">

          <label for="meta_description" class="fw-bold mb-2">Meta Description</label>
          <input type="text" class="form-control mb-2" name="meta_description">

          <button type="submit" class="btn btn-primary w-100 mt-2">Add Product</button>
      </form>
  </div>
</div>

@endsection