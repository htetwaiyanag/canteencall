@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <ul>

        @if ( ! empty($orders))

        @include('inc.messages')

        @foreach ($orders as $key=>$order)

        <h2>{{ $order->customer_name }}</h2>

        <p>{{ $order->room_no }}</p>

        <p>{{ $order->customer_phone }}</p>

        <p>{{ $order->time }}</p>

        <p>{{ $order->remark }}</p>

        <p>{{ date('d-M-Y', strtotime($order->created_at)) }}</p>

        <p>{{ $order->created_at->format('ha') }}</p>

        <form action="/order/{{ $order->id }}" method="POSt">
          @method('PUT')
          @csrf
          <input type="submit" value="Deliver" class="btn btn-primary">
        </form>

        <ul>

                @foreach ($orderData[$key] as $data)

                <li>{{ $data->name }}</li>

                <li>{{ $data->price }}</li>

                <li>{{ $data->quantity }}</li>

                <li>{{ $data->attributes->meal }}</li>

                <hr>
                    
                @endforeach

        </ul>
            
        @endforeach
            
        @else

        @include('inc.messages')
            
        @endif

      </ul>

    </div>

  </div>

</div>

@endsection