@extends('layouts.app')

@section('content')
    <h1>Similar Foods</h1>
    <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> <b>{{ $food->name }}</b> </h5>
              <p class="card-text">{{ $food->description }}</p>
              <p>Price: {{ $food->price }}</p>
            </div>
          </div>
        </div>
    </div>
    <h2>Similar Items</h2>
    <div class="row">
    @foreach($similarFoods as $similarFood)
        <div class="col-lg-3 bg-light ">
          <div class="card bg-warning">
            <div class="card-body">
            <h5 class="card-title"> <b>{{ $similarFood['name'] }}</b> </h5>
              <p class="card-text">{{ $similarFood['description'] }}</p>
              <p>Price: {{ $similarFood['price'] }}</p>
          </div>
         </div>
       </div>
    @endforeach
    </div>


@endsection