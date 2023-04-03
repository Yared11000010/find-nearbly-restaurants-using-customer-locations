<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
class FoodController extends Controller
{
    //

    public function index(){
        
        $foods = Food::all();

        return view('food.allfoods', compact('foods'));
        
    }

    public function show($id){
        
        $food=Food::findOrFail($id);
        $cate_id=$food->category_id;

        $similarFoods =Food::where('category_id',$cate_id)->where('id', '!=', $food->id)->limit(4)->get()->toArray();
        
        return view('food.show', compact('food','similarFoods'));
    }

    
}