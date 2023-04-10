@extends('layouts.front')

@section('title')

Welcome E-Shop

@endsection

@section('content')

@include('layouts.includes.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
                @foreach($featured_products as $product)
                <div class="item col-md-3 mt-3">
                    <div class="item card">
                    <img style="height:160px; object-fit:cover;" src=" {{asset('public/products/'. $product->image)}}" class="img-fluid" alt="Prodcut Image">
                    <div class="item card-body">
                        <h5>{{$product->name}}</h5>
                        <span class="float-start">
                        <h6 class="float-start para-1">Seliing Price</h6><br>{{$product->selling_price}}Rs</span>
                        <span class="float-end">
                        <h6 class="float-end para-1">Original Price</h6><br> <s>{{$product->original_price}}Rs</s><span>
                    </div>
                    </div>
                </div>
                @endforeach     
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
                @foreach($trending_category as $trending)
                <div class="item col-md-3 mt-3">
                    <a class="link-1" href="{{url('view_category/'.$trending->id)}}">
                        <div class="item card">
                            <img style="height:160px; object-fit:cover;" src=" {{asset('public/category/'. $trending->image)}}" class="img-fluid" alt="Category Image">
                            <div class="item card-body">
                                <h5 id="head-1">{{$trending->name}}</h5>
                                <p class="para-1"> {{$trending->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach     
        </div>
    </div>
</div>

@endsection