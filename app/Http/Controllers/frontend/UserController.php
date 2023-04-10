<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    //

    public function my_orders()
    {
        $order = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.my_orders', compact('order'));
    }

    public function view_order($id)
    {
        // dd($id);
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view_order',compact('order'));
    }
}