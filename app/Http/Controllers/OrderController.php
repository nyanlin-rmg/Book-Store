<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin/orders.index', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $books = $order->book()->get();
        return view('admin/orders.show', ['order' => $order, 'books' => $books]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function markDelivered($id)
    {
        $order = Order::find($id);
        if($order->status == 0) {
            $order->update([
                'status' => 1
            ]);
        } else {
            $order->update([
                'status' => 0
            ]);
        }
        $order->save();
        return redirect()->back();
    }
}
