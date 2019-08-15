@extends('layout')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8">

        <h1>Receipt</h1>
        <br>
        <table class="table">
          @foreach ($carts as $cart)
              <tr>
                <td>{{ $cart->name }} ({{ $cart->attributes->has('meal')?$cart->attributes->meal:'' }})</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->price }}</td>
              </tr>
          @endforeach
          <tr>
            <td colspan="3" align="right">
              <h4>Total : {{ Cart::getTotal() }}</h4>
            </td>
          </tr>
        </table>

        <a href="/" class="btn btn-custom">Go to the home page and wait the order</a>

      </div>

    </div>

  </div>

@endsection