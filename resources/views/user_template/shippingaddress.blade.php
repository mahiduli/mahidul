
@extends('user_template.layouts.template')
@section('main-content')
<h1>Provite Your Shipping Information</h1>
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <form action="{{ route('addshippingaddress') }}" method="post">
                @csrf   
                <div class="form-group">
                    <label for="phone_number">phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Your Phone Number">
                </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter Your City"> </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Enter Your Postal Code">
                    </div>

                    <input type="submit" value="Next" class="btn btn-primary">
                
            </form>
        </div>
    </div>
</div>
@endsection