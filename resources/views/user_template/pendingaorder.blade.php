
@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
    <h1>Pending Order</h1>
    @if (session()->has('massage'))
    <div class="alert alert-success">
        {{ session()->get('massage') }}
    </div>
        
    @endif
    <table class="table">
        <tr>
            <th>product id</th>
            <th>price</th>
        </tr>

        @foreach ($pending_order as $item)
        <tr>
            <td>{{ $item->product_id }}</td>
            <td>{{ $item->price }}</td>
        </tr>
        @endforeach

    </table>
@endsection