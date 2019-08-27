<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Menu;
use App\Order;

class CartController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewIndex($id)
    {
        $canteenId = $id;
        // dd(Cart::get(1));
        $carts = Cart::getContent();

        return view('cart.index')->with('carts',$carts)->with('canteenId',$canteenId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = [];

        Cart::getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });

        foreach($items as $item)
        {
            $menu = Menu::where('id',$item->id)->increment('order_count');
        }

        

        // dd(1);    

        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->customer_phone = $request->input('customer_phone');
        $order->room_no = $request->input('room_no');
        $order->time = $request->input('time');
        $order->remark = $request->input('remark');
        $order->status = 'making';
        $order->user_id = $request->input('user_id');
        $order->order_data = json_encode($items);
        $order->order_count = 1;

        $order->save();

        $carts = Cart::getContent();

        $userId = $request->input('user_id');

        return view('order.success')->with([
            'carts'=>$carts,
            'userId'=>$userId
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);

        Cart::add([
            'id' => $menu->id,
            'name' => $menu->food_name,
            'price' => $menu->price,
            'quantity' => 1,
            'attributes' => array(
                'meal' => 'option',
              )
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return 'here';
        if($request->quantity){
            Cart::update($id,array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        }elseif ($request->meal) {
            Cart::update($id,array(
                'attributes' => array(
                    'meal' => $request->meal
                )
                ));
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCartItem($id)
    {
        Cart::remove($id);

        return back();
    }
}
