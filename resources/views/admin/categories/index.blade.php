@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">

     <h4>Category Page</h4>

    </div>

    <div class="card-body">
        <table class="table table-striped cate-tabel">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                       <img class="img-fluid image-style" src="public/category/{{$item->image}}" alt="Image here">
                    </td>
                    <td>
              
                        <a href="{{route('edit', $item->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{route('delete', $item->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection