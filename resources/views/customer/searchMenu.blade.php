@extends('layout')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">
      
        <a href="/cart/view/{{ $user->id }}" class="btn btn-success">Cart<span class="badge badge-light">{{ Cart::getTotalQuantity() }}</span></a>

        <a href="{{ URL::previous() }}">Back</a>

        <h3>Menus of {{ $user->canteen_name }}</h3>
        Phone : {{ $user->owner_phone }}

        <ul>

          @if (count($menus)>0)

            @foreach ($menus as $menu)

            <li>

              <p>{{ $menu->food_name }}</p>

              <p>{{ $menu->price }}</p>
    
              <a href="/cart/{{ $menu->id }}">Add to Cart</a>

              <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->image }}" width="120" height="80" align="right">

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


