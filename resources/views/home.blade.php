@extends('layouts.app')

@section('content')

<div class="jumbotron" style="margin-bottom: 0px;color:#fff; background-color:#4aa1f3;">
     <h2 class="text-center" style="font-size: 50px ; font-weight: 600px;">Get Current Weather</h2>
</div>

<div class="container">

    <div class="row text-center">

        <div class="col-sm-12">
            <h3 class="text-primary" style="margin-top:30px">Enter City Name</h3>
            <span id ="error"></span>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-inline" id="rowDiv">
                <input type="text" name="city" class="form-control" placeholder="City Name" id='city'>
                <button class="btn btn-primary" id="submitWeather">Search City</button>
            </div>
        </div>
    </div> 
      
    <div class="row text-center">
        <div class="col-sm-12">
            <div id="showWeather"></div>
        </div>
    </div>
    

</div>

@endsection
