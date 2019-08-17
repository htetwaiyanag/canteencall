@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">

      @include('inc.messages')

      <h1>Edit profile</h1>

      <form action="/user/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Canteen Name</label>
          <input type="text" name="canteen_name" value="{{ $user->canteen_name }}" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="owner_phone" value="{{ $user->owner_phone }}" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Name</label>
          <input type="text" name="owner_name" value="{{ $user->owner_name }}" class="form-control" required>
        </div>

        <div class="form-group">
          <label>University</label>
          <select name="university" class="form-control" value="{{ $user->university }}" required>
              <option value="">Select</option>
              <option value="ThanlyinTechnologicalUniversity">ThanlyinTechnologicalUniversity</option>
              <option value="MyanmarMaritimeUniversity">MyanmarMaritimeUniversity</option>
              <option value="EastYangonUniversity">EastYangonUniversity</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" value="Update" class="btn btn-custom">
        </div>

      </form>

    </div>

  </div>
  
</div>

@endsection