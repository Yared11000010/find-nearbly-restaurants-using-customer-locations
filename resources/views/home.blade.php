@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <a href="{{ url('add_resturant') }}" class=" btn btn-warning">Go to add resturant</a>
                <a href="{{ url('foods') }}" class=" btn btn-warning">Go to foods</a>
                <a href="{{ url('foodorders') }}" class=" btn btn-warning">Assign Delivery Boy</a>
                 <a href="" class=" btn ">              
                 <form method="POST" action="{{ route('logout_user') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
                 </a>
                </div>

                <div class="card-body">
                    @if(session()->has('message'))'
                    <div class="alert alert-success alert-dismissible fade show">
                      <strong>Success!</strong> {{ session()->get('message') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                  @endif
                  <div class="container">
                      <h1>Nearest Restaurants</h1>
                      <a href="{{ url('add_resturant') }}" class=" btn btn-warning 
                      ">Add Resturant</a>
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
                              <br>
                      @endforeach
                      
                      @else
                          <p>No restaurants found.</p>
                      @endif
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
