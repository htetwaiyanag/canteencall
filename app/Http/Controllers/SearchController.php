<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use Session;

class SearchController extends Controller
{
    public function searchCanteen(Request $request)
    {
        $uni = $request->input('university');
        $canteens = User::where('university','=',$uni)->get();

        return view('customer/searchCanteen')->with('canteens',$canteens);
    }

    public function searchMenu($id,$orderBy='food_name',Request $request)
    {
        
        $user = User::findOrFail($id);

        if($request->search){

            $search = $request->search;

            $menus = Menu::where('food_name','LIKE',"%{$search}%")->get();
            return view('customer/searchMenu')->with([
                'menus'=>$menus,
                'user' => $user
                ]);
        }

        if($orderBy==='order_count'){
            $orderType = 'desc';
            $menus = Menu::where('user_id','=',$id)->orderBy($orderBy,$orderType)->paginate(10);
            return view('customer/searchMenu')->with([
                'menus'=>$menus,
                'user' => $user
                ]);
        }
        else{
            $orderType ='asc';
            $menus = Menu::where('user_id','=',$id)->orderBy($orderBy,$orderType)->paginate(10);
            return view('customer/searchMenu')->with([
                'menus'=>$menus,
                'user' => $user
                ]);
        }
        

        return view('customer/searchMenu')->with('menus',$user->menus)->with('user',$user);
        

        
    }
}
