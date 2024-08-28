<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarGalleryImage;
use App\Http\Requests\StoreCarGalleryImageRequest;
use App\Http\Requests\UpdateCarGalleryImageRequest;
use App\Http\Controllers\Controller;

class CarGalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarGalleryImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarGalleryImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarGalleryImage  $carGalleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(CarGalleryImage $carGalleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarGalleryImage  $carGalleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CarGalleryImage $carGalleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarGalleryImageRequest  $request
     * @param  \App\Models\CarGalleryImage  $carGalleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarGalleryImageRequest $request, CarGalleryImage $carGalleryImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarGalleryImage  $carGalleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarGalleryImage $carGalleryImage)
    {
        //
    }
}
