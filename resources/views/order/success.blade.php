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

        <a href="/" class="btn btn-custom" style="display:block;margin:0 auto;">Go to the home page and wait the order</a>

      </div>

    </div>

    <div class="row justify-content-center mt-5">

      <div class="col-md-8">

        <h1>Rate your feeling on this site</h1>

        <form action="{{ route('feedback.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="customer_name">
          </div>

          
          <input type="hidden" name="user_id" value="{{ $userId }}">
          
          <div class="form-group">
            <label>Feedback</label>
            <textarea name="feedback" cols="30" rows="5" class="form-control"></textarea>
          </div>

          <div class="from-group row justify-content-center">
            <button class="btn btn-custom" type="submit">Send Feedback</button>
          </div>
        </form>

      </div>

    </div>


  </div>

@endsection