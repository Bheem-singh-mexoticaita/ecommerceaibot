@extends('layouts.Admin.app')
@section('title', 'Add Products')
@section('admincontent')
<div class="page-header">
    <h3 class="page-title">Add Products
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dasboard </a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Products</li>
      </ol>
    </nav>
  </div>
        <div class="card">
            <div class="card-body p-4">
                <div class="form-body mt-4">
                <form  method="POST" enctype="multipart/form-data" id="postproduct">
                <div class="row">
                <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Name * :</label>
                                <input type="hidden" name="ajaxurl" id="ajaxurl" value="{{ route('admin.store.product') }}">
                                <input type="text" placeholder="Enter name" class="form-control" name="title" value="{{ old('title') }}" id="title">
                               <span class="error" id="title-error"></span>
                            </div>
                            <div class="col-6">
                            <label class="form-label">Slug * :</label>
                                <input type="text" readonly  placeholder="Enter Slug" class="form-control" name="slug" value="" id="slug">
                                <span class="error" id="title-error"></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Warrenty(in Months)  :</label>
                                <input type="text" placeholder="45" class="form-control" name="warrenty" value="{{ old('warrenty') }}" id="warrenty">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Code *: </label>
                                <input type="text" readonly=""  id="product_code" name="product_code" value="" class="form-control  "  autofocus="">
                                <span class="error" id="product_code-error"></span>
                               </div>
                        </div>
                         <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Product Condition:</label>
                                <select class="form-select" name="remark" id="remark">
                                    <option value="none">None</option>
                                    <option value="sale">Sale</option>
                                    <option value="new">New</option>
                                    <option value="hot">Hot</option>
                                </select>                                        </div>
                            <div class="col-6">
                                <label>Total Stock *</label>
                                <input type="number" placeholder="Enter Stock" class="form-control" name="totalstock" value="" id="totalstock">
                                <span class="error" id="totalstock-error"></span>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                            <input type="hidden" name="ajax_url" id="ajax_url"  value="{{ route('admin.fetch.catagotries') }}">
                            <input type="hidden"   id="selected_sub_Catagory_name" name="selected_sub_Catagory_name" value="">
                                <label class="form-label">Product Category: </label>
                                <select class="form-select" name="category" id="category">
                                <option selected>Select Category</option>
                                @foreach ($category as $item)
                                <option catatgories_oid="{{ $item->id }}" value="{{ $item->category_name }}" {{ old('category') == $item->category_name ? 'selected' : '' }}  selected_category_name=""> {{ $item->category_name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                            <label for="inputProductType"class="form-label">Sub Category</label>
                            <select class="form-select" name="subcategory" id="subcategory"> </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Price * :</label>
                                <input type="text" placeholder="Enter Price" class="form-control" name="price" value="" id="price">
                                <span class="error" id="price-error"></span>
                            </div>
                            <div class="col-6">
                            <label class="form-label">Special Price :</label>
                                <input type="text" placeholder="Enter Discount Price " class="form-control" name="special_price" value="" id="special_price">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Summary:  :</label>
                                <textarea id="summernote" class="form-control summernote" placeholder="Write some text..." name="summary"></textarea>
                             </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Description:  :</label>
                                <textarea id="summernote" class="form-control summernote" placeholder="Write some text..." name="description"></textarea>
                             </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Features:  :</label>
                                <textarea id="summernote" class="form-control summernote" placeholder="Write some text..." name="product_Features"></textarea>
                             </div>
                             <div class="col-lg-4 col-md-12  mt-3">
                                <div class="form-group">
                                    <label for="">Is featured : </label>
                                    <input type="checkbox" name="is_featured" value="1" data-toggle="switchbutton" data-size="sm">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Thumbnail Image  * :</label>
                                <input name="image" class="form-control dropify" type="file" id="image">                                        </div>
                                <span class="error" id="image-error"></span>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Additional Images:<small style="font-size: 10px">[Recommend image size 288*345]</small></label>
                                <input type="file" name="multiple_product_images[]" id="multiple_product_images" multiple class="form-control">                                            <div class="mb-3" id="image_preview" style="width:100%;"> </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Status </label>
                                <select class="form-select" name="productstatus" id="remark">
                                    <option value="none">None</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                        </div>
                </div>
                </div>
                <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Save
                Product</button>
        </div>
        </form>
    </div>
            </div>
        </div>

    </div>
</div>
@endsection
