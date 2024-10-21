@extends('admin.layouts.template')
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        Add Sub Category
    </h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Sub Category</h5>
                
                <small class="text-muted float-end">Input Information</small>
 
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card-body">
                <form action="{{ route('storesubcategory') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">SubCategory Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Electronics">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-lebel" for="basic-defalt-name">Select Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Add Sub Category</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection