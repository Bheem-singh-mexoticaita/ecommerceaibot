<title> Admin -Contact Messages </title>
<x-AdminApp-layout>
    <div class="main-panel">
    
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> All Conact Message
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conact Message</li>
                    </ol>
                </nav>
            </div>
           
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="datatable_list">
                            <thead>
                                <tr>
                                    <th>Sno </th>
                                    <th>FULL NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>MESSAGE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Contact as $key => $item)

<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $item->full_name }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ $item->yourQuery }}</td>
    <td>
      <!-- <a href="{{ route('admin.edit.product', $item->id) }}" class="btn btn-info text-white">Edit</a>
        <a href="{{ route('admin.delete.product', $item->id) }}" id="delete" class="btn btn-danger">Delete</a> -->
    </td>
</tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</x-AdminApp-layout>
