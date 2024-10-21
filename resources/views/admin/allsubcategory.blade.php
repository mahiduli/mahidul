@extends('admin.layouts.template')
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        All Sub Category
    </h4>
    @if(session()->has('massage'))
                  <div class="alert alert-danger">
                    {{ session()->get('massage')}}
                 </div>
                @endif
    <div class="col-xxl">
        <div class="card">
                <h5 class="card-header">Available Sub Category</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>SUBCATEGORY NAME</th>
                                    <th>CATEGORY</th>
                                    <th>PRODUCT</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allsubcategories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->subcategory_name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->product_count }}</td>
                                    <td>
                                        <a href="{{ route('editsubcat',$item->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletesubcat',$item->id) }}" class="btn btn-warning">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection