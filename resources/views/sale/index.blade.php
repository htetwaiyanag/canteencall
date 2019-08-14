@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">

      <h2>Last week total sale</h2>

      <table class="table">

        <thead>

          <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>

        </thead>

        <tbody>

          @if (!empty($saleData))

          @foreach ($saleData as $data)

          @foreach ($data as $d)
              
            <tr>
              <td>{{ $d->name }}</td>
              <td>{{ $d->quantity }}</td>
              <td>{{ $d->price }}ks</td>
            </tr>

            @endforeach
              
          @endforeach
              
          @else

          @include('inc.messages')
              
          @endif

          <tr>
            <td colspan="3"><h3>Total : {{ $total?? '0' }}ks</h3></td>
          </tr>

        </tbody>

      </table>

    </div>
    
  </div>

</div>

@endsection