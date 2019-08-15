@extends('layout')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-12">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Canteens</li>
          </ol>
        </nav>

      @if (count($canteens)>0)
    
      @foreach ($canteens as $canteen)

      <div class="card border-warning" style="width: 18rem;display:inline-block">
          <div class="card-body">
            <h4 class="card-title"><a href="/search/f/{{ $canteen->id }}">{{ $canteen->canteen_name }}</a></h4>
            <p class="card-text"><span class="gold-text">Ph {{ $canteen->owner_phone }}</span></p>
            <a href="/search/f/{{ $canteen->id }}" class="card-link"><i class="far fa-eye gold-text"></i></a>
          </div>
        </div>
          
        
        
    
      @endforeach
    
    @else
    
      <p>Canteens are unavailable yet</p>
        
    @endif

    </div>

  </div>
</div>

@endsection


