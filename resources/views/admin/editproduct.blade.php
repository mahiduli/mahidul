@extends('admin.layouts.template')
@section('page_title')
    editproduct
@endsection
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        Edit Product
    </h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Product</h5>
                <small class="text-muted float-end">Input Information</small>

            </div>
            @if(session()->has('massage'))
                  <div class="alert alert-danger">
                    {{ session()->get('massage')}}
                 </div>
                @endif
            <div class="card-body">
                <form action="{{ route('updateproduct') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $productinfo->id }}" name="id">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{  $productinfo->product_name }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Price</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="price" name="price" value="{{  $productinfo->price }}">
                    </div>
                </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Quantity</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{  $productinfo->quantity }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="product_short_des" id="product_short_des" cols="20" rows="5">value="{{  $productinfo->product_short_des }}"</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Long Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="5">value="{{  $productinfo->product_long_des }}"</textarea>
            </div>
        </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Edit Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection