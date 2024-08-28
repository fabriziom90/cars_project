<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
use App\Http\Requests\StoreOptionalRequest;
use App\Http\Requests\UpdateOptionalRequest;
use App\Http\Controllers\Controller;

use App\Models\Optional;

class OptionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $optionals = Optional::orderBy('id', 'desc')->get();
        $optionals = Optional::all();

        return view('admin.optionals.index', compact('optionals'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.optionals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionalRequest $request)
    {
        $form_data = $request->all();

        $optional = new Optional;

        // $optional->name = $form_data['name'];
        // $optional->price = $form_data['price'];

        $optional->fill($form_data);
        $optional->save();

        return redirect()->route('admin.optionals.index')->with('message', 'Optional inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $optional
     * @return \Illuminate\Http\Response
     */
    public function show(Optional $optional)
    {   
        // $optional = Optional::find($id);

        return view('admin.optionals.show', compact('optional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Optional $optional)
    {   
        return view('admin.optionals.edit', compact('optional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionalRequest $request, Optional $optional)
    {   
        $form_data = $request->all();

        // $form_data = $request->validate([
        //     'name' => 'required|max:50',
        //     'price' => 'required'
        // ], 
        // [
        //     'name.required' => 'Il nome dell\'optional è obbligatorio',
        //     'name.max'  => 'Il nome dell\'optional deve essere lungo al massimo 50 caratteri',
        //     'price.required' => 'Il prezzo è obbligatorio'
        // ]);

        $optional->update($form_data);

        return redirect()->route('admin.optionals.index')->with('message', 'Optional modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Optional $optional)
    {
        $optional->delete();

        return redirect()->route('admin.optionals.index')->with('message', 'Hai cancellato correttamente l\'optional');
    }
}
