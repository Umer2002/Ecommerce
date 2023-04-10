<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {   
        
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
                    
            if ($prod_check) {

                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {

                return response()->json([
                    'status'=> $prod_check->name.'Already Added to card']);
                    
                }
                else {
                    
                    $cartitem = new Cart();
                    $cartitem->prod_id = $product_id;
                    $cartitem->user_id = Auth::id();
                    $cartitem->prod_qty = $product_qty;
                    $cartitem->save();
                    return response()->json([
                        'status'=> $prod_check->name.' Added to card']);   
                }

            }
        }
        else {
            return response()->json([
                'status'=>'Login to Continue',
            ]);
        }
    }

    public function cart_show()
    {
        $cartitem = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitem'));   
    }

    public function delete_item(Request $request)
    {
        // dd('good');
        if(Auth::check()){
           
         $prod_id = $request->input('prod_id');

        if (Cart::where('id', $prod_id)->where('user_id', Auth::id())->exists()) {
            
            $cart_item = Cart::where('id', $prod_id)->where('user_id', Auth::id())->first();
            $cart_item->delete();
            
            return response()->json([
                'status'=>'Your Product has been Deleted',
            ]); 
         }

        }
        else {
            return response()->json([
                'status'=>'Login to Continue',
            ]);  
        }
    }

    public function update_cart(Request $request)
    {
        // dd('good');
       
        
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
        
            $product_qty = $request->input('prod_qty');
 
            if (Cart::where('id', $prod_id)->where('user_id', Auth::id())->exists())
             {  
                $cart = Cart::where('id', $prod_id)->where('user_id', Auth::id())->first();
                // dd($cart);
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json([
                    'status'=>'Quantity Updated',
                ]);   
            }
        }
    }

   
}
