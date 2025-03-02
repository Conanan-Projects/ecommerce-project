@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Sub Category - Admin Panel
@endsection
@section('admin_layout')
<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">All Sub Categories</h5>
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
                          <th>Sub Category</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($subcategories as $subcat)
                        <tr>
                          <td>{{$subcat->id}}</td>
                          <td>{{$subcat->subcategory_name}}</td>
                          <td>{{$subcat->category->category_name}}</td>
                          <td><a href="{{route('show.subcategory', $subcat->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{route('delete.subcategory',$subcat->id)}}" method="POST">
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