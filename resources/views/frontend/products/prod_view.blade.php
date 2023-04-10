@extends('layouts.front')

@section('title')

{{$products->name}}

@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('add_rating')}}" method="post">
        @csrf
        <input type="hidden" value="{{$products->id}}" name="product_id">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rate {{$products->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                 @if($user_rating)

                    @for($i = 1; $i<= $user_rating->star_rated; $i++)
                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                        <label for="rating1{{$i}}" class="fa fa-star"></label>
                    @endfor
                    @for($j = $user_rating->star_rated+1; $j <= 5; $j++) 
                    <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                        <label for="rating1{{$j}}" class="fa fa-star"></label>
                    @endfor
                    
                 @else
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> Collection / {{$products->category->name}} /{{$products->name}}</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('public/products/'. $products->image)}}" class="w-100 img-fluid" alt="">
                </div>
                <div class="col-md-8">
                    <h3 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1'? 'Trending':'')
                        <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h3>
                    <hr>
                    <label class="me-3">Selling Price : Rs{{$products->selling_price}}</label>
                    <label class="me-3">Original Price : <s>Rs {{$products->original_price}}</s></label>

                    @php $rate_num = number_format($rating_value) @endphp

                    <div class="rating mt-3">
                        @for($i = 1; $i<= $rate_num; $i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j = $rate_num+1; $j <= 5; $j++)
                            <i class="fa fa-star"></i>
                        @endfor
                    </div>
                    <p class="mt-3">
                        {{$products->small_description}}
                    </p>
                    <hr>
                    @if($products->qty > 0)
                    <label class="badge bg-success">In Stock</label>
                    @else
                    <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <span class="input-group-text incre decrement-btn">-</span>
                                <input style="width:70px; border:1px solid black;" type="text" name="quantity" value="1" class="from-control qty-input text-center" id="">
                                <span class="input-group-text incre increment-btn">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>

                            @if($products->qty > 0)
                            <button type="button" class="addToCart btn btn-primary me-3 float-start" id="addToCart">Add to Card <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 float-start" id="addToWishlist">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this Product
                    </button>
                    <a href="{{url('add_review/'. $products->id.'/userreview')}}" class="btn btn-link">Write a Review</a>
                </div>
                <div class="col-md-8">
                    @foreach($review as $item)
                     <div class="user-review">
                        <label for="">{{$item->user->name.''. $item->user->lname}}</label>
                        @if($item->user_id == Auth::id())
                        <a href="{{url('edit_review/'.$products->id).'/userreview'}}">Edit</a>
                        @endif
                        <br>
                        <div class="mt-2">
                           @if($item->rating)

                             @php $user_rated = $item->rating->stars_rated @endphp

                                @for($i = 1; $i<= $rate_num; $i++)

                                  <i class="fa fa-star checked"></i>

                                @endfor

                                @for($j = $rate_num+1; $j <= 5; $j++)

                                    <i class="fa fa-star"></i>

                                @endfor
                            @endif
                            <small>Reviewed {{$item->created_at->format('d M Y')}}</small>
                            <p>
                                {{$item->user_review}}
                            </p>
                         </div>
                     </div>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready( function(){
       
        $('#addToCart').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            // alert(product_id);
            // alert(product_qty);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"post",
                url: "{{route('add_to_cart')}}",
                data:{
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                dataType: "json",
                success:function(response){
                    swal(response.status);
                }
            })
        });

        $('.increment-btn').click(function(e){
            e.preventDefault();
            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $('.qty-input').val(value);
            }
        });

    });

    $(document).ready( function(){

        $('.decrement-btn').click(function(e){
            e.preventDefault();
            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $('.qty-input').val(value);
            }
        });

    });

    $(document).ready( function(){

        $('#addToWishlist').click(function (e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
             method:"post",
            url: "{{route('add_to_wishlist')}}",
            data:{
                'product_id': product_id,
            },
            dataType: "json",
            success:function(response){
                swal(response.status);
            }
        });
        
        });

    });
</script>
@endsection