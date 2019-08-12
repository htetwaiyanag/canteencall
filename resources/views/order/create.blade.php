@extends('layout')

@section('content')

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-md-8">

        <a href="{{ URL::previous() }}">Back</a>

        <h3>{{ $menu->food_name }}</h3>
        <p>
          price - <b>{{ $menu->price }}mins</b> <br>
          waiting time - <b>{{ $menu->waiting_time }}mins</b>
        </p>
        <img src="/uploads/menu/{{ $menu->image }}" alt="{{ $menu->image }} image" width="120" height="80">
        <hr>

        <form action="{{ route('order.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
          </div>

          <div class="form-group">
              <label>Phone</label>
              <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone') }}" required>
          </div>

          <div class="form-group">
              <label>Room Number</label>
              <input type="text" name="room_no" class="form-control" value="{{ old('room_no') }}" required>
          </div>

          <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
          </div>

          <div class="form-group">
              <label>Taking Time</label>
              <input type="text" name="time" class="form-control" value="{{ old('time') }}" required>
          </div>

          <div class="form-group">
              <label>Remark</label>
              <input type="text" name="remark" class="form-control" value="{{ old('remark') }}" required>
          </div>

          <input type="hidden" name="menu_id" value="{{ $menu->id }}">
          

          <div class="form-group">
            <input type="submit" value="Order" class="btn btn-primary">
          </div>

        </form>

      </div>

    </div>

  </div>

@endsection