<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class CarController extends Controller
{
    public function index(){
        // $cars = Car::all();
        $cars = Car::with('brand', 'optionals')->get();

        return response()->json([
            'result'    => true,
            'response'  => $cars
        ]);
    }

    public function show($slug){
        $car = Car::with('brand', 'optionals')->where('slug', $slug)->first();

        if($car != null){
            return response()->json([
                'result' => true,
                'response' => $car
            ]);

        }
        
        return response()->json([
            'result' => false
        ]);
    }
}
