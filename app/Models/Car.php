<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model_name', 'brand_id', 'price', 'used', 'km', 'ports_number', 'cubic_capacity', 'transmission', 'power_supply', 'image_path'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function optionals(){
        return $this->belongsToMany(Optional::class);
    }
}
