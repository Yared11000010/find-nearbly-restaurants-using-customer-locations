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
        
        
        // $latitude = 8.5414095;
        // $longitude = 39.2687893;
//         $latitude =$request->input('latitude');
//         $longitude = $request->input('longitude');
// dd($longitude);
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
        
        // Retrieve the nearest restaurants
        // $restaurants = Restaurant::select(DB::raw('*, ( 6371 * acos( cos( radians(40.6591158) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(-73.7841042,14) ) + sin( radians(40.6591158) ) * sin( radians( latitude ) ) ) ) AS distance'))
        //     ->having('distance','<',1)
        //     ->orderBy('distance','asc')
        //     ->get();
        // Return the nearest restaurants view with the restaurants variable
        return view('nearest-restaurants',compact('restaurants'));
    }
}