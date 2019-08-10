@extends('layouts.app')

@section('content')

<div class="dropdown">

  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort By
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('menu.index') }}">Alphabet</a>
    <a class="dropdown-item" href="{{ route('menu.index','orderBy=price') }}">Price</a>
    <a class="dropdown-item" href="{{ route('menu.index','orderBy=order_count') }}">Most Ordered</a>
  </div>

</div>
<div class="col-md-8">

  <a href="{{ route('menu.create') }}" class="btn btn-primary">Add Menu</a>

  <form action="menu">
    <input type="text" placeholder="food name" name="search"><input type="submit" class="btn btn-success btn-sm" value="Search">
  </form>

  @foreach ($menus as $menu)

    <p><a href="menu/{{ $menu->id }}">{{ $menu->food_name }}</a></p>

    {{ $menu->price }} <b><i>{{ $menu->category }}</i></b>

    <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->food_name }} image" width="100" height="70">
    <br>
    Order count : {{ $menu->order_count }}
    <hr>

  @endforeach

</div>

{{ $menus->links() }}

@endsection