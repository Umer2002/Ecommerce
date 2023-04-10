<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\User;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $old_cartitem = Cart::where('user_id', Auth::id())->get();
        foreach( $old_cartitem as $item)
        {
            if (!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty)->exists()) 
            {
                $removeitem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitem = Cart::where('user_id', Auth::id())->get();
       return view('frontend.checkout', compact('cartitem'));
    }

    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id(); 
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $total = 0;
        $cartitem_total = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitem_total as $prod)
        {
            $total += $prod->products->selling_price;
        }

        $order->total_price = $total;

        $order->tracking_no = 'umer'.rand(1111,9999);
        $order->save();


        $order->id;
        
        $cartitem = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitem as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id'=> $item->prod_id,
                'qty'=> $item->prod_qty,
                'price'=> $item->products->selling_price,
            ]); 

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;

            $prod->update();
        }

        if (Auth::user()->address1 == NULL) {

            $user = User::where('id', Auth::id())->first();

            $order->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country  = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitem);

        return redirect('checkout')->with('status', 'Your Order has been Placed Successfully');
    }

    public function proceed_pay(Request $request)
    {
        // dd('good');
        $cartitem = Cart::where('user_id', Auth::id())->get();
        // dd($cartitem);
        $total_price = 0;

        foreach ($cartitem as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

         $firstname = $request->input('firstname');
         $lastname = $request->input('lastname');
         $email = $request->input('email');    
         $phone = $request->input('phone');  
         $address1 = $request->input('address1');  
         $address2 = $request->input('address2');  
         $city = $request->input('city');  
         $state = $request->input('state');  
         $country = $request->input('country');  
         $pincode = $request->input('pincode');
         
         return response()->json([
            'firstname'=> $firstname,
            'lastname'=> $lastname,
            'email'=> $email,    
            'phone'=> $phone,  
            'address1'=> $address1,  
            'address2'=> $address2,  
            'city'=> $city,  
            'state'=> $state,  
            'country'=> $country,  
            'pincode'=> $pincode, 
            'total_price' => $total_price,
        ]);
    }
}
