@extends('seller.layouts.layout')
@section('seller_page_title')
    Edit Store
@endsection
@section('seller_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit seller</h5>
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
            <form action="{{ route('update.store', $stores->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="store_name" class="fw-bold mb-2">Store Name</label>
                <input type="text" class="form-control" name="store_name" value="{{$stores->store_name}}">

                <label for="details" class="fw-bold mb-2">Store Description</label>
                <textarea name="details" id="details" cols="30" rows="10" class="form-control">{{ $stores->details }}</textarea>

                <label for="slug" class="fw-bold mb-2">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$stores->slug}}">

                <button type="submit" class="btn btn-primary w-100 mt-2">Update Store</button>
            </form>
        </div>
    </div>
@endsection
