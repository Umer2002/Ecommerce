@extends('layouts.front')

@section('title')

 My Order

@endsection

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
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
                            @foreach($order as $data)
                            <tr>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->tracking_no}}</td>
                                <td>{{$data->total_price}}</td>
                                <td>{{$data->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{url('view_order/'.$data->id)}}"><button class="btn btn-outline-dark">View</button></a>
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