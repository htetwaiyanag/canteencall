@extends('layout2')

@section('content')

    <div class="container">

        <div class="row mt-5">
    
            <div class="col-md-6">

                <h1><span class="black-text">Are you hungry?</span><span class="gold-text">Order now!</span></h1>
                <br><br>
    
                <form action="/search/c">
                    
                    <label>Search by university</label><br>
                    <select name="university" class="form-control" required>
                        <option value="" selected>Select</option>
                        <option value="ThanlyinTechnologicalUniversity">ThanlyinTechnologicalUniversity</option>
                        <option value="MyanmarMaritimeUniversity">MyanmarMaritimeUniversity</option>
                        <option value="EastYangonUniversity">EastYangonUniversity</option>
                    </select><br>
                    <input type="submit" value="Search" class="btn btn-custom">
                </form>
    
            </div>
        </div>
    </div>

@endsection
