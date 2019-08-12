@extends('layout')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">

      <h1>Cart</h1>

        <table class="table">

            <thead>
          
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Meal</th>
              </tr>
          
            </thead>
          
            <tbody>
          
                @foreach ($carts as $cart)
          
                <tr>
                  <td width="200px">{{ $cart->name }}</td>
                  <td width="200px">{{ $cart->price }}</td>
                  <td width="50px">
                    <form action="cart/{{ $cart->id }}" method="POST">
                      @method('PUT')
                      @csrf
                      <input type="number" name="quantity" value="{{ $cart->quantity }}" class="form-control">
                      <button type="submit" class="btn btn-sm"><i class="fas fa-redo-alt"></i></button>
                    </form>
                  </td>
                  <td width="100px">
                    <form action="cart/{{ $cart->id }}" method="POST">
                      @method('PUT')
                      @csrf
                      <input type="text" name="meal" value="{{ $cart->attributes->has('meal')? $cart->attributes->meal:'' }}" class="form-control">
                      <button type="submit" class="btn btn-sm"><i class="fas fa-redo-alt"></i></button>
                    </form>
                  </td>
                </tr>
                
                @endforeach
          
                <tr>
                  <td colspan="4" align="right">
                    <h4>Total price : {{ Cart::getTotal() }}Ks</h4>
                  </td>
                </tr>
          
            </tbody>
          
          </table>

          <form action="{{ route('cart.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label>Name</label>
              <input type="text" name="customer_name" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="customer_phone" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Room Number</label>
              <input type="text" name="room_no" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Taking Time</label>
              <input type="text" name="time" class="form-control">
            </div>

            <div class="form-group">
              <label>Special Instruction</label>
              <textarea name="remark" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <input type="text" value="{{ $canteenId }}" name="user_id">

            <input type="submit" value="Checkout" class="btn btn-primary">

          </form>

    </div>

  </div>

</div>

@endsection