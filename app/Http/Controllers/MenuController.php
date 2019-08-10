<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){

            $search = $request->search;

            $menus = Menu::where('food_name','LIKE',"%{$search}%")->paginate(10);
            return view('menu/index')->with('menus',$menus);
        }
        if($request->orderBy){

            $orderBy = $request->orderBy;

            if($orderBy==='order_count'){

                $orderType = 'desc';
            }
            else{

                $orderType = 'asc';
            }
        }
        else{
            $orderBy = 'food_name';
            $orderType = 'asc';
        }
        $menus = Menu::orderBy($orderBy,$orderType)->paginate(10);
        return view('menu/index')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuCount = Menu::all();
        return view('menu/create')->with('menuCount',$menuCount);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'food_name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'optional_taste' => 'required',
            'waiting_time' => 'required',
            'delivery_fees' => 'required',
        ]);

        $menu = new Menu;
        $menu->food_name = $request->input('food_name');
        $menu->price = $request->input('price');
        $menu->category = $request->input('category');
        $menu->optional_taste = $request->input('optional_taste');
        $menu->waiting_time = $request->input('waiting_time');
        $menu->delivery_fees = $request->input('delivery_fees');

        if($request->hasfile('image')){

            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $file->move('uploads/menu/',$filename);

            $menu->image = $filename;

        }else{

            $menu->image = '';
        }

        $menu->save();

        return redirect()->back()->with('success','New menu is added');
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

        return view('menu/show')->with('menu',$menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('menu/edit')->with('menu',$menu);
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
        $this->validate($request,[
            'food_name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'optional_taste' => 'required',
            'waiting_time' => 'required',
            'delivery_fees' => 'required',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->food_name = $request->input('food_name');
        $menu->price = $request->input('price');
        $menu->category = $request->input('category');
        $menu->optional_taste = $request->input('optional_taste');
        $menu->waiting_time = $request->input('waiting_time');
        $menu->delivery_fees = $request->input('delivery_fees');

        if($request->hasfile('image')){

            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $file->move('uploads/menu/',$filename);

            $menu->image = $filename;

        }else{

            $menu->image = '';
        }

        $menu->save();

        return view('menu/show')->with('success','Menu is updated')->with('menu',$menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->action('MenuController@index');
    }
}
