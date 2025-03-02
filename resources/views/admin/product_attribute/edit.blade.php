@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Attribute - Admin Panel
@endsection
@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Attribute</h5>
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
            <form action="{{ route('update.attribute', $attribute->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="attribute_value" class="fw-bold mb-2">Attribute Name</label>
                <input type="text" class="form-control" name="attribute_value" value="{{$attribute->attribute_value}}">

                <button type="submit" class="btn btn-primary w-100 mt-2">Update Attribute</button>
            </form>
        </div>
    </div>
@endsection
