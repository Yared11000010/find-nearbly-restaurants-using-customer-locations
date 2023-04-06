<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function create(){

        return view('addrestaurant');
    }
    
    
    public function addresturant(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'latitude'=>'required',
            'longitude'=>'required'
        ]);
        
        $restaurant=new Restaurant();
        $restaurant->name=$request->input('name');
        $restaurant->address=$request->input('address');
        $restaurant->latitude=$request->input('latitude');
        $restaurant->longitude=$request->input('longitude');
        $restaurant->save();
        
        
        return redirect('/restaurants/nearby')->with('message','Resturant Add Successfully!!');
    }
    
    public function getNearestRestaurants(Request $request)
    {
        // Get the user's current latitude and longitude
        $latitude=Auth()->user()->latitude;
        $longitude=Auth()->user()->latitude;
        
        $radius=3611;
        $restaurants = Restaurant::selectRaw("id, name, address, latitude, longitude,
                     ( 3956 * acos( cos( radians(?) ) *
                       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( latitude ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
        ->having("distance", "<", $radius)
        ->orderBy("distance",'asc')
        ->offset(0)
        ->limit(20)
        ->get();
        
    
        return view('home',compact('restaurants'));
    }
}