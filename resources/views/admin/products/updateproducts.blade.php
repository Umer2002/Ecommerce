@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">
    <h1>Add Products</h1>

    </div>
    <div class="container">
        <form action="route('edit_products/'. $product->id)" method="post"  enctype="multipart/form-data">
            @csrf
            @method('post')
                <div class="row">
                    <div class="col-md-12 mb-3">
                     <select class="form-select">
                       <option value="">{{$product->category->name}}</option>
                     </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control py-2" value="{{$product->name}}" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                    </div>
                    <div class="col-md-12 mt-5">
                        <label for="">Small Description</label>
                      <textarea name="small_description" rows="3" class="form-control">{{$product->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 mt-5">
                        <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Original Price</label>
                        <input type="number" value="{{$product->original_price}}" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Selling Price</label>
                        <input type="number" value="{{$product->selling_price}}" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Tax</label>
                        <input type="number" value="{{$product->tax}}" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$product->qty}}" class="form-control" name="quantity">
                    </div>

                    <!-- <div class="col-md-6 mb-3 mt-5">
                        <label for="">Status</label>
                        <input type="checkbox" name="popular" name="status">
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Trending</label>
                        <input type="checkbox" name="popular" name="tending">
                    </div> -->

                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" value="status" {{ $product->status=="1"? 'checked':'' }}>
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending"  value="trending" {{ $product->trending=="1"? 'checked':'' }}>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$product->meta_keywords}}</textarea>
                    </div>

                    @if($product->image)
                     <img class="img-fluid" src="{{asset('public/products/'.$product->image)}}" alt="Product Image">
                    @endif

                    <div class="col-md-12 mt-3">
                        <input type="file" name="image">
                    </div>

                    <div class="col-md-12 mt-3 btn-1 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection