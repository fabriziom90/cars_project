<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Optional;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $brands = Brand::all();

        $optionals = Optional::all();

        return view('admin.cars.create', compact('brands', 'optionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $form_data = $request->all();
        $form_data['used'] = !isset($form_data['used']) ? false : true;
        
        $car = new Car();

        // verifico se è presente logo
        if($request->hasFile('image_path')){
            // dichiaro una variabile che conterrà il path che mi viene generato dall'upload del file
            $path = Storage::disk('public')->put('image_path', $form_data['image_path']);
            $form_data['image_path'] = $path;
        }

        $car->fill($form_data);
        $car->save();

        // controllo che la richiesta abbia la chiave optionals
        if($request->has('optionals')){
            $car->optionals()->attach($form_data['optionals']);
        }

        return redirect()->route('admin.cars.index')->with('message', 'Auto inserita correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        // controllo che la richiesta abbia la chiave optionals
        if($request->has('optionals')){
            
            $car->optionals()->sync($form_data['optionals']);
        }
        else{
            $car->optionals()->sync([]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
