<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkout()
    {
        return view('checkout');
    }

    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $total_count=0;
        $grand_total=0;
         $cart = session()->get('cart');

        foreach($cart as $k=>$v)
        {
            $total_count+=$v['quantity'];
            $grand_total+=$v['price'];
        }
            # code...
            // dd($cart);


        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['grand_total'] = $grand_total;
        $input['item_count'] = $total_count;
        $order = Order::create($input);
        
        // $orders = Order::orderBy('id','desc')->paginate(1);
        $orders['or'] = Order::orderBy('id');
        // $order_id=$orders->id;
        $cart = session()->get('cart');
        foreach($cart as $k=>$v)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>1,
                'quantity'=>$v['quantity'],
                'price'=>$v['price'],
            ]);

        }

        return redirect('/')->with('status','Order placed Successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}