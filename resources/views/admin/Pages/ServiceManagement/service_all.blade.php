@extends('layouts.Admin.app')
@section('title', 'All Service')
@section('admincontent')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> All Services
    </h3>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category </a></li>
        <li class="breadcrumb-item active" aria-current="page">All Services</li>
      </ol>
    </nav>

  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sno </th>
                    <th>Service Image</th>
                    <th>Service Name</th>
                    <th>Service Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('/upload/product/'.$item->title.'/Single_image/'. $item->image) }}" alt="{{ $item->category_image }}"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->product_code }}</td>
                    <td>
                      <a href="{{ route('admin.edit.services', $item->id) }}" class="btn btn-info text-white">Edit</a>
                        <a href="{{ route('admin.delete.services', $item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>



@endsection
