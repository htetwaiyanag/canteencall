@extends('layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <a href="{{ route('menu.create') }}">Add menu now</a><br>
                or<br>
                <a href="{{ route('dashboard') }}">later</a>
            </div>
        </div>
    </div>
</div>
@endsection
