@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-4">
      <h2>Total Orders</h2>
      <b>{{ count($totalOrders)>0? count($totalOrders):0 }} orders</b>
      <hr>
      <h2>Making Orders</h2>
      <b>{{ count($makingOrders)>0? count($makingOrders):0 }} orders</b>
      <hr>
      <h2>Delivered Orders</h2>
      <b>{{ count($deliveredOrders)>0? count($deliveredOrders):0 }} orders</b>
    </div>

    <div class="col-md-4">
      <h2>Total Menus</h2>
      <b>{{ count($totalMenus)>0? count($totalMenus):0 }} menus</b>
      <br><br><a href="{{ route('menu.create') }}" class="btn btn-primary">+</a>
    </div>

    <div class="col-md-4">
      <h2>Total Sale</h2><i>Last week</i>
      <b>{{ $total }} ks</b>
    </div>

  </div>

</div>

@endsection