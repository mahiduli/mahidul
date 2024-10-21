@extends('admin.layouts.template')
@section('page_title')
    allproduct
@endsection
@section('content')
<div class="cotainer-xxl flex-grow-1 container-p-y">
    <div class="container">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">pages/</span>
        All Product
    </h4>

    @if(session()->has('massage'))
    <div class="alert alert-danger">
      {{ session()->get('massage')}}
   </div>
  @endif
    <div class="col-xxl">
        <div class="card">
                <h5 class="card-header">Available All Product</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>IMAGE</th>
                                    <th>PRICE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td><img src="{{asset($item->product_img)}}" alt="" style="width: 100px;" srcset=""></td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <a href="{{ route('editproduct',$item->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deleteproduct',$item->id) }}" class="btn btn-warning">Delete</a>
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