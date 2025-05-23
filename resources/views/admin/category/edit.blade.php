@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Category</h5>
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
            <form action="{{ route('update.category', $category_info->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="category_name" class="fw-bold mb-2">Category Name</label>
                <input type="text" class="form-control" name="category_name" value="{{$category_info->category_name}}">

                <button type="submit" class="btn btn-primary w-100 mt-2">Update Category</button>
            </form>
        </div>
    </div>
@endsection
