@extends('layouts.front')

@section('title')

{{$category->name}}

@endsection

@section('content')

@include('layouts.includes.slider')


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> Collection / {{$category->name}}</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
                @foreach($products as $product)
                <div class="item col-md-3 mb-3">
                    <a class="link-1" href="{{url('cate/'. $category->id. '/'. $product->id)}}">
                        <div class="item card">
                            <img style="height:200px; object-fit:cover;" src=" {{asset('public/products/'. $product->image)}}" class="img-fluid" alt="Prodcut Image">
                            <div class="item card-body">
                                <h5 id="head-1">{{$product->name}}</h5>
                                <span class="float-start para-1">
                                <h6 class="float-start para-1">Seliing Price</h6><br>
                                {{$product->selling_price}}Rs</span>
                                <h6 class="float-end para-1">Original Price</h6><br>
                                <span class="float-end para-1">
                                <s>{{$product->original_price}}Rs</s><span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach     
        </div>
    </div>
</div>


@endsection