@extends('layouts.app')

@section('content')
    <h1>All Foods</h1>
    <div class="row">
    @foreach($foods as $food)
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> <b>{{ $food->name }}</b> </h5>
              <p class="card-text">{{ $food->description }}</p>
              <p>Price: {{ $food->price }}</p>
              <a href="{{ url('foods/'.$food->id) }}" class="btn btn-primary">Go Details</a>
            </div>
          </div>
        </div>
    @endforeach
</div>
    
@endsection