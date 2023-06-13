@extends('layouts.Admin.app')
@section('title', 'Add Products')
@section('admincontent')
<div class="page-header">
    <h3 class="page-title">Add Services
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dasboard </a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Services</li>
      </ol>
    </nav>
  </div>
        <div class="card">
            <div class="card-body p-4">
                <div class="form-body mt-4">
                    <form action="{{ route('admin.store.services') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Service
                                            Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror "
                                            placeholder="Enter service Title" autofocus>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Service
                                            Code</label>
                                        <input type="text" name="product_code"
                                            value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror "
                                            placeholder="Enter Service Code" autofocus>
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Services
                                            Image</label>
                                        <div class="text-secondary">
                                            <input name="image"
                                                class="form-control  @error('title') is-invalid @enderror "
                                                type="file" id="image" />
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="text-secondary">
                                            <img id="showImage" src="" alt="profile_preview"
                                                class="img-thumbnail shadow-sm" width="110">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Short
                                            Description</label>
                                        <textarea id="summernote" class="form-control @error('short_description') is-invalid @enderror "
                                            name="short_description">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label ">Long
                                            Description</label>
                                        <textarea name="long_description" class="form-control  @error('long_description') is-invalid @enderror" id="mytextarea"
                                            rows="3">{{ old('long_description') }}</textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input type="text" name="price"
                                                class="form-control @error('price') is-invalid @enderror "
                                                value="{{ old('price') }}" placeholder="00.00">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label">Special
                                                Price</label>
                                            <input type="text" name="special_price"
                                                class="form-control @error('special_price') is-invalid @enderror"
                                                value="{{ old('special_price') }}"
                                                value="{{ old('special_price') }}" placeholder="00.00">
                                            @error('special_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save
                                                    Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
@endsection
