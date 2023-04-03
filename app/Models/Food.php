<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table="foods";
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function similarByCategory()
    {
        return $this->where('category_id', $this->category_id)->where('id', '!=', $this->id)->get();
    }
}