<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use Session;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = auth()->user()->id;

        $date = Carbon::today()->subDays(7);

        $sales = Order::where('user_id',$id)->where('status','delivered')->where('created_at', '>=', $date)->paginate(10);

        // dd($sales);
        if(count($sales)>0)
        {
            foreach($sales as $sale){

                $saleData[] = json_decode($sale->order_data);

            }

            foreach($saleData as $data)
            {
                foreach($data as $price)
                {
                    $saleTotal[] = $price->price;
                }
            }

            $total = array_sum($saleTotal);

            return view('sale.index')->with('sales',$sales)->with('saleData',$saleData)->with('total',$total);

        }else{

            Session::flash('message', 'This is no sale yet!'); 

            return view('sale.index');
        }
    }
}
