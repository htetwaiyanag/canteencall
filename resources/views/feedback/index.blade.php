@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-12">

      <h1>Customer Feedbacks</h1>
      <hr>

      @foreach ($feedbacks as $feedback)

      <div mt-5>

        <h3>{{ $feedback->customer_name }}</h3>
        <p>" {{ $feedback->feedback }} "</p>

      </div>
          
      @endforeach

    </div>

  </div>

</div>

@endsection