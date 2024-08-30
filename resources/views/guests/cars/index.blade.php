@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Le mie auto</h1>
            </div>
            <div class="col-12">
                <button id="load-cars" class="btn btn-sm btn-primary">Carica auto</button>
            </div>
            <div class="col-12" id="detail-auto">

            </div>
            {{-- @foreach ($cars as $car)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-2">
                        <div class="card-title">
                            {{ $car->model_name }}

                            {{ $car->price }}
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div>
        <div id="cars-container" class="row my-4 g-3">

        </div>
    </div>
@endsection
