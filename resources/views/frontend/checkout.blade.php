@extends('layouts.front')

@section('title')

CheckOut

@endsection

@section('content')


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> 
        <a style="text-decoration:none; color:black;" href="{{route('welcome')}}"> Home </a> /
        <a style="text-decoration:none; color:black;" href="{{route('cart_show')}}">Cart </a>
    </h6>
    </div>
</div>

<div class="container">
  <form action="{{route('place_order')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control fname" placeholder="Enter Frist Name">
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control lname" placeholder="Enter Last Name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control email" placeholder="Enter Your Email">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" value="{{Auth::user()->phone}}" class="form-control phone" placeholder="Enter Phone Number">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" name="address1" value="{{Auth::user()->address1}}" class="form-control address1" placeholder="Enter Address 1">
                            <span id="address1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" name="address2" value="{{Auth::user()->address2}}" class="form-control address2" placeholder="Enter Address 2">
                            <span id="address2_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control city" placeholder="Enter City">
                            <span id="city_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" name="state" value="{{Auth::user()->state}}" class="form-control state" placeholder="Enter State">
                            <span id="state_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" name="country" value="{{Auth::user()->country}}" class="form-control country" placeholder="Enter Country">
                            <span id="country_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="number" name="pincode" value="{{Auth::user()->pincode}}" class="form-control pincode" placeholder="Enter Pin Code">
                            <span id="pincode_error" class="text-danger"></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-3">
            <div class="card">
                <div class="card-body">
                    <h6>Order Detail</h6>
                    <hr>
                    @if($cartitem->count() > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp
                            @foreach( $cartitem as $item )
                                <tr>
                                    @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->products->selling_price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h6 class="px-2">Grand Total <span class="float-end">Rs {{ $total }}</span></h6>
                    <hr>
                    <button class="btn btn-secondary w-100">Place Order | COD</button>
                    <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button>
                    @else
                    <h4 class="text-center">No Products in Carts</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
  </form>
</div>


<script>
    $(document).ready(function(){
        // alert();
        $('.razorpay_btn').click(function(e){
            e.preventDefault();
            // alert();
            var firstname = $('.fname').val();
            var lastname = $('.lname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country = $('.country').val();
            var pincode = $('.pincode').val();

            if (!firstname) {
                fname_error = "First Name is required";
                $('#fname_error').html('');
                $('#fname_error').html(fname_error);
            }else{
                fname_error = "";
                $('#fname_error').html('');

            }

            if (!lastname) {
                lname_error = "Last Name is required";
                $('#lname_error').html('');
                $('#lname_error').html(lname_error);
            }else{
                lname_error = "";
                $('#lname_error').html('');

            }

            if (!email) {
                email_error = "Email is required";
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }else{
                email_error = "";
                $('#email_error').html('');

            }

            if (!phone) {
                phone_error = "Phone Number is required";
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }else{
                phone_error = "";
                $('#phone_error').html('');
            }

            if (!address1) {
                address1_error = "Address 1 is required";
                $('#address1_error').html('');
                $('#address1_error').html(address1_error);
            }else{
                address1_error = "";
                $('#address1_error').html('');
            }

            if (!address2) {
                address2_error = "Address 2 is required";
                $('#address2_error').html('');
                $('#address2_error').html(address2_error);
            }else{
                address2_error = "";
                $('#address2_error').html('');
            }

            if (!city) {
                city_error = "City is required";
                $('#city_error').html('');
                $('#city_error').html(city_error);
            }else{
                city_error = "";
                $('#city_error').html('');
            }

            if (!state) {
                state_error = "State is required";
                $('#state_error').html('');
                $('#state_error').html(state_error);
            }else{
                state_error = "";
                $('#state_error').html('');
            }

            if (!country) {
                country_error = "Country is required";
                $('#country_error').html('');
                $('#country_error').html(country_error);
            }else{
                country_error = "";
                $('#country_error').html('');
            }

            if (!pincode) {
                pincode_error = "PinCode is required";
                $('#pincodey_error').html('');
                $('#pincode_error').html(pincode_error);
            }else{
                pincode_error = "";
                $('#pincode_error').html('');
            }

            if (fname_error != '' || lname_error != '' ||  email_error != '' || phone_error != '' || address1_error != '' || address2_error !='' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '') 
            {
                return false;
            }
            else
            {
                var data ={
                'firstname': firstname,
                 'lastname': lastname,
                 'email': email,    
                 'phone': phone,  
                 'address1': address1,  
                 'address2': address2,  
                 'city': city,  
                 'state': state,  
                 'country': country,  
                 'pincode':  pincode, 
                }
                // alert(data); 
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method : "post",
                    url: "{{route('proceed_pay')}}",
                    data : data,
                    dataType: "json",
                    success: function (response) {
                        alert(response.total_price); 
                    }
                })
            }
        });
    });
</script>

@endsection
 