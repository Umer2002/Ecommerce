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
                      <h5>You are writing Review for {{$review->product->name}}</h5>
                      <form action="{{route('update_review')}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea name="user_review" rows="5" class="form-control mt-4">{{$review->user_review}}</textarea>
                        <button class="btn btn-primary mt-3">Update Review</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection