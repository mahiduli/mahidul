@extends('admin.layouts.template')
@section('content')
    <h1>Pending Order</h1>
    <div class="container">
        <div class="card">
            <div class="card-title">pending order</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>
                            user id
                        </th>
                        <th>
                            shipping information
                        </th>
                        <th>
                            product id
                        </th>
                        <th>
                            price
                        </th>

                        <th>
                            quantity
                        </th>

                        <th>
                            action
                        </th>

                    </tr>
                    @foreach ($pending_order as $item)
                    <tr>
                        <td>{{ $item->user_id }}</td>

                        <td>
                            <ul>
                                <li>city: {{ $item->shipping_city }}</li>
                                <li>phone number: {{ $item->shipping_phonenumber}}</li>
                                <li>postal code: {{ $item->shipping_postal_code}}</li>
                            </ul>
                        </td>
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="" class="btn btn-success">Approve</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection