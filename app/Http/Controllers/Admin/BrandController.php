<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $form_data = $request->all();

        $brand = new Brand();

        // verifico se è presente logo
        if($request->hasFile('logo')){
            // dichiaro una variabile che conterrà il path che mi viene generato dall'upload del file
            $path = Storage::disk('public')->put('logo', $form_data['logo']);
            $form_data['logo'] = $path;
        }
        else{
           $from_data['logo'] = 'https://picsum.photos/200/200?random=1';
        }

        $brand->fill($form_data);

        $brand->save();

        return redirect()->route('admin.brands.index')->with('message', 'Brand inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $form_data = $request->all();

        if($request->hasFile('logo')){

            // verifico se in precedenza ho effettuato l'upload di un file. Se sì lo cancello dal file system.
            if($brand->logo != null && !str_contains($brand->logo, 'https')){
                Storage::disk('public')->delete($brand->logo);
            }
            // dichiaro una variabile che conterrà il path che mi viene generato dall'upload del file
            $path = Storage::disk('public')->put('logo', $form_data['logo']);
            $form_data['logo'] = $path;
        }

        $brand->update($form_data);
        return redirect()->route('admin.brands.index')->with('message', 'Brand modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if($brand->logo != null){
            Storage::disk('public')->delete($brand->logo);
        }

        $brand->delete();
        return redirect()->route('admin.brands.index')->with('message', 'Brand cancellato correttamente');
    }
}
