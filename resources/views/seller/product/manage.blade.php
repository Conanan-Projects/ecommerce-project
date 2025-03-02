@extends('seller.layouts.layout')
@section('seller_page_title')
Manage Products
@endsection
@section('seller_layout')
<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">All Products</h5>
								</div>

                @if(@session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

								<div class="card-body">
									<div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($products as $product)
                        <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->stock_quantity}}</td>
                          <td>{{$product->regular_price}}</td>
                          <td><a href="{{route('show.product', $product->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{route('delete.product', $product->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                            
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
								</div>
							</div>
@endsection