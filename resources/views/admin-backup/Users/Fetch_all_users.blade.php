<title> User List  </title>
<x-AdminApp-layout>
    
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> All Customers

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Customers</li>
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
                                    <th>FULL NAME</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $users)

<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $users->name }}</td>
    <td>{{ $users->email }}</td>
    <td><div class="mt-sm-1 d-block">
        @if($users->status =='1' ||$users->status ==1  )
        <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Active</span>
        @else
        <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">Inactive</span>
        @endif
   </div></td>

</tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</x-AdminApp-layout>
