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

        $last7Day = Carbon::today()->subDays(7);

        $today = Carbon::today();

        $sales = Order::where('user_id',$id)->where('status','delivered')->where('created_at', '>=', $last7Day)->get();

        $todaySales = Order::where('user_id',$id)->where('status','delivered')->whereDate('created_at',Carbon::today())->get();

        $customers = Order::groupBy('customer_name')->groupBy('customer_phone')->selectRaw('sum(order_count) as sum,customer_name,customer_phone')->pluck('sum','customer_name','customer_phone');

        // dd($customers);

        if(count($todaySales)>0)
        {
            foreach($todaySales as $todaySale){

                $todaySaleData[] = json_decode($todaySale->order_data);

            }

            foreach($todaySaleData as $data)
            {
                foreach($data as $price)
                {
                    $todaySaleTotal[] = $price->price;
                }
            }

            $todayTotal = array_sum($todaySaleTotal);

        }
        else{

            Session::flash('message', 'This is no sale yet!'); 

        }

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


            return view('sale.index')->with([
                'sales' => $sales,
                'saleData' => $saleData,
                'total' => $total,
                'todaySales' => $todaySales,
                'todaySaleData' => $todaySaleData,
                'todayTotal' => $todayTotal,
                'customers' => $customers

            ]);

        }else{

            Session::flash('message', 'This is no sale yet!'); 

            return view('sale.index');
        }
    }
}
