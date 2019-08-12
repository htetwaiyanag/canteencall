@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <ul>

        @foreach ($orders as $order)

        {{ $order->customer_name }}

        {{ $order->order_data }}
            
        @endforeach

      </ul>

    </div>

  </div>

</div>

@endsection