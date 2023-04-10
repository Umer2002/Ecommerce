@extends('layouts.front')

@section('title')

Category

@endsection

@section('content')

@include('layouts.includes.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Categories</h2>
                @foreach($category_products as $category)
                <div class="item col-md-3 mt-3">
                    <a class="link-1" href="{{url('view_category/'.$category->id)}}">
                        <div class="item card">
                            <img src=" {{asset('public/category/'. $category->image)}}" class="img-fluid" alt="Category Image">
                            <div class="item card-body">
                                <h5 id="head-1">{{$category->name}}</h5>
                                <p class="para-1">{{$category->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach     
        </div>
    </div>
</div>


@endsection