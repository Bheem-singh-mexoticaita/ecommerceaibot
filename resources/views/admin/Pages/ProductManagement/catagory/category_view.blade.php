@extends('layouts.Admin.app')
@section('title', 'All Catagories')
@section('admincontent')
	    
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">All Catagories</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">						    
                            <a class="btn app-btn-secondary" href="#">
                                <i class="fa-solid fa-plus"></i>
                               Add Catagory 
                            </a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->   
        <div class="tab-content" id="orders-table-tab-content">
            <input type="hidden" naem ="ajaxurl" value="{{route('admin.category.getStudents')}}"class="hidden">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Sno </th>
                                <th> Catagory Name </th>
                                <th>Catagory Image</th>
                  
                                <th> Action </th>
                              </tr>
                            </thead>
                          
                          </table>
                    </div><!--//table-responsive-->
                   
                </div><!--//app-card-body-->		
            </div><!--//app-card-->
        </div><!--//tab-content-->
        
        
        
    </div><!--//container-fluid-->
</div><!--//app-content-->



@endsection
