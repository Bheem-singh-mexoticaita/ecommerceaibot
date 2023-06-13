@extends('layouts.Admin.app')
@section('title', 'All Catagories')
@section('admincontent')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> All SubCategory
    </h3>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> Sub Category </a></li>
        <li class="breadcrumb-item active" aria-current="page">All  Sub Catagory</li>
      </ol>
    </nav>

  </div>
  <div class="append_class">
    <a href="{{ route('admin.add.subcategory') }}" class="btn btn-primary me-2"><i class="fe fe-plus-circle"></i> Add Sub Category</a>

    </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sno </th>
                <th>Category Name</th>
                          <th>SubCategory Name</th>
                          <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subcategory as $key => $item)
              <tr>
                  <td>{{ $key+1 }}</td>
                          <td>{{ $item->category_name }}</td>
                          <td>{{ $item->subcategory_name }}</td>
                      <td>
                           <a href="{{ route('admin.edit.subcategory', $item->id) }}" class="btn btn-info text-white">Edit</a>
                      <a href="{{ route('admin.delete.subcategory', $item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                      </td>


                  </td>
              </tr>
              @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>



@endsection
