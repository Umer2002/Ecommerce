<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;

class ReviewController extends Controller
{
    
    public function add_review($product_id)
    {
        // dd($product_id);
        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if ($product) 
        {
            $review= Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review_check) 
            {
                return view('frontend.review.edit',compact('review'));
                
            }else 
            {
                $product_id = $product->id;
                $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'order_id', 'order_items.order_id')->where('order_items.prod_id', $product_id)->get();  

                return view('frontend.review.reviews', compact('product','verified_purchase'));   
            }
        }
        else 
        {
            return redirect()->back()->with('status', 'The Link was Broken');
        }
        
    }

    public function review(Request $request)
    {
        // dd('good');

        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if ($product) 
        {
            $user_review = $request->input('user_review');

            $new_review = Review::create([
                'user_id' =>Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review,
            ]);

            $category_id = $product->category->id;
            $product_id = $product->id;
            if ($user_review) 
            {
                return redirect('cate/'.$category_id.'/'.$product_id)->with('status', 'Thanku for your Review');              
            }
        }
        else 
        {
            return redirect()->back()->with('status', 'The Link was broken');
        }

    }

    public function edit_review($product_id)
    {
        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if($product)
        {
            $product_id = $product->id;
            $review= Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review)
            {
                return view('frontend.review.edit',compact('review'));
                
            }
            else 
            {

            return redirect()->back()->with('status', 'The Link was broken');
                
            }
        }
        else
        {
            return redirect()->back()->with('status', 'The Link was broken');
        }
    }

    public function update_review(Request $request)
    {
        $user_review = $request->input('user_review'); 
        if ($user_review != '') 
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id',$review_id)->where('user_id', Auth::id())->first();
            if ($review) 
            {   
                $review->update();
                return redirect('cate/'.$review->product->category->id.'/'.$review->product->id)->with('status', 'Review Updated Successfully');
           }
           else
           {
               return redirect()->back()->with('status', 'The Link was broken');
           }

        } 
        else
        {
            return redirect()->back()->with('status', 'You canot submit an empty review');
        }
       
    }

}
