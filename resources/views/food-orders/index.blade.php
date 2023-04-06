@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Food Orders</title>
</head>
<body>
    <a href="{{ route('home') }}" class="btn btn-warning">Go To Home</a>
    <h2>New Food Order</h2>
    <div class="row">
        <div class="col-lg-4">
            <form method="POST" class="form-control" action="{{ route('food-orders') }}">
                @csrf
                <label class=" label-control">Name:</label>
                <input class=" form-control" type="text" name="name" required><br>
                <label>Address:</label>
                <input class=" form-control" type="text" name="address" required><br>
                <button class=" btn btn-warning" type="submit">Submit</button>
            </form>
            
        </div>
        <div class="col">

        </div>
    </div>
   <br>
   <div class="row">
    <div class="col-lg-8">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Delivery Boy</th>
                    <th class=" text-center">Assign Delivery Boy:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foodOrders as $foodOrder)
                    <tr>
                        <td>{{ $foodOrder->id }}</td>
                        <td>{{ $foodOrder->name }}</td>
                        <td>{{ $foodOrder->address }}</td>
                        <td>{{ $foodOrder->status }}</td>
                        <td>
                            @if($foodOrder->delivery_boy_id)
                                {{ $foodOrder->deliveryBoy->name }}
                            @else
                               <p class=" text-danger"> Not Assigned</p>
                            @endif
                        </td>
                        <td>
                            <div>
                            <form method="POST" class="form-inline" action="{{ route('assign', $foodOrder->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="delivery_boy_id" required>
                                            <option value="">Select Delivery Boy</option>
                                            @foreach($deliveryBoys as $deliveryBoy)
                                                <option value="{{ $deliveryBoy->id }}" >{{ $deliveryBoy->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class=" btn btn-success" type="submit">Assign</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col">

    </div>
   </div>

    @endsection
    