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

    public function searchMenu($id)
    {
        $user = User::findOrFail($id);

        // dd($user);

        // foreach($user->menus as $menu)
        // {
        //     $meal = $menu->optional_taste;

        //     $mealArr[] = explode(',',$meal);
        // }


        // dd($tasteAndMealArr);

        return view('customer/searchMenu')->with('menus',$user->menus)->with('user',$user);
    }
}
