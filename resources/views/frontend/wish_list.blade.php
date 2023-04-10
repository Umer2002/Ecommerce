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

<div class="container py-5">
    <div class="card shadow">
      <div class="card-body">
        @if($wishlist->count() > 0)
            @foreach($wishlist as $show)
            <div class="row products_data mt-2">
                <div class="col-md-2">
                 <img src="{{asset('public/products/'. $show->products->image)}}" class="w-100" alt="Cart Image">
                </div>
                <div class="col-md-2 mt-4">
                    <h6>{{$show->products->name}}</h5>
                </div>
                <div class="col-md-2 mt-4 my-auto">
                    <h6>Rs {{$show->products->selling_price}}</h6>
                </div>
                        <div class="col-md-2">
                            <input type="hidden" value="{{$show->id}}" class="prod_id">

                            @if( $show->products->qty >= $show->prod_qty)
                            <h6 class="mt-4">In Stock</h6>
                            @else
                                <h6 class="mt-4">Out of Stock</h6>  
                            @endif

                        </div> 
                        <div class="col-md-2 mt-4">
                               <button type="button" class="addToCart btn btn-primary me-3 float-start" id="addToCart">Add to Card <i class="fa fa-shopping-cart"></i></button>
                        </div>  
                        <div class="col-md-2 mt-4">
                               <button data-id="{{$show->id}}" class="btn btn-danger deleteprod prod_id removecartitem"><i class="fa fa-trash"></i> Remove</button>
                        </div> 
                    </div>    
            @endforeach
        @else
            <div class="text-center">
                <h4>There is no products in your Wishlist</h4>
            </div>
        @endif
      </div>

    </div>
</div>


<script>
    $(document).ready( function(){

        $('#addToCart').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.products_data').find('.prod_id').val();
            // alert(product_id);
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
            })
        });

    });

    $(document).ready( function(){
    // alert();

    $('.removecartitem').click(function(e){
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
            url:"{{route('remove_cart_item')}}",
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

});

</script>
@endsection
