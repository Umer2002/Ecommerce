@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">

     <h4>Redistered User</h4>

    </div>

    <div class="card-body">
        <table class="table table-striped cate-tabel">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name. '' . $product->lname}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->phone}}</td>
                    <td>
                    <a href="{{route('user_view', $product->id)}}"><button class="btn btn-primary">View</button></a>
                    </td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection