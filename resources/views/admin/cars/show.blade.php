@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Dettaglio auto</h2>
            </div>
            <div class="col-12">
                <ul class="list-unstyled" id="detail-car">
                    <li class="d-flex">
                        @if ($car->image_path != null)
                            <img width="300px" src="{{ asset('/storage/' . $car->image_path) }}" alt="{{ $car->model_name }}">
                        @else
                            <img src="https://placehold.co/300" alt="">
                        @endif
                    </li>
                    <li>
                        <div class="d-flex">
                            <div class="left"><strong>Brand: </strong></div>
                            <div class="right">{{ $car->brand ? $car->brand->name : 'Brand non indicato' }}</div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Nome: </strong>
                        </div>
                        <div class="right">
                            {{ ucfirst($car->model_name) }}
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Prezzo: </strong>
                        </div>
                        <div class="right">
                            {{ $car->price }}€
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Usata:</strong>
                        </div>
                        <div class="right">
                            {{ $car->used ? 'Sì' : 'No' }}
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Km:</strong>
                        </div>
                        <div class="right">
                            {{ $car->km }}
                        </div>
                    </li>
                    @if ($car->ports_number != null)
                        <li class="d-flex">
                            <div class="left">
                                <strong>Numero Porte</strong>
                            </div>
                            <div class="right">
                                {{ $car->ports_number }}
                            </div>
                        </li>
                    @endif
                    <li class="d-flex">
                        <div class="left">
                            <strong>Cilindrata:</strong>
                        </div>
                        <div class="right">
                            {{ $car->cubic_capacity }}
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Tipologia cambio:</strong>
                        </div>
                        <div class="right">
                            {{ $car->transmission == 1 ? 'Manuale' : 'Automatico' }}
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="left">
                            <strong>Tipologia alimentazione:</strong>
                        </div>
                        <div class="right">
                            {{ ucfirst($car->power_supply) }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
