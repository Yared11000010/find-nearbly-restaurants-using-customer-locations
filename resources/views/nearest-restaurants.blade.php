@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nearest Restaurants</h1>

@if(count($restaurants) > 0)
@foreach($restaurants as $restaurant)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{{ $restaurant->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">{{ $restaurant->address }}.</p>
            <a href="#" class="card-link">{{ round($restaurant->distance,2) }} miles ways</a>
            </div>
        </div>
@endforeach

@else
    <p>No restaurants found.</p>
@endif
</div>
<h1>Save User Location</h1>

<form method="POST" action="">
    @csrf
    <div>
        <label for="latitude">Latitude</label>
        <input type="text" disabled name="latitude" id="latitude">
    </div>
    <div>
        <label for="longitude">Longitude</label>
        <input type="text" disabled name="longitude" id="longitude">
    </div>
    <button type="submit">Save Location</button>
</form>

<script>
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
        }, function(error) {
            console.log(error);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
</script>

@endsection