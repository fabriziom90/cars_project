<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();

        return view('guests.cars.index', compact('cars'));
    }
}
