@extends('layout')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Canteens</a></li>
              <li class="breadcrumb-item active" aria-current="page">Menus</li>
            </ol>
          </nav>

          <form action="/search/f/{{ $user->id }}" class="mt-5">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search menu" name="search">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
          </form>
          <br>

        <a href="/cart/view/{{ $user->id }}" class="btn btn-success float-right">Cart <span class="badge badge-light">{{ Cart::getTotalQuantity() }}</span></a><br>

        <h3>Menus of {{ $user->canteen_name }}</h3>
        Phone : {{ $user->owner_phone }} <br>
        <div class="dropdown mt-5">

          <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort By
          </a>
        
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/search/f/{{ $user->id }}">Alphabet</a>
            <a class="dropdown-item" href="/search/f/{{ $user->id }}/price">Price</a>
            <a class="dropdown-item" href="/search/f/{{ $user->id }}/order_count">Most Ordered</a>
          </div>
        
        </div>

        <ul class="mt-5">

          @if (count($menus)>0)

            @foreach ($menus as $menu)

            <li>
              
              <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->image }}" width="120" height="80" class="float-right">

              <h3>{{ $menu->food_name }}</h3>

              <p>{{ $menu->price }}-ks<br>Optional taste : {{ $menu->optional_taste }}
              <br>Waiting time : {{ $menu->waiting_time }}<br>{{ $menu->delivery_fees }} delivery</p>
    
              <a href="/cart/{{ $menu->id }}">Add to Cart</a>

            </li>

            <hr>
                
            @endforeach
              
          @else

          <div class="alert alert-info">Ther is no menu yet</div>
              
          @endif

        </ul>

    </div>

  </div>

</div>

@endsection


