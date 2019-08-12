<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Order;
use App\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $user = User::findOrFail($id);

        return view('order.index')->with('orders',$user->orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $menu = Menu::findOrFail($id);
        return view('order/create')->with('menu',$menu);
    }

    public function addCart($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'customer_name' => 'required',
        //     'customer_phone' => 'required',
        //     'room_no' => 'required',
        //     'quantity' => 'required',
        //     'remark' => 'required',
        // ]);

        dd($request->all());

        // $order = new Order;
        // $order->customer_name = $request->input('customer_name');
        // $order->customer_phone = $request->input('customer_phone');
        // $order->room_no = $request->input('room_no');
        // $order->quantity = $request->input('quantity');
        // $order->time = $request->input('time');
        // $order->remark = $request->input('remark');
        // $order->menu_id = $request->input('menu_id');

        // $order->save();

        // $menuId = $request->input('menu_id');
        // $quantity = $request->input('quantity');

        // $menu = Menu::findOrFail($menuId);

        // $totalPrice = $menu->price * $quantity;

        // return view('order/success')->with('menu',$menu)->with('totalPrice',$totalPrice)->with('quantity',$quantity);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
