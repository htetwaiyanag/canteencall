@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-6">

      <h2>Last week total sale</h2>

          @if (!empty($saleData))

          <table class="table">

            <thead>
    
              <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
    
            </thead>
    
            <tbody>

          @foreach ($saleData as $data)

          @foreach ($data as $d)
              
            <tr>
              <td>{{ $d->name }}</td>
              <td>{{ $d->quantity }}</td>
              <td>{{ $d->price }}ks</td>
            </tr>

            @endforeach
              
          @endforeach
          
          <tr>
            <td colspan="3"><h3>Total : {{ $total?? '0' }}ks</h3></td>
          </tr>
              
          @else

          @include('inc.messages')
              
          @endif

          

        </tbody>

      </table>

    </div>
    
    <div class="col-md-6">

      <h2>Today total sale</h2>

          @if (!empty($todaySaleData))

          <table class="table">

            <thead>
    
              <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
    
            </thead>
    
            <tbody>

          @foreach ($todaySaleData as $data)

          @foreach ($data as $d)
              
            <tr>
              <td>{{ $d->name }}</td>
              <td>{{ $d->quantity }}</td>
              <td>{{ $d->price }}ks</td>
            </tr>

            @endforeach
              
          @endforeach
          
          <tr>
            <td colspan="3"><h3>Total : {{ $todayTotal?? '0' }}ks</h3></td>
          </tr>
              
          @else

          @include('inc.messages')
              
          @endif

          

        </tbody>

      </table>

    </div>

  </div>

  <div class="row">

    <div class="col-md-6">

      <h2>Regular Customers</h2>

      <table class="table">

        <tr>
          <th>Name</th>
          <th>Order Count</th>
        </tr>

        @foreach ($customers as $key=>$value)

        <tr @if ($value>=5)
            class='table-primary'
        @endif>
          <td>{{ $key }}</td>
          <td>{{ $value }}</td>
        </tr>
            
        @endforeach

      </table>


    </div>

  </div>

</div>

@endsection