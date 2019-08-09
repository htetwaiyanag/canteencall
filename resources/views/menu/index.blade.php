@extends('layouts.app')

@section('content')

<div class="col-md-8">
  <a href="{{ route('menu.create') }}" class="btn btn-primary">Add Menu</a>
  @foreach ($menus as $menu)
    <p>{{ $menu->food_name }}</p>
    {{ $menu->price }}

  @endforeach
</div>

@endsection