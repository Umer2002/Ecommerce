<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitem;

class RatingController extends Controller
{
    public function add_rating( Request $request)
    {
        // dd($request->all());
        // dd('good');
       $star_rated = $request->input('product_rating');
    //    dd($star_rated);
       $prod_id = $request->product_id;
    //    dd($prod_id);

       $product_check = Product::where('id', $prod_id)->where('status', '0')->first();

        if ($product_check) 
        {
           $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'order_id', 'order_items.order_id')->where('order_items.prod_id', $prod_id)->get();  
           
           if ($verified_purchase->count() > 0) 
           {

            $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();

            if ($existing_rating) 
            {
                $existing_rating->$star_rated = $star_rated;
                $existing_rating->update();
            }
            else 
            {
                Rating::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $prod_id,
                    'star_rated' => $star_rated,
                ]);
            }
             return redirect()->back()->with('status', 'Thanku For Rating this Product');
           }
           else 
           {
            return redirect()->back()->with('status', 'You Canot Rate this Product');
           }
        }
        else 
        {
            return redirect()->back()->with('status', "The Link you followed was Broken");
        }
       
    }
}
