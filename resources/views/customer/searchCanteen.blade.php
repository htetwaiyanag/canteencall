@extends('layout')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">

      <a href="/">back</a>

      @if (count($canteens)>0)
    
      @foreach ($canteens as $canteen)
          
        <p><a href="/search/f/{{ $canteen->id }}">{{ $canteen->canteen_name }}</a></p>
    
      @endforeach
    
    @else
    
      <p>Canteens are unavailable yet</p>
        
    @endif

    </div>

  </div>
</div>

@endsection


