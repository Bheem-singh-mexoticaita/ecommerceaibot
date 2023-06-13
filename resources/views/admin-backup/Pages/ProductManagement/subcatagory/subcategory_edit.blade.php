@extends('layouts.Admin.app')
@section('title', 'Edit  Subcatagory  Catagories')
@section('admincontent')
<div class="page-header">
    <h3 class="page-title">Edit  Subcatagory
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Subcatagory </a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Subcatagory</li>
      </ol>
    </nav>
  </div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.update.subcategory') }}" method="POST" enctype="multipart/form-data" id="form__data">  @csrf
            <input type="hidden" name="id" value="{{ $subcategory->id }}">
            <div class="form-group">
                <label for="exampleSelectGender">Category Name</label>
                <select class="form-select" name="category_name">
                    <option selected>Select Category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->category_name }}" {{ $item->category_name == $subcategory->category_name ? "selected" : "" }}>{{ $item->category_name }}</option>
                    @endforeach
                </select>
                @error('category_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
          <div class="form-group">
            <label for="exampleInputName1">SubCategory Name</label>
            <input name="subcategory_name" type="text" class="form-control" value="{{ $subcategory->subcategory_name }}" />
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
