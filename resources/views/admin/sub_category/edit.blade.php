@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Sub Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Sub Category</h5>
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
            <form action="{{ route('update.subcategory', $subcategory_info->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="subcategory_name" class="fw-bold mb-2">Sub Category Name</label>
                <input type="text" class="form-control" name="subcategory_name" value="{{$subcategory_info->subcategory_name}}">

                <label for="category_id" class="fw-bold mb-2">Select Category</label>
                <select name="category_id" class="form-control" id="category_id">
                  @foreach($categories as $category) 
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                  @endforeach
                </select>
                
                <button type="submit" class="btn btn-primary w-100 mt-2">Update Sub Category</button>
            </form>
        </div>
    </div>
@endsection
