@extends('layouts.Admin.app')
@section('title', 'Edit  Catagories')
@section('admincontent')
<div class="page-header">
    <h3 class="page-title">Add Category
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category </a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Catagory</li>
      </ol>
    </nav>
  </div>


  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.update.category',$category->id) }}" method="POST" enctype="multipart/form-data">

        {{-- <form action="{{ route('admin.productcatagory.update', $category->id) }}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
          <div class="form-group">
            <label for="exampleInputName1">Category Name</label>
            <input name="category_name" type="text" class="form-control" value="{{ $category->category_name }}" />                <span class="category_name-error"></span>
          </div>
          <div class="form-group">
            <label>Category Image</label>
            <input type="file" name="img" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input name="category_image" class="form-control file-upload-info" type="file" id="image" />
              <span class="category_image-error"></span>
            </div>

          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-9 text-secondary">
                <img id="showImage" src="{{ asset('upload/category/' . $category->category_image) }}" alt="profile_preview" class="img-thumbnail shadow-sm" width="110">
            </div>
        </div>


          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
