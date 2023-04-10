@extends('layouts.front')

@section('title')

 My Cart

@endsection

@section('content')



<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> 
        <a style="text-decoration:none; color:black;" href="{{route('welcome')}}"> Home </a> /
        <a style="text-decoration:none; color:black;" href="{{route('cart_show')}}">Cart </a>
    </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        @if($cartitem->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitem as $show)
            <div class="row  products_data mt-2">
                <div class="col-md-2">
                <img src="{{asset('public/products/'. $show->products->image)}}" class="w-100" alt="Cart Image">
                </div>
                <div class="col-md-3 mt-4">
                    <h6>{{$show->products->name}}</h5>
                </div>
                <div class="col-md-2 mt-4 my-auto">
                    <h6>Rs {{$show->products->selling_price}}</h6>
                </div>
                        <div class="col-md-3">
                            <input type="hidden" value="" class="prod_id">

                            @if( $show->products->qty >= $show->prod_qty)

                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:70%;">
                                    <span class="input-group-text incre decrement-button changeqty">-</span>
                                    <input style="width:100px; border:1px solid black;" type="text" name="quantity" value="{{$show->prod_qty}}" class="from-control quantity-input text-center">
                                    <span class="input-group-text incre increment-button changeqty">+</span>
                                </div>

                                @php $total += $show->products->selling_price *  $show->prod_qty; @endphp
                                
                                @else
                                 <h6 class="mt-4">Out of Stock</h6>

                            @endif

                        </div>  
                        <div class="col-md-2 mt-4">
                            
                               <button data-id="{{$show->id}}" class="btn btn-danger deleteprod prod_id"><i class="fa fa-trash"></i></button>
                           
                        </div> 
                    </div>    
            @endforeach
          </div>
          <div class="card-footer">
            <h6>Total Price : {{$total}}  Rs</h6>
            <a href="{{route('checkout')}}"><button class="btn btn-outline-success float-end">Proceed to Checkout</button></a>  
          </div>
          @else 
           <div class="card-body text-center">
                <h3>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h3>
                <a href="{{route('category_products')}}"><button class="btn btn-outline-primary float-end">Continue Shopping</button></a>
           </div>
           @endif
        </div>
    </div>
</div>

<script>

 $(document).ready( function(){
    // alert();

    $('.deleteprod').click(function(e){
        e.preventDefault();
        var prod_id = $(this).attr('data-id');
        // alert(prod_id);
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            method:"post",
            url:"{{route('delete_item')}}",
            data :{
                'prod_id':prod_id,
            }, 
            dataType: "json",
            success: function(response){
                // alert(prod_id);   
                // swal(response.status);
                
                swal({
                    title: "Successfully!",
                    text: response.status,
                    type: "success"
                }).then(function() {
                    location.reload();
                });
            }
        }); 
    });


    $('.changeqty').click(function(e){
            
            e.preventDefault();
            var product_id = $(this).closest('.products_data').find('.prod_id').val();
            var product_qty = $(this).closest('.products_data').find('.quantity-input').val();
            // alert(product_qty);
            data = {
                'prod_id' :product_id,
                'prod_qty' : product_qty
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method : "post",
                url : "{{route('update_cart')}}",
                data : data,
               dataType: "json",
               success :function(response){
                // alert(response);
                window.location.reload();
               }
            })
        })

  
});

</script>

@endsection
