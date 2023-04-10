<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function wish_list()
    {
        // dd('good');
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        // dd($wishlist);
        return view('frontend.wish_list', compact('wishlist'));
    }

    public function add_to_wishlist(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->input('product_id');
            if (Product::find($prod_id)) 
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json([
                    'status'=> 'Product Added to Wish List']);
            }else 
            {
                return response()->json([
                    'status'=> 'Product doesnot exists']);
            }
        }else
        {
            return response()->json([
                'status'=>'Login to Continue',
            ]);
        }
        
    }

    public function remove_cart_item(Request $request)
    {
        if(Auth::check()){
           
            $prod_id = $request->input('prod_id');
   
           if (Wishlist::where('id', $prod_id)->where('user_id', Auth::id())->exists()) {
               
               $Wish = Wishlist::where('id', $prod_id)->where('user_id', Auth::id())->first();
               $Wish->delete();
               
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
}
