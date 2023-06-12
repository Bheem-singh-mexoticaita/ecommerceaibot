<title> Admin - Add Coupon</title>
<x-AdminApp-layout>
    <div class="main-panel">
    
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Add Coupon
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
                    </ol>
                </nav>
            </div>
           
            <div class="row">
            <div class="card">
                        <div class="card-body p-4">
                            <div class="form-body mt-4">
                            <form  method="POST" action ="{{ route('admin.coupon.store') }}">     @csrf

                                
                            <div class="row">
                            <div class="row mb-4">
                                    <div class="row mb-4">
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <x-input-label class="form-label" for="coupon_title" :value="__('Coupon Title *')" />
                                            <x-text-input id="coupon_title" class="form-control" type="text" name="email" :value="old('coupon_title')"  autofocus autocomplete="coupon_title" />
                                            <x-input-error :messages="$errors->get('coupon_title')" class="mt-2" />
                                        </div>                                          
                                        </div>
                                        <div class="col-10">
                                        <x-input-label class="form-label" for="coupon_code" :value="__('Coupon Code *')" />
                                        <x-text-input id="coupon_code" class="form-control" type="text" name="coupon_code" :value="old('coupon_code')"  autofocus autocomplete="coupon_title" />
                                        <x-input-error :messages="$errors->get('coupon_title')" class="mt-2" />

                                        </div>
                                        <div class="col-2">
                                        <a href= "javascript:void(0)"   id="genrate_coupan" class="btn btn-primary md-2 text-center genrate_button">Generate coupon code</a>
                                       </div>

                                        <div class="col-12">
                                        <x-input-label class="form-label" for="discouttype" :value="__('Discount Type *')" />
                                            <select name="discouttype" class="form-select" data-placeholder="Choose one">
                                                <option value="fixed" >Amount</option>
                                                <option value="percent" >Percent</option>
                                            </select>                                        
                                        </div>

                                        <div class="col-12">
                                        <x-input-label class="form-label" for="discout_value" :value="__('Discount Value *')" />
                                        <x-text-input id="discout_value" class="form-control" type="text" name="discout_value" :value="old('discout_value')"  autofocus autocomplete="coupon_title" />
                                        <x-input-error :messages="$errors->get('discout_value')" class="mt-2" />
                                        </div>
                                        <div class="col-12">
                                        <x-input-label class="form-label" for="discout_start_date" :value="__('Start Date ')" />
                                        <x-text-input id="discout_start_date" class="form-control" type="date" name="discout_start_date" :value="old('discout_start_date')"  autofocus autocomplete="coupon_title" />
                                        <x-input-error :messages="$errors->get('discout_value')" class="mt-2" />
                                        </div>
                                        <div class="col-12">
                                        <x-input-label class="form-label" for="discout_expire_date" :value="__('Expire Date:')" />
                                        <x-text-input id="discout_expire_date" class="form-control" type="date" name="discout_expire_date" :value="old('discout_expire_date')"  autofocus autocomplete="coupon_title" />
                                        <x-input-error :messages="$errors->get('discout_expire_date')" class="mt-2" />
                                        </div>
                                        <div class="col-12">
                                        <x-input-label class="form-label" for="discouttype" :value="__('Status*')" />
                                            <select name="status" class="form-select" data-placeholder="Choose one">
                                                <option value="active" >Active</option>
                                                <option value="inactive" >Inactive</option>
                                            </select>                                        
                                        </div>

                                    </div>
                            </div>
                            </div>
                            <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Save Coupan</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>

</x-AdminApp-layout>
</div>
