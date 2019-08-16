@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-12">

          <a href="{{ route('menu.create') }}" class="btn btn-custom float-right">Add Menu</a>

          <form action="menu" class="mt-5">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search menu" name="search">
                  <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
            </form>

          <div class="dropdown mt-5">

            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort By
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('menu.index') }}">Alphabet</a>
              <a class="dropdown-item" href="{{ route('menu.index','orderBy=price') }}">Price</a>
              <a class="dropdown-item" href="{{ route('menu.index','orderBy=order_count') }}">Most Ordered</a>
            </div>
          
          </div>
          @foreach ($menus as $menu)
            <hr>

            <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->food_name }} image" width="120" height="80" class="float-right">
            <h2><a href="menu/{{ $menu->id }}">{{ $menu->food_name }}</a></h2>

            <p>{{ $menu->price }}-ks<br>Optional taste : {{ $menu->optional_taste }}
              <br>Waiting time : {{ $menu->waiting_time }}<br>{{ $menu->delivery_fees }} delivery<br>Order count : {{ $menu->order_count }}</p>
            
            <hr>

          @endforeach

        {{ $menus->links() }}

    </div>

  </div>

</div>

@endsection