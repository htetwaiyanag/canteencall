@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-12">

      <ul>

        @if ( ! empty($orders))

        @include('inc.messages')

        @foreach ($orders as $key=>$order)

        <div class="clear-fix">
            <h2 class="float-left">{{ $order->customer_name }}</h2>

            <!-- Button trigger modal -->
            <a data-toggle="modal" data-target="#exampleModal" class="float-right">
                View detail<i class="fas fa-info-circle"></i>
            </a>
        </div><br><br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">{{ $order->customer_name }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                  Phone : {{ $order->customer_phone }} <br>
                  Room : {{ $order->room_no }} <br>
                  Taking Time : {{ $order->time }} <br>
                  Special Instruction : {{ $order->remark }} <br>
                </p>
              </div>
              <div class="modal-footer">
                <a href="tel:{{ $order->customer_phone }}" class="btn btn-success">Call Now</a>
              </div>
            </div>
          </div>
        </div>

        Order received at {{ date('d-M-Y', strtotime($order->created_at)) }}|{{ $order->created_at->format('H:i') }}
        <table class="table">

          <thead>

            <tr>
              <th>Item</th>
              <th>quantity</th>
              <th>Options</th>
            </tr>

          </thead>

          <tbody>

              @foreach ($orderData[$key] as $data)

              <tr>

                  <td>{{ $data->name }}</td>
    
                  <td>{{ $data->quantity }}</td>
    
                  <td>{{ $data->attributes->meal }}</td>

              </tr>
                  
              @endforeach

          </tbody>

        </table>    

          <form action="/order/{{ $order->id }}" method="POSt">
            @method('PUT')
            @csrf
            <input type="submit" value="Deliver" class="btn btn-primary">
          </form><br>
            
        @endforeach
            
        @else

        @include('inc.messages')
            
        @endif

      </ul>

      {{ $orders->links() }}

    </div>

  </div>

</div>

@endsection