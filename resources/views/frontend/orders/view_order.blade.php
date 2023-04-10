@extends('layouts.front')

@section('title')

 My Order

@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h4 class="text-white">Order View</h4>
                    <a href="{{route('my_orders')}}"><button class="btn btn-warning">Back</button></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border p-2">{{$order->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{$order->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$order->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border p-2">{{$order->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$order->address1}},<br>
                                {{$order->address2}},<br>
                                {{$order->city}},<br>
                                {{$order->state}},
                                {{$order->country}},
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$order->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderitems as $data)
                                    <tr>
                                        <td>{{$data->products->name}}</td>
                                        <td>{{$data->products->qty}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>
                                            <img src="{{asset('public/products/'.$data->products->image)}}" width="60px" alt="Product Image">   
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total : <span class="float-end">{{$order->total_price}} Rs</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection