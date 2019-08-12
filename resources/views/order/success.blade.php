@extends('layout')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8">

        <h2>Receipt</h2>
        <hr>
        <table class="table">
          @foreach ($carts as $cart)
              <tr>
                <td>{{ $cart->name }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->price }}</td>
              </tr>
          @endforeach
          <tr>
            <td colspan="3" align="right">
              <b>Total : {{ Cart::getTotal() }}</b>
            </td>
          </tr>
        </table>

        <a href="/">Go Back</a>

      </div>

    </div>

  </div>

@endsection