@extends('layouts.Admin.app')
@section('title', 'All Products')
@section('admincontent')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> All Products
    </h3>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category </a></li>
        <li class="breadcrumb-item active" aria-current="page">All Products</li>
      </ol>
    </nav>

  </div>
  <div class="append_class">
    <a href="{{ route('admin.add.product') }}" class="btn btn-primary me-2"><i class="fe fe-plus-circle"></i> Add Product</a>

    </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sno </th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($products) --}}
                @foreach ($products as $key => $item)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('/upload/product/'.$item->title.'/Single_image/'. $item->image) }}" alt=""></td>
                    <td>{{ $item->description }}</td>
                    <td> <strong>Unit Price: </strong>${{ $item->price }}<br><strong>Selling Price: </strong>{{ $item->special_price }}</td>
                    <td> <strong>Catagories: </strong>{{ $item->category }}<br><strong>Sub Catagories: </strong>{{ $item->subcategory }}</td>
                     <td>  @if($item->productfreature =='1' ||$item->productfreature ==1)<i class="fa fa-check-circle text-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Yes" aria-describedby="tooltip597346"> </i>  @else <i class="fa fa-times-circle text-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="No"></i> @endif </td>
                     <td>  @if($item->status =='active' ) <div class="mt-sm-1 d-block"> <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Active</span></div>  @else <div class="mt-sm-1 d-block"> <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">Inactive</span>  </div> @endif </td>                                      <td>
                     <a href="{{ route('admin.edit.product', $item->id) }}" class="btn btn-info text-white">Edit</a>
                     <a href="{{ route('admin.delete.product', $item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>



@endsection
