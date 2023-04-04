<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;
    protected $table="orderfoods";
    

    public function deliveryBoy(){
        return $this->belongsTo(DeliveryBoy::class);
    }
    
}