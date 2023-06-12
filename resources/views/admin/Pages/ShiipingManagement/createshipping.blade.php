@extends('layouts.Admin.app')
@section('title', 'Add Shipping ')
@section('admincontent')
            <div class="page-header">
                <h3 class="page-title"> Update Shipping
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Shiiping </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
            <div class="card">
                        <div class="card-body p-4">
                            <div class="form-body mt-4">
                            <form  method="POST"  id="shipping_post_data" >
                            <div class="row">
                            <div class="row mb-4">
                                    <div class="row mb-4">
                                        <div class="col-4">
                                            <label class="form-label"> Country </label>
                                            <input type="hidden"   id="ajax_request_url" name="ajax_request_url" value="{{ route('fetch_state') }}">
                                            <select class="form-select" name="countries" id="country-dd">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                            <option value="{{$data->name}}"  country_id="{{$data->id}}" > {{$data->name}} </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">State :</label>
                                            <input type="hidden"   id="ajax_request_url2" name="ajax_request_url2" value="{{ route('fetch_cities') }}">
                                            <select id="state-dd"  name ="state" class="form-select"> </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">City:</label>
                                            <select id="city-dd" name="City" class="form-select">  </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label"> Delivery Time (approx)  *: </label>
                                            <input type="text"  class="form-control" placeholder="Deliver Time" name="delivery_time" value="">
                                        </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Delivery Charge * :</label>
                                            <input type="number"  step="any" class="form-control" placeholder="Deliver Charge" name="delivery_charge" value="">                                        </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Status * :</label>
                                            <select name="status" class="form-select" data-placeholder="Choose one">
                                                <option value="active" >Active</option>
                                                <option value="inactive" >Inactive</option>
                                            </select>                                        </div>
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
@endsection
