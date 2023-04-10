@extends('layouts.admin')

@section('title')

Orders

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h4 class="text-white">New Orders</h4>
                      <a href="{{route('order_history')}}"><button class="btn btn-warning btn-sm">Order History</button></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking No.</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $data)
                            <tr>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->tracking_no}}</td>
                                <td>{{$data->total_price}}</td>
                                <td>{{$data->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{url('admin_view_order/'.$data->id)}}"><button class="btn btn-dark">View</button></a>
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

@endsection