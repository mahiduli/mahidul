@extends('admin.layouts.template')
@section('page_title')
    addproduct
@endsection
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        Add Product
    </h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Product</h5>
                <small class="text-muted float-end">Input Information</small>

            </div>
            @if(session()->has('massage'))
                  <div class="alert alert-danger">
                    {{ session()->get('massage')}}
                 </div>
                @endif
            <div class="card-body">
                <form action="{{ route('storeproduct') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Electronics">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Price</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="price" name="price" placeholder="price">
                    </div>
                </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Quantity</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="product_short_des" id="product_short_des" cols="20" rows="5"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Product Long Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Select Category</label>
            <div class="col-sm-9">
                <select name="product_category_id" id="product_category_id" class="form-control">
                    <option value="0">Please select</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Select Sub Category</label>
            <div class="col-sm-9">
                <select name="product_subcategory_id" id="product_subcategory_id" class="form-control">
                    <option value="0">Please select</option>
                    @foreach ($subcategories as $item)
                    <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Upload Product Image</label>
            <div class="col-sm-9">
                <input type="file" id="product_img" name="product_img" class="form-control-file">
            </div>
    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection