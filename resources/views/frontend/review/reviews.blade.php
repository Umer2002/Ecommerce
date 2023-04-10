@extends('layouts.front')

@section('title')

Write a Riview

@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count() > 0)

                      <h5>You are writing Review for {{$product->name}}</h5>
                      <form action="{{route('review')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="user_review" rows="5" class="form-control mt-4" placeholder="Write a Review"></textarea>
                        <button class="btn btn-primary mt-3">Submit Review</button>
                      </form>
                    @else

                        <div class="alert alert-danger">
                            <h4>You are not eligilbe to Review this product</h4>
                            <p>
                                For the trustworthiness of the Review only customer who purchased the product can write the review about the product.
                            </p>
                            <a href="{{url('/')}}"><button class="btn btn-primary mt-3">Go to home page</button></a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection