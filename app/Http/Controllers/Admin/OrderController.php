<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function orders()
    {
       $orders = Order::where('status', '0')->get();
       return view('admin.orders.orders', compact('orders'));
    }

    public function admin_view_order($id)
    {
    //   dd($id);
      $order = Order::where('id',$id)->first();
      return view('admin.orders.view',compact('order'));
    }

    public function update_order(Request $request, $id)
    {
        // dd($id);
        $orders = Order::find($id);

        $orders->status = $request->input('order_status');
        $orders->update();

        return redirect('orders')->with('status', 'Order Updated Successfully');
    }

    public function order_history()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
