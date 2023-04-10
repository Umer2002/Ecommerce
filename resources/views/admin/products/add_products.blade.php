@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">
    <h3>Add Products</h3>

    </div>
    <div class="container">
        <form action="{{route('add_productsdata')}}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                     <select class="form-select" name="cate_id">
                       <option value="">Select a Category</option>
                       
                         @foreach($category as $item)
                         <option value="{{$item->id}}">{{$item->name}}</option>
                         @endforeach

                     </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control py-2" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control"  name="slug">
                    </div>
                    <div class="col-md-12 mt-5">
                        <label for="">Small Description</label>
                      <textarea name="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-5">
                        <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" name="status">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending" name="tending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image">
                    </div>
                    <div class="col-md-12 mt-3 btn-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection