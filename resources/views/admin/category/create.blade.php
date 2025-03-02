@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create Category</h5>
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
            <form action="{{ route('store.category') }}" method="post">
                @csrf
                <label for="category_name" class="fw-bold mb-2">Category Name</label>
                <input type="text" class="form-control" name="category_name" placeholder="Computer">

                <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
            </form>
        </div>
    </div>
@endsection
