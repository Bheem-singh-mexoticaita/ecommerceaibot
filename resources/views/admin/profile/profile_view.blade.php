<x-AdminApp-layout>

<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                Profile Details
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>About Me</h3>
                            </div>
                        </div>
                        <div class="single-info-details">
                            <div class="item-img text-center pb-5">
                                <img style="width:100px" src="https://ketramart.com/backend/assets/images/default-img.jpg" alt="Mr. Admin">
                            </div>
                            <div class="item-content mt-5">
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td class="font-medium text-dark-medium">{{ Auth::guard('admin')->user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td class="font-medium text-dark-medium">{{ Auth::guard('admin')->user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td class="font-medium text-dark-medium">
                                            <span class="material-symbols-outlined">
verified
</span> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


</x-AdminApp-layout>
