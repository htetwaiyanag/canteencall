@extends('layouts.app')

@section('content')

<section id="menu-show">

  <div class="row justify-content-center">

    <div class="col-md-8">
      
        @include('inc.messages')

        <a href="/menu">Back</a>

        <h3>{{ $menu->food_name }}</h3>
        <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->food_name }} image" width="120" height="100"><br>
        <b>Detail</b><hr>
        
        <p>Price-{{ $menu->price }}KS</p>
        <p><span class="main-color">Category</span> - {{ $menu->category }}</p>
        <p><span class="main-color">Optional Taste</span> - {{ $menu->optional_taste }}</p>
        <p><span class="main-color">Waiting Time</span> - {{ $menu->waiting_time }}</p>
        <p><span class="main-color">Delivery Fees</span> - {{ $menu->delivery_fees }}</p>
        <p><span class="main-color">Order Count</span> - {{ $menu->order_count }}</p>

        <a href="/menu/{{ $menu->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
        <form action="/menu/{{ $menu->id }}" method="POST" style="display:inline-block">
          @csrf
          @method('DELETE')
          <input type="submit" value="Delte" class="btn btn-sm btn-danger">
        </form>
    </div>

  </div>

</section>


@endsection