@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Le mie auto</h1>
            </div>
            @foreach ($cars as $car)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-title">
                            {{ $car->model_name }}

                            {{ $car->price }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
