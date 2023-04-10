@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">

     <h4>Products Page</h4>

    </div>

    <div class="card-body">
        <table class="table table-striped cate-tabel">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>
                       <img style="width: 148px;height: 101px; object-fit: cover;" class="img-fluid image-style" src="public/products/{{$product->image}}" alt="Image here">
                    </td>
                    <td>
              
                    <a href="{{route('update_products', $product->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{route('deleteproduct', $product->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection