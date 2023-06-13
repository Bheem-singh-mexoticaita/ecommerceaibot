@extends('layouts.Admin.app')
@section('title', 'All Shipping')
@section('admincontent')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> All Shipping
    </h3>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
        <li class="breadcrumb-item active" aria-current="page">All Shipping </li>
      </ol>
    </nav>

  </div>
  <div class="append_class">
    </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sno </th>
                    <th>Shipping ID</th>
                    <th>Shiiping Address</th>
                    <th>Deliver Time</th>
                    <th>Deliver Charge</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($Shipping as $key => $item)
            <tr>
            <td>{{ $key+1 }}</td>
            <td> {{ $item->shippingid }}  </td>
            <td>{{ $item->shippingcity }}, {{ $item->shippingstate }} ,{{ $item->shippingcountry }}</td>
            <td>  {{ $item->Shippingdelivery_time }} </td>
            <td> ${{ $item->Shippingdelivery_charge }}</td>
            <td> @if($item->status =='active' ) <div class="mt-sm-1 d-block"> <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Active</span></div>  @else <div class="mt-sm-1 d-block"> <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">Inactive</span>  </div> @endif </td>
            <td> <a href="{{ route('admin.edit.product', $item->id) }}" class="btn btn-info text-white">Edit</a>  <a href="{{ route('admin.delete.product', $item->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>



@endsection
