@extends('admin.layouts.template')
@section('page_title')
    allcategory
@endsection
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        All Category
    </h4>
    <div class="col-xxl">
        <div class="card">
                <h5 class="card-header">Available Category Information</h5>
                @if(session()->has('massage'))
                  <div class="alert alert-danger">
                    {{ session()->get('massage')}}
                 </div>
                @endif

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY NAME</th>
                                    <th>SUB CATEGORY</th>
                                    <th>SLUG</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->subcategory_count }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <a href="{{ route('editcategory',$item->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletecategory',$item->id) }}" class="btn btn-warning">Delete</a>
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
</div>


@endsection