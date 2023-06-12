@extends('layouts.Admin.app')
@section('title', 'Dashboard')
@section('admincontent')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="d-xl-flex justify-content-between align-items-start">
            <h2 class="text-dark font-weight-bold mb-2">Welcome, {{ Auth::guard('admin')->user()->name }}
            </h2>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-secondary img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">3</h2>
                            <p class="text-white mb-0">Total Categories </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <div class="card bg-success img-card box-success-shadow">
              <div class="card-body">
                  <div class="d-flex">
                      <div class="text-white">
                          <h2 class="mb-0 number-font">3</h2>
                          <p class="text-white mb-0">Total Sub Categories </p>
                      </div>
                  </div>
              </div>
          </div>
      </div> <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-danger img-card box-danger-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">3</h2>
                        <p class="text-white mb-0">Total Product </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>


@endsection
