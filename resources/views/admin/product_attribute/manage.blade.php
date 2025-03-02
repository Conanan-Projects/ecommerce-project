@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Default Attribute - Admin Panel
@endsection
@section('admin_layout')
<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">All Default Attributes</h5>
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
                          <th>Attribute</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($attributes as $att)
                        <tr>
                          <td>{{$att->id}}</td>
                          <td>{{$att->attribute_value}}</td>
                          <td><a href="{{route('show.attribute', $att->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{route('delete.attribute',$att->id)}}" method="POST">
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