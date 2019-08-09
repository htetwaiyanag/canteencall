@extends('layouts.app')

@section('content')

<div class="container">
  
  <div class="row justify-content-center">

    <div class="col-md-8">

        <section id="menu_create">

          @if (count($menuCount)==0)
            <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
          @else
            <a href="{{ route('menu.index') }}">back</a>
          @endif

          <h2>Add New Menu</h2>  

            <form action="{{ route('menu.store') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label>Food Name</label>
                  <input type="text" name="food_name" class="form-control" value="{{ old('food_name') }}" required>
              </div>

              <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" class="form-control" value="{{ old('price') }}" required>
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
                  <textarea name="optional_taste" cols="30" rows="5" class="form-control"></textarea>
              </div>

              <div class="form-group">
                  <label>Waiting Time</label>
                  <input type="text" name="waiting_time" class="form-control" placeholder="15mins" value="{{ old('waiting_time') }}" required>
              </div>

              <div class="form-group">
                  <label>Delivery Fees</label>
                  <input type="text" name="delivery_fees" class="form-control" placeholder="100ks or free" value="{{ old('delivery_fees') }}" required>
              </div>

              <div class="form-group">
                <input type="submit" value="Add Menu" class="btn btn-primary">
              </div>
              
            </form>
        
          </section>

    </div>

  </div>

</div>

  @endsection
