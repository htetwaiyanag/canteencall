@extends('layouts.app')

@section('content')

<section id="menu-show">

  <div class="row justify-content-center">

    <div class="col-md-8">

        <a href="/menu">Back</a>

        <form action="/menu/{{ $menu->id }}" method="POST" enctype="multipart/form-data">

          @csrf
          @method('PATCH')

          <div class="form-group">
              <label>Food Name</label>
              <input type="text" name="food_name" class="form-control" value="{{ $menu->food_name }}" required>
          </div>

          <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control" value="{{ $menu->price }}" required>
          </div>

          <div class="form-group">
              <label>Category</label>
              <select name="category" class="form-control" required>
                <option value="" selected>Select</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="ChineseFood">ChineseFood</option>
                <option value="FastFood">FastFood</option>
                <option value="MyanmarFood">MyanmarFood</option>
                <option value="LightFood">LightFood</option>
                <option value="Drinks">Drinks</option>
              </select>
          </div>

          <div class="form-group">
              <label>Opitional Taste and Meal</label>
              <textarea name="optional_taste" cols="30" rows="5" class="form-control">
                {{ $menu->optional_taste }}
              </textarea>
          </div>

          <div class="form-group">
              <label>Waiting Time</label>
              <input type="text" name="waiting_time" class="form-control" placeholder="15mins" value="{{ $menu->waiting_time }}" required>
          </div>

          <div class="form-group">
              <label>Delivery Fees</label>
              <input type="text" name="delivery_fees" class="form-control" placeholder="100ks or free" value="{{ $menu->delivery_fees }}" required>
          </div>

          <div class="form-group">
            <label>Upload Image</label>
            <input type="file" class="form-control-file" name="image">
          </div>

          <div class="form-group">
            <input type="submit" value="Edit Menu" class="btn btn-primary">
          </div>

        </form>
    </div>

  </div>

</section>


@endsection