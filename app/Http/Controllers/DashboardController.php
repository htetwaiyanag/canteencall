<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Menu;
use Carbon\Carbon;
use App\Sale;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboardIndex(){

        $id = auth()->user()->id;

        // Order collection
        $totalOrders = Order::where('user_id',$id)->get();

        $makingOrders = Order::where('user_id',$id)->where('status','making')->get();

        $deliveredOrders = Order::where('user_id',$id)->where('status','delivered')->get();

        //Menu collection

        $totalMenus = Menu::where('user_id',$id)->get();

        // Sale collection

        $date = Carbon::today()->subDays(7);

        $sales = Order::where('user_id',$id)->where('status','delivered')->where('created_at', '>=', $date)->get();

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

        }else{

            $total = 0;

        }

        return view('dashboard/index')->with([
            'totalOrders' => $totalOrders,
            'makingOrders' => $makingOrders,
            'deliveredOrders' => $deliveredOrders,
            'totalMenus' => $totalMenus,
            'total' => $total
        ]);
    }
}
