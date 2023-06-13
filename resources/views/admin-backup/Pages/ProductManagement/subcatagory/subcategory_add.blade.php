@extends('layouts.Admin.app')
@section('title', 'Add Subcatagory  Catagories')
@section('admincontent')
<div class="page-header">
    <h3 class="page-title">Add Subcatagory
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Subcatagory </a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Subcatagory</li>
      </ol>
    </nav>
  </div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.store.subcategory') }}" method="POST" enctype="multipart/form-data" id="form__data">  @csrf
            <div class="form-group">
                <label for="exampleSelectGender">Category Name</label>
            <select class="form-select" name="category_name" id="category_name">
              <option selected>Select Category</option>
              @foreach ($category as $option)
              <option  catatgories_oid ="{{ $option->id }}" value="{{ $option->category_name }}" {{ old('category_name') == $option->category_name ? 'selected' : '' }}>{{ $option->category_name }}</option>
             @endforeach
                </select>
        <input type="hidden" name="category_id" id="category_id" value="">
                @error('category_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
          <div class="form-group">
            <label for="exampleInputName1">SubCategory Name</label>
            <input name="subcategory_name" type="text"  value ="{{old('subcategory_name')}}"class="form-control @error('subcategory_name') is-invalid @enderror" />
            @error('subcategory_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
