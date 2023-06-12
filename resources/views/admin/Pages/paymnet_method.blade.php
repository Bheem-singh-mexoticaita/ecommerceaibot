<title> Admin -Site Setting </title>
<x-AdminApp-layout>
    <div class="main-panel">
    
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Update Settings
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Payment Methods
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="card p-4">
                        <h4 class="pb-3">Paypal Payment Gateway</h4>

                        <form class="form-horizontal" action="{{route('admin.payment-method-update')}}" method="POST">    @csrf
                            <input type="hidden" name="payment_method" value="paypal">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label">Paypal Sandbox Mode</label>
                                </div>
                                <div class="col-md-12">
                                    <label class="switch">
                                        <input class="status" value="sandbox" name="paypal_sandbox" type="checkbox" value="{{env('PAYPAL_MODE', '')}}"  {{ env('PAYPAL_MODE', '') == 'sandbox' ? 'checked' : '' }} >
                                        <span class="slider round"></span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label">Paypal Client Id</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="PAYPAL_CLIENT_ID"  value="{{env('PAYPAL_CLIENT_ID', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label">Paypal Client Secret</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="PAYPAL_CLIENT_SECRET" value="{{env('PAYPAL_CLIENT_SECRET', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label">Defalt Currency</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="PAYPAL_CURRENCY" value="{{env('PAYPAL_CURRENCY', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label"> Paypal API Certificate </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="API_CERTIFICATE" value="{{env('PAYPAL_SANDBOX_API_CERTIFICATE', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label"> Paypal Username </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="PAYPAL_API_USERNAME" value="{{env('PAYPAL_API_USERNAME', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label"> Paypal Userpassword </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="PAYPAL__API_PASSWORD" value="{{env('PAYPAL__API_PASSWORD', '')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-from-label"> Paypal APP ID </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="PAYPAL_APP_ID" value="{{env('PAYPAL_APP_ID', '')}}">
                                </div>
                            </div>
                            <div class="col-12 form-group mg-t-8 mt-2">
                                <button type="submit" class="btn btn-primary"> Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card p-4">
                        <h4 class="pb-3">Stripe Payment Gateway</h4>
                        <form class="form-horizontal" action="https://ketramart.com/dashboard/payment-method-update" method="POST">
                            <input type="hidden" name="payment_method" value="stripe">
                            <input type="hidden" name="_token" value="VPzXFFIB0WVWfZR4Fceo2VfmKxTki3ee79vnu0S7">                                <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_PUBLISH">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-from-label">Stripe Sandbox Mode</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="switch">
                                            <input class="status" value="1" name="Stripe" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-from-label">Publish Key</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="STRIPE_PUBLISH" value="" placeholder="Strip publish key" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_SECRET">
                                <div class="col-md-4">
                                    <label class="col-from-label">Stripe Secret</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="STRIPE_SECRET" value="" placeholder="Stripe Secret Key" required="">
                                </div>
                            </div>
                     
                            <div class="col-12 form-group mg-t-8 mt-2">
                                <button type="submit" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>

</x-AdminApp-layout>
